<template>
  <div
    v-infinite-scroll="handleInfiniteOnLoad"
    class="demo-infinite-container"
    :infinite-scroll-disabled="busy"
    :infinite-scroll-distance="10"
  >
    <a-list :data-source="listUser">
      <a-list-item
        slot="renderItem"
        slot-scope="item"
        class="p-20 rounded bg-white"
      >
        <a-list-item-meta :description="item.email">
          <router-link
            :to="'/account/' + item.id"
            slot="title"
            >{{ item.name }}
          </router-link>
          <a-avatar slot="avatar" :src="item.avatar" />
        </a-list-item-meta>
        <div v-if="item.user_type == 'admin'">Quản trị viên</div>
        <div v-else-if="item.user_type == 'member'">Người dùng</div>
      </a-list-item>
      <div v-if="loading && !busy" class="demo-loading-container">
        <a-spin />
      </div>
    </a-list>
  </div>
</template>
<script>
import infiniteScroll from "vue-infinite-scroll";
export default {
  directives: { infiniteScroll },
  setup() {},
  data() {
    return {
      listUser: [],
      dataLink: "api/user/show",
      loading: false,
      busy: false,
    };
  },
  beforeMount() {
    this.loadInfo((res) => {
      this.listUser = res.data;
      self.dataLink = res.next_page_url;
    });
  },
  methods: {
    loadInfo(callback) {
      Vue.axios
        .get(this.dataLink)
        .then((response) => {
          var data = response.data;
          callback(data);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    handleInfiniteOnLoad() {
      const listUser = this.listUser;
      this.loading = true;
      if (this.dataLink) {
        this.loadInfo((data) => {
          this.listUser = [...listUser, ...data.data];
          this.dataLink = data.next_page_url;
          this.loading = false;
        });
      } else {
        this.$message.warning("Infinite List loaded all");
        this.busy = true;
        this.loading = false;
        return;
      }
    },
  },
};
</script>