<template>
  <a-card title="Thêm danh mục">
    <a-spin :spinning="spinning" tip="Đang tải lên sản phẩm...">
      <div class="spin-content">
        <a-form
          layout="vertical"
          :form="form"
          @submit="handleSubmit"
          class="bg-white"
        >
          <a-form-item label="Tên danh mục">
            <a-input
              name="name_category"
              v-decorator="[
                'name_category',
                {
                  rules: [
                    { required: true, message: 'Vui lòng nhập thông tin!' },
                  ],
                },
              ]"
            />
          </a-form-item>
          <a-form-item>
            <a-button type="primary" html-type="submit">Thêm</a-button>
          </a-form-item>
        </a-form>
      </div>
    </a-spin>
  </a-card>
</template>
<script>
export default {
  data() {
    return {
      spinning: false,
      form: this.$form.createForm(this, { name: "coordinated" }),
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          var self = this;
          self.spinning = true;
          Vue.axios
            .post("/api/categorys/create", values)
            .then((response) => {
              self.spinning = false;
              self.$root.$emit("updateCat", true);
            })
            .catch((error) => {
              self.spinning = false;
              self.$message.error("Có lỗi nội bộ!");
              console.log(error);
            });
        }
      });
    },
  },
};
</script>