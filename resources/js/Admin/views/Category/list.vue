<template>
  <a-card title="Danh sách danh mục">
    <a-spin :spinning="spinning" tip="Đang tải danh mục...">
      <div class="spin-content">
        <template v-if="dataCateGory != null">
          <template v-if="dataCateGory.data.length > 0">
             <template v-for="(item) in dataCateGory.data">
                <a-tag :key="item" :closable="true" @close="() => handleClose(item)">
                  {{ item.name }}
                </a-tag>
             </template>
          </template>
          <template v-else>
            <a-result status="warning" title="Danh mục trống">
              <template #extra>
                <div>Hãy thêm 1 danh mục</div>
              </template>
            </a-result>
          </template>
        </template>
      </div>
    </a-spin>
  </a-card>
</template>
<script>
import Vue from "vue";
export default {
  data() {
    return {
      spinning: true,
      dataCateGory: null,
    };
  },
  props: ["updateStatus"],
  beforeMount() {
    this.fetchCateGory();
  },
  watch: {
    updateStatus: function () {
      console.log("OK");
      if (this.updateStatus) {
        this.fetchCateGory();
      }
    },
  },
  methods: {
    fetchCateGory() {
      var self = this;
      this.spinning = true;
      this.$root.$emit("updateCat", false);
      Vue.axios
        .get("/api/categorys/list")
        .then((response) => {
          self.dataCateGory = response.data;
          self.spinning = false;
        })
        .catch((error) => {
          self.$message.error("Có lỗi nội bộ!");
          console.error(error);
        });
    },
    handleClose(removedTag) {
      var self = this;
      Vue.axios
        .delete(`/api/categorys/delete?id=${removedTag.id}`)
        .then((response) => {
          self.dataCateGory = response.data;
          self.$message.success("Xóa thành công");
        })
        .catch((error) => {
          self.$message.error("Có lỗi nội bộ!");
          console.error(error);
        });
      const tags = this.dataCateGory.data.filter((tag) => tag !== removedTag);
      this.dataCateGory.data = tags;
    },
  },
};
</script>