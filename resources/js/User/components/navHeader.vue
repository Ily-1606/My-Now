<template>
  <div class="bg-white fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
          <img
            src="/images/logo-220.png"
            alt="Logo My Now"
            height="50px"
            class="rounded"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto h6">
            <li class="nav-item py-1" v-bind:class="{active: $route.name =='home'}">
              <router-link to="/" tag="a" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Đồ ăn</a>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Thực phẩm</a>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Bia</a>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Hoa</a>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Siêu thị</a>
            </li>
            <li class="nav-item py-1">
              <a class="nav-link" href="#">Thuốc</a>
            </li>
            <li class="nav-item py-1" v-bind:class="{active: $route.name =='cart_info'}">
              <router-link tag="a" class="nav-link" to="/cart">Giỏ hàng<b class="text-success ml-2" v-if="cartCount>0">({{cartCount}})</b></router-link>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" v-on:submit="hanlderSearch">
            <input
              class="form-control"
              type="search"
              placeholder="Tìm kiếm sản phẩm"
              aria-label="Tìm kiếm sản phẩm"
              v-model="searchValue"
            />
            <button class="my-sm-0 btn" type="submit">
              <svg-vue icon="search" width="24px" height="24px"></svg-vue>
            </button>
          </form>
          <div v-if="userInfo.status == true">
            <div class="d-flex align-items-center">
              <router-link tag="a" to="/profile">
                <div class="d-flex align-items-center">
                  <img
                    class="rounded-circle"
                    :src="userInfo.image"
                    width="24px"
                    height="24px"
                  />
                  <span
                    class="font-weight-bold text-overflow-ellipsis ml-2"
                    style="width: 100px"
                    >{{ userInfo.fullname }}</span
                  >
                </div>
              </router-link>
              <span
                class="
                  small
                  font-italic font-weight-light
                  text-primary
                  cursor-pointer
                "
                v-on:click="logout"
                >(Đăng xuất)</span
              >
            </div>
          </div>
          <router-link
            v-else
            to="/login"
            tag="a"
            class="btn border-info p-2 font-weight-bold"
            >Đăng nhập</router-link
          >
        </div>
      </nav>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      userInfo: {
        status: false,
      },
      cartCount: 0,
      searchValue: ""
    };
  },
  beforeMount: function () {
    this.fetchUser();
    this.fetchCart();
    var self = this;
    this.$root.$on("onLogin", (msg) => {
      self.userInfo = msg;
      this.$parent.userInfo = self.userInfo
      this.$root.$emit("userInfo",self.userInfo)
    });
    this.$root.$on("onUpdateCart", msg =>{
      this.fetchCart();
    });
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    fetchUser: function () {
      var self = this;
      Vue.axios
        .get("/api/user/info")
        .then((response) => {
          self.userInfo = response.data;
          this.$root.$emit("userInfo",self.userInfo)
        })
        .catch((error) => {
          console.log(error);
          self.userInfo = {};
          self.userInfo.status = false;
          this.$parent.userInfo = self.userInfo
          this.$root.$emit("userInfo",self.userInfo)
        });
    },
    logout() {
      var self = this;
      Vue.axios
        .get("/api/logout")
        .then((response) => {
          self.userInfo = {
            status: false,
          };
          this.$parent.userInfo = self.userInfo
          this.$router.push({ name: "login" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    fetchCart(){
      var self = this;
      Vue.axios
      .get("/api/cart/remember/get?type=count")
      .then(response =>{
        var data = response.data;
        self.cartCount = data.count;
      })
      .catch(error =>{
        console.error(error);
      })
    },
    hanlderSearch(event){
      event.preventDefault();
      this.$root.$router.push({name: "search", params: { keyWord: this.searchValue}});
      //this.$root.$router.push({name: "search"});
    }
  },
};
</script>
