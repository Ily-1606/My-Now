<template>
  <div v-if="dataInfo">
    <a-row type="flex" :gutter="[24, 24]" justify="space-around" align="middle">
      <a-col
        :span="24"
        :md="12"
        :lg="{ span: 12, offset: 0 }"
        :xl="{ span: 12, offset: 0 }"
      >
        <form-post :data="dataInfo"></form-post>
        <a-card size="small" title="Nâng cao" class="mt-10">
          <div>
            <div class="my-20">Cập nhật trạng thái</div>
            <a-select
              style="width: 200px"
              :default-value="status"
              @change="updateStateStatus"
            >
              <a-select-option value="normal">Mặc định</a-select-option>
              <a-select-option value="hidden">Tạm ẩn</a-select-option>
              <a-select-option value="ended">Đã bán hết</a-select-option>
              <a-select-option value="stoped"
                >Ngoài giờ làm việc</a-select-option
              >
            </a-select>
            <a-button type="primary" v-on:click="updateStatus"
              >Cập nhật</a-button
            >
          </div>
          <div class="mt-10">
            <a-button type="danger" v-on:click="deletePost"
              >Xóa vĩnh viễn sản phẩm này</a-button
            >
          </div>
        </a-card>
      </a-col>
    </a-row>
  </div>
</template>
<script>
import Vue from "vue";
import FormPost from "./formPost.vue";
export default {
  components: { FormPost },
  beforeMount() {
    this.loadInfo();
  },
  data() {
    return {
      dataInfo: undefined,
      id: this.$route.params.pathMatch,
      status: undefined,
    };
  },
  methods: {
    loadInfo() {
      var self = this;
      Vue.axios
        .get("/api/posts/info?id=" + this.id)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.dataInfo = data.data;
            self.status = data.data.status;
          } else {
            alert(data.msg);
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    updateStatus() {
      var self = this;
      Vue.axios
        .put(`/api/posts/updateStatus?id=${self.id}&status=${self.status}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            alert("Cập nhật thành công!");
          } else alert(data.msg);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    deletePost() {
      var self = this;
      Vue.axios
        .delete(`/api/posts/delete?id=${self.id}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            alert("Xóa sản phẩm thành công!");
          } else alert(data.msg);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateStateStatus(value) {
      this.status = value;
    },
  },
};
</script>