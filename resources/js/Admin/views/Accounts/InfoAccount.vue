<template>
  <div>
    <a-card
      :bordered="false"
      class="card-profile-head"
      style="margin: 0px"
      :bodyStyle="{ padding: 0 }"
    >
      <template #title>
        <a-row type="flex" align="middle">
          <a-col :span="24" :md="12" class="col-info">
            <a-avatar :size="74" shape="square" :src="dataInfo.avatar" />
            <div class="avatar-info">
              <h4 class="font-semibold m-0">{{ dataInfo.name }}</h4>
              <p v-if="dataInfo.user_type == 'admin'">Quản trị viên</p>
              <p v-else-if="dataInfo.user_type == 'member'">Thành viên</p>
            </div>
          </a-col>
          <a-col
            :span="24"
            :md="12"
            style="
              display: flex;
              align-items: center;
              justify-content: flex-end;
            "
          >
            <a-radio-group size="small" v-model="statusTab">
              <a-radio-button value="overview">Thông tin</a-radio-button>
              <a-radio-button value="posts">Sản phẩm</a-radio-button>
            </a-radio-group>
          </a-col>
        </a-row>
      </template>
    </a-card>
    <div v-if="statusTab == 'overview'" class="mt-20">
      <a-tabs default-active-key="1">
        <a-tab-pane key="1" tab="Cơ bản">
          <a-form-model
            ref="ruleForm"
            :model="dataInfo"
            :label-col="labelCol"
            :wrapper-col="wrapperCol"
            :rules="rules"
          >
            <a-form-model-item label="Tên đầy đủ" prop="name">
              <a-input v-model="dataInfo.name" />
            </a-form-model-item>
            <a-form-model-item label="Email" prop="email">
              <a-input v-model="dataInfo.email"></a-input>
            </a-form-model-item>
            <a-form-model-item label="Thời gian đăng ký">
              <a-date-picker
                v-model="dataInfo.created_at"
                show-time
                type="date"
                disabled
                style="width: 100%"
              />
            </a-form-model-item>
            <a-form-model-item :wrapper-col="{ span: 14, offset: 4 }">
              <a-button type="primary" v-on:click="updateInfo">
                Cập nhật
              </a-button>
            </a-form-model-item>
          </a-form-model>
        </a-tab-pane>
        <a-tab-pane key="2" tab="Nâng cao">
          <a-row
            type="flex"
            align="middle"
            justify="space-around"
            class="bg-white rounded p-15"
          >
            <a-col :span="24" :md="12" class="col-info">
              <a-row type="flex" align="middle" justify="space-around">
                <a-col :span="24" :md="12" class="col-info">
                  <div style="margin-bottom: 10px">Cập nhật trạng thái</div>
                  <a-select
                    style="width: 200px"
                    v-model="dataInfo.status"
                    class="my-10"
                  >
                    <a-select-option value="normal">Mặc định</a-select-option>
                    <a-select-option value="hidden"
                      >Khóa tài khoản</a-select-option
                    >
                  </a-select>
                  <a-button type="primary" v-on:click="updateStatus"
                    >Cập nhật</a-button
                  >
                </a-col>
                <a-col :span="24" :md="12" class="col-info">
                  <div style="margin-bottom: 10px">Phân quyền</div>
                  <a-select
                    style="width: 200px"
                    v-model="dataInfo.user_type"
                    class="my-10"
                  >
                    <a-select-option value="normal">Mặc định</a-select-option>
                    <a-select-option value="admin"
                      >Quản trị viên</a-select-option
                    >
                  </a-select>
                  <a-button type="primary" v-on:click="updateStatus"
                    >Cập nhật</a-button
                  >
                </a-col>
              </a-row>
              <a-button type="danger" block v-on:click="deleteAccount"
                >Xóa tài khoản này</a-button
              >
            </a-col>
          </a-row>
        </a-tab-pane>
      </a-tabs>
    </div>
    <div v-if="statusTab == 'posts'" class="mt-20">
      <show-posts :url="urlPost" />
    </div>
  </div>
</template>
<script>
import infiniteScroll from "vue-infinite-scroll";
import ShowPosts from "../Posts/ShowPosts.vue";
export default {
  components: { ShowPosts },
  directives: { infiniteScroll },
  data() {
    return {
      dataInfo: {},
      id: this.$route.params.pathMatch,
      labelCol: { span: 4 },
      wrapperCol: { span: 14 },
      statusTab: "overview",
      urlPost: `/api/posts/list?userId=${this.$route.params.pathMatch}`,
      rules: {
        name: [
          {
            required: true,
            message: "Vui lòng không để trống",
            trigger: "blur",
          },
          {
            min: 10,
            message: "Ít nhất 10 ký tự",
            trigger: "blur",
          },
        ],
        email: [
          {
            required: true,
            message: "Vui lòng không để trống",
            trigger: "blur",
          },
          {
            min: 10,
            message: "Ít nhất 10 ký tự",
            trigger: "blur",
          },
          {
            pattern:
              /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            message: "Email không hợp lệ!",
            trigger: "blur",
          },
        ],
      },
    };
  },
  beforeMount() {
    this.loadInfo();
  },
  methods: {
    loadInfo() {
      var self = this;
      Vue.axios
        .get(`/api/user/Fullinfo?id=${this.id}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.dataInfo = data.data;
          } else alert(data.msg);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateInfo() {
      var self = this;
      this.$refs.ruleForm.validate((valid) => {
        if (valid) {
          Vue.axios
            .put(`api/user/update?id=${self.id}`, self.dataInfo)
            .then((response) => {
              var data = response.data;
              alert(data.msg);
            })
            .catch((error) => {
              console.error(error);
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    loadPost() {
      var self = this;
      Vue.axios
        .get(this.dataInfo.linkTo)
        .then((response) => {
          var data = response;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    deleteAccount() {
      Vue.axios
        .delete(`/api/user/delete?id=${this.id}`)
        .then(response =>{
            var data = response.data;
            alert(data.msg);
        })
        .catch(error =>{
            console.error(error);
        })
    },
    updateStatus(){
        Vue.axios
        .put(`/api/user/updateStatus?id=${this.id}&user_type=${this.dataInfo.user_type}&status=${this.dataInfo.status}`)
        .then(response =>{
            var data = response.data;
            alert(data.msg);
        })
        .catch(error =>{
            console.error(error);
        })
    }
  },
};
</script>