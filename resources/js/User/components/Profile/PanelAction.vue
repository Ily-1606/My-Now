<template>
  <div>
    <div v-show="statusNav == 'account'">
      <div class="card shadow-sm">
        <div class="card-header">
          Thông tin tài khoản
          <div
            class="float-right small font-weight-bold"
            v-if="statusReponse != null"
          >
            <div v-if="statusReponse.status == true" class="text-success">
              {{ statusReponse.msg }}
            </div>
            <div
              v-else-if="statusReponse.status == 'updating'"
              class="text-primary"
            >
              {{ statusReponse.msg }}
            </div>
            <div v-else class="text-danger">
              {{ statusReponse.msg }}
            </div>
          </div>
        </div>
        <div class="card-body p-4">
          <div class="card-text">
            <div class="border-bottom pb-4">
              <h5 class="card-title text-primary font-weight-bold">
                Tải ảnh đại diện
              </h5>
              <div class="row">
                <div class="col-4">
                  <img
                    class="rounded-circle"
                    width="120px"
                    height="120px"
                    :src="userInfo.image"
                  />
                </div>
                <div class="col-8">
                  <div>
                    Tải ảnh từ
                    <input
                      type="file"
                      name="file"
                      accept="image/*"
                      @change="changeFile"
                    />
                    <button class="btn btn-primary mt-2" @click="updateAvtar">
                      Cập nhật
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="border-bottom py-4">
              <h5 class="card-title text-primary font-weight-bold">
                Thay đổi thông tin
              </h5>
              <div class="row my-2">
                <div class="col-4">
                  <label for="name" class="font-weight-bold">Tên đầy đủ</label>
                </div>
                <div class="col-8">
                  <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    v-model="dataInfo.name"
                  />
                </div>
              </div>
              <div class="row my-2">
                <div class="col-4">
                  <label for="email" class="font-weight-bold">Email</label>
                </div>
                <div class="col-8">
                  <input
                    class="form-control"
                    type="email"
                    name="email"
                    id="email"
                    v-model="dataInfo.email"
                  />
                </div>
              </div>
              <div class="row my-2">
                <div class="col-12">
                  <button
                    class="btn btn-primary float-right"
                    @click="updateInformation"
                  >
                    Cập nhật
                  </button>
                </div>
              </div>
            </div>
            <div class="border-bottom py-4">
              <h5 class="card-title text-primary font-weight-bold">
                Thay đổi mật khẩu
              </h5>
              <div class="row my-2">
                <div class="col-4">
                  <label for="password" class="font-weight-bold"
                    >Mật khẩu cũ (bỏ trống nếu tài khoản đăng ký bằng bên thứ
                    3)</label
                  >
                </div>
                <div class="col-8">
                  <input
                    class="form-control"
                    type="password"
                    name="password"
                    v-model="dataPassword.password"
                    id="password"
                  />
                </div>
              </div>
              <div class="row my-2">
                <div class="col-4">
                  <label for="new_password" class="font-weight-bold"
                    >Mật khẩu mới</label
                  >
                </div>
                <div class="col-8">
                  <input
                    class="form-control"
                    type="password"
                    name="new_password"
                    v-model="dataPassword.new_password"
                    id="new_password"
                  />
                </div>
              </div>
              <div class="row my-2">
                <div class="col-4">
                  <label for="re_new_password" class="font-weight-bold"
                    >Xác nhận mật khẩu</label
                  >
                </div>
                <div class="col-8">
                  <input
                    class="form-control"
                    type="password"
                    name="new_password_confirmation"
                    v-model="dataPassword.new_password_confirmation"
                    id="re_new_password"
                  />
                </div>
              </div>
              <div class="row my-2">
                <div class="col-12">
                  <button
                    class="btn btn-primary float-right"
                    @click="updatePassword"
                  >
                    Cập nhật
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-show="statusNav == 'info_order'">
      <div class="card shadow-sm">
        <div class="card-header">Lịch sử đặt hàng</div>
         <div class="card-body p-4">
           <template v-if="dataBills.length >0">
             <bill v-for="bill in dataBills" :key="bill.product_id"
             :data="bill" />
           </template>
           <template v-else>
             <empty message="Bạn chưa có đơn hàng nào, hay mua sắm gì đó rồi trở lại đây!" />
           </template>
         </div>
      </div>
    </div>
  </div>
</template>
<script>
import Empty from '../Others/Empty.vue';
import Bill from '../Items/Bill.vue';
export default {
  components: { Empty, Bill},
  beforeMount() {
    this.fetchBills();
  },
  data() {
    return {
      userInfo: this.user,
      statusReponse: null,
      dataFile: null,
      dataInfo: {
        name: this.user.fullname,
        email: this.user.email,
        ref: "profile",
      },
      dataPassword: {
        password: "",
        new_password: "",
        new_password_confirmation: "",
      },
      dataBills: []
    };
  },
  props: ["user", "statusNav"],
  methods: {
    changeFile(event) {
      let data = new FormData();
      data.append("image", event.target.files[0]);
      this.dataFile = data;
    },
    updateAvtar() {
      var self = this;
      this.changeUpdateState();
      Vue.axios
        .post("/api/user/updateAvatar", this.dataFile)
        .then((response) => {
          var res = response.data;
          if (res.status) {
            self.$root.$emit("onLogin", res);
            self.userInfo = res;
          }
          self.statusReponse = res;
        })
        .catch((error) => {
          console.error(error.response);
          self.handleError(error);
        });
    },
    updateInformation() {
      var self = this;
      Vue.axios
        .put("/api/user/update", this.dataInfo)
        .then((response) => {
          var res = response.data;
          if (res.status) {
            self.$root.$emit("onLogin", res);
            self.userInfo = res;
          }
          self.statusReponse = res;
        })
        .catch((error) => {
          console.error(error.response);
          self.handleError(error);
        });
    },
    updatePassword() {
      var self = this;
      Vue.axios
        .put("/api/user/updatePassword", this.dataPassword)
        .then((response) => {
          var res = response.data;
          self.statusReponse = res;
        })
        .catch((error) => {
          console.error(error.response);
          self.handleError(error);
        });
    },
    changeUpdateState() {
      this.statusReponse = {
        status: "updating",
        msg: "Đang cập nhật lên hệ thống...",
      };
    },
    handleError(error) {
      if (error.response.data.status == false) {
        var error = error.response.data;
        this.statusReponse = error;
      } else {
        this.statusReponse = {
          status: false,
          msg: "Có lỗi khi thực hiện cập nhật!",
        };
      }
    },
    fetchBills(){
      var self = this;
      Vue.axios
      .get("/api/bills")
      .then(response => {
        var data = response.data
        console.log(data)
        if(data.status){
          self.dataBills = data.data;
        }
      })
      .catch(error =>{
        console.error(error);
      });
    }
  },
};
</script>