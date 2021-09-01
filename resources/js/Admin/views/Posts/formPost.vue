<template>
  <a-spin :spinning="spinning" tip="Đang tải lên sản phẩm...">
    <div class="spin-content">
      <a-form
        layout="vertical"
        :form="form"
        @submit="handleSubmit"
        class="bg-white"
        style="padding: 24px; border-radius: 10px"
      >
        <a-form-item label="Tiêu đề">
          <a-input
            name="name"
            placeholder="Nhập tên sản phẩm"
            v-decorator="[
              'name',
              {
                initialValue: $attrs.data ? $attrs.data.name: null,
                rules: [
                  { required: true, message: 'Vui lòng nhập thông tin!' },
                  { min: 10, message: 'Ít nhất 10 ký  tự' },
                ],
              },
            ]"
          /> </a-form-item
        ><a-form-item label="Nội dung miêu tả">
          <a-textarea
            :auto-size="{ minRows: 5, maxRows: 10 }"
            name="body"
            placeholder="Nhập nội dung miêu tả"
            v-decorator="[
              'body',
              {
                initialValue: $attrs.data ? $attrs.data.body: null,
                rules: [
                  { required: true, message: 'Vui lòng nhập thông tin!' },
                  { min: 10, message: 'Ít nhất 10 ký  tự' },
                ],
              },
            ]"
          /> </a-form-item
        ><a-form-item label="Đơn giá">
          <a-input-number
            style="width: 100%"
            :min="0"
            name="money"
            placeholder="Nhập đơn giá của sản phẩm"
            v-decorator="[
              'money',
              {
                initialValue: $attrs.data ? $attrs.data.money: null,
                rules: [
                  { required: true, message: 'Vui lòng nhập thông tin!' },
                ],
              },
            ]" /></a-form-item
        ><a-form-item label="Số lượng">
          <a-input-number
            style="width: 100%"
            :min="0"
            name="salary"
            placeholder="Nhập số lượng hiện có của sản phẩm"
            v-decorator="[
              'salary',
              {
                initialValue: $attrs.data ? $attrs.data.salary: null,
                rules: [
                  { required: true, message: 'Vui lòng nhập thông tin!' },
                ],
              },
            ]"
          /> </a-form-item
        ><a-form-item label="Giảm giá">
          <a-input-number
            style="width: 100%"
            name="sales"
            :min="0"
            placeholder="Nhập số tiền giảm giá"
            v-decorator="[
              'sales',
              {
                initialValue: $attrs.data ? ($attrs.data.sales ? $attrs.data.sales : null) : null,
              },
            ]"
          />
        </a-form-item>
        <a-form-item label="Địa điểm bán">
          <a-select
            label-in-value
            style="width: 100%"
            @change="changeLocation"
            :default-value="{ key: $attrs.data ? $attrs.data.location.province_id : '1' }"
          >
            <a-select-option
              v-for="province in provinces"
              :key="province.province_id"
              :value="province.province_id"
              >{{ province.province_name }}</a-select-option
            >
          </a-select>
        </a-form-item>
        <div class="clearfix">
          <a-upload
            action="api/upload/product_images"
            list-type="picture-card"
            :file-list="fileList"
            @preview="handlePreview"
            @change="handleChange"
          >
            <div v-if="fileList.length < 8">
              <a-icon type="plus" />
              <div class="ant-upload-text">Upload</div>
            </div>
          </a-upload>
          <a-modal
            :visible="previewVisible"
            :footer="null"
            @cancel="handleCancel"
          >
            <img alt="example" style="width: 100%" :src="previewImage" />
          </a-modal>
        </div>
        <a-form-item>
          <a-button type="primary" html-type="submit">Đăng</a-button>
        </a-form-item>
      </a-form>
    </div></a-spin
  >
</template>
<style>
.ant-upload-select-picture-card i {
  font-size: 32px;
  color: #999;
}

.ant-upload-select-picture-card .ant-upload-text {
  margin-top: 8px;
  color: #666;
}
</style>
<style scoped>
.spin-content {
  border: 1px solid #91d5ff;
  background-color: #e6f7ff;
  padding: 30px;
}
</style>
<script>
function getBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = (error) => reject(error);
  });
}
export default {
  data() {
    return {
      formLayout: "horizontal",
      form: this.$form.createForm(this, { name: "coordinated" }),
      previewVisible: false,
      previewImage: "",
      fileList: [],
      provinces: [],
      spinning: false,
      location: 1,
      mode: "create",
    };
  },
  beforeMount: function () {
    this.getProvinces();
    if (this.$attrs.data) {
      this.location = this.$attrs.data.location;
      this.mode = "update";
      var fileList = JSON.parse(this.$attrs.data.files);
      for (let i = 0; i < fileList.length; i++) {
        var path = fileList[i];
        fileList[i] = {};
        (fileList[i].name = "image.png"),
          (fileList[i].status = "done"),
          (fileList[i].url = path);
        fileList[i].uid = i;
      }
      this.fileList = [...this.fileList, ...fileList];
    }
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          if (this.fileList.length > 0) {
            var json_form = values;
            json_form.files = this.fileList.map((file) => {
              if (file.response) return file.response.url;
              else return file.url;
            });
            json_form.location = parseInt(this.location);
            var self = this;
            self.spinning = true;
            let post_url = "";
            if (this.mode == "create") post_url = "/api/posts/create";
            else if (this.mode == "update")
              post_url = `/api/posts/edit?id=${this.$attrs.data.id}`;
            Vue.axios
              .post(post_url, json_form)
              .then((response) => {
                self.spinning = false;
                if (!response.data.result) alert(response.data.msg);
              })
              .catch((error) => {
                self.spinning = false;
                console.log(error);
              });
          } else {
            alert("Vui lòng upload ít nhất 1 ảnh sản phẩm!");
          }
        }
      });
    },
    changeLocation(value) {
      this.location = value.key;
    },
    handleCancel() {
      this.previewVisible = false;
    },
    async handlePreview(file) {
      if (!file.url && !file.preview) {
        file.preview = await getBase64(file.originFileObj);
      }
      this.previewImage = file.url || file.preview;
      this.previewVisible = true;
    },
    handleChange({ fileList }) {
      this.fileList = fileList;
    },
    getProvinces: function () {
      var self = this;
      Vue.axios
        .get("/api/locations/get")
        .then((response) => {
          if (response.data.result) self.provinces = response.data.data;
        })
        .catch((response) => {
          console.log(response);
        });
    },
  },
};
</script>