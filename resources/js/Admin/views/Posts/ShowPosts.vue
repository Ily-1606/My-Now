<template>
  <div
    v-infinite-scroll="handleInfiniteOnLoad"
    class="demo-infinite-container"
    :infinite-scroll-disabled="busy"
    :infinite-scroll-distance="10"
  >
    <a-list :data-source="data" :grid="{ gutter: 32, md: 4, xs: 1 }">
      <a-list-item slot="renderItem" slot-scope="item">
        <router-link :to="'/post/' + item.id">
          <a-card :title="item.name">
            <img
              class="card-img-bg p-10"
              :src="parserURL(item.files)"
              width="100%"
              height="200px"
              slot="cover"
            />
            <a-card-meta :title="item.money + ' VND'">
              <template slot="description">
                Đã bán:
                <span class="font-weight-bold text-success">{{
                  item.sold
                }}</span>
                sản phẩm
              </template>
            </a-card-meta>
          </a-card>
        </router-link>
      </a-list-item>
      <div v-if="loading && !busy" class="demo-loading-container">
        <a-spin />
      </div>
    </a-list>
  </div>
</template>
<style>
.demo-infinite-container {
  border: 1px solid #e8e8e8;
  border-radius: 4px;
  overflow: auto;
  padding: 8px 24px;
  height: 100vh;
}
.demo-loading-container {
  position: absolute;
  bottom: 40px;
  width: 100%;
  text-align: center;
}
</style>
<script>
import infiniteScroll from "vue-infinite-scroll";
export default {
  directives: { infiniteScroll },
  data() {
    return {
      data: [],
      loading: false,
      busy: false,
      next_page_url: this.$attrs.url ? this.$attrs.url : "/api/posts/list",
    };
  },
  beforeMount() {
    this.fetchData((res) => {
      this.data = res.data.data;
      this.next_page_url = res.data.next_page_url;
    });
  },
  methods: {
    fetchData(callback) {
      Vue.axios
        .get(this.next_page_url)
        .then((response) => {
          callback(response);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    handleInfiniteOnLoad() {
      const data = this.data;
      this.loading = true;
      if (this.next_page_url) {
        this.fetchData((res) => {
          this.next_page_url = res.data.next_page_url;
          this.data = data.concat(res.data.data);
          this.loading = false;
        });
      } else {
        this.$message.warning("Infinite List loaded all");
        this.busy = true;
        this.loading = false;
      }
    },
    parserURL(url) {
      if (url) {
        url = JSON.parse(url);
        return url[0];
      }
    },
  },
};
</script>