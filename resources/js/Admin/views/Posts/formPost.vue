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
                initialValue: $attrs.data ? $attrs.data.name : null,
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
                initialValue: $attrs.data ? $attrs.data.body : null,
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
                initialValue: $attrs.data ? $attrs.data.money : null,
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
                initialValue: $attrs.data ? $attrs.data.salary : null,
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
                initialValue: $attrs.data
                  ? $attrs.data.sales
                    ? $attrs.data.sales
                    : null
                  : null,
              },
            ]"
          />
        </a-form-item>
        <a-form-item label="Thể loại">
          <a-auto-complete
            name="categorys"
            v-decorator="['categorys', {}]"
            option-label-prop="data"
            @select="onSelectCategory"
            @search="onSearchCategory"
          >
            <template slot="dataSource">
              <a-select-option
                v-for="item in dataSource"
                :key="item.id + ''"
                :title="item.name"
              >
                {{ item.name }}
              </a-select-option>
            </template>
          </a-auto-complete>
          <div class="mt-2">
            <template v-for="item in dataCategory">
              <a-tag
                :key="item.id + ''"
                :closable="true"
                @close="() => handleDeleteCategory(item)"
              >
                {{ item.name }}
              </a-tag>
            </template>
          </div>
        </a-form-item>
        <a-form-item label="Địa điểm bán">
          <a-select
            label-in-value
            style="width: 100%"
            @change="changeLocation"
            :default-value="{
              key: $attrs.data ? $attrs.data.location.province_id : '1',
            }"
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
<style>
.global-search-wrapper {
  padding-right: 50px;
}

.global-search {
  width: 100%;
}

.global-search.ant-select-auto-complete .ant-select-selection--single {
  margin-right: -46px;
}

.global-search.ant-select-auto-complete
  .ant-input-affix-wrapper
  .ant-input:not(:last-child) {
  padding-right: 62px;
}

.global-search.ant-select-auto-complete
  .ant-input-affix-wrapper
  .ant-input-suffix
  button {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.global-search-item {
  display: flex;
}

.global-search-item-desc {
  flex: auto;
  text-overflow: ellipsis;
  overflow: hidden;
}

.global-search-item-count {
  flex: none;
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
      dataSource: [],
      dataCategory: [],
    };
  },
  beforeMount: function () {
    this.getProvinces();
    if (this.$attrs.data) {
      this.location = this.$attrs.data.location;
      this.dataCategory = this.$attrs.data.categorys;
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
          if (this.fileList.length == 0) {
            this.$message.error("Vui lòng upload ít nhất 1 ảnh sản phẩm!");
            return;
          } else if (this.dataCategory.length == 0) {
            this.$message.error("Vui lòng chọn thể loại sản phẩm!");
            return;
          }
          var json_form = values;
          json_form.files = this.fileList.map((file) => {
            if (file.response) return file.response.url;
            else return file.url;
          });
          json_form.categorys = this.dataCategory.map(
            (categogry) => categogry.id
          );
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
        }
      });
    },
    changeLocation(value) {
      this.location = value.key;
    },
    onSearchCategory(searchText) {
      //this.dataSource = !searchText ? [] : [searchText, searchText.repeat(2), searchText.repeat(3)];
      var self = this;
      Vue.axios
        .get(`/api/search/categorys?q=${searchText}`)
        .then((response) => {
          var data = response.data;
          self.dataSource = data.data;
        })
        .catch((error) => {
          self.$message.error("Lỗi nội bộ!");
          console.error(error);
        });
    },
    onSelectCategory(value) {
      let check = false;
      this.dataCategory.forEach((element) => {
        if (element.id == value) {
          check = false;
          return false;
        }
      });
      if (!check) {
        this.dataSource.forEach((element) => {
          if (element.id == value) {
            this.dataCategory.push(element);
          }
        });
      }
    },
    handleDeleteCategory(removedTag) {
      const tags = this.dataCategory.filter((tag) => tag !== removedTag);
      this.dataCategory = tags;
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