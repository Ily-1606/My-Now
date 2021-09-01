<template>
  <div>
    <div class="container mb-3">
      <div class="row justify-content-center">
        <div class="col-md-6 col-12 border rounded bg-white">
          <div class="my-4 h5 text-center font-weight-bold">Sign in</div>
          <div class="my-3">
            <button class="btn btn-primary w-100" v-on:click="FBLogin()">
              <svg-vue icon="facebook" width="24px" height="24px"></svg-vue>
              <span class="ml-2 text-uppercase">Facebook</span>
            </button>
            <button class="btn btn-danger w-100 mt-2" v-on:click="GGLogin()">
              <svg-vue icon="google" width="24px" height="24px"></svg-vue>
              <span class="ml-2 text-uppercase">Google</span>
            </button>
          </div>
          <div class="my-5">
            <div class="small muted text-center">
              Hoặc đăng nhập bằng tài khoản của bạn
            </div>
            <div class="my-2" v-if="result.status != undefined">
              <div
                class="text-center border border-danger rounded p-2 text-danger"
                v-if="result.status == false"
              >
                {{ result.msg }}
              </div>
              <div
                class="
                  text-center
                  border border-success
                  rounded
                  p-2
                  text-success
                "
                v-if="result.status"
              >
                Đăng nhập thành công
              </div>
            </div>
          </div>
          <div class="mb-3">
            <form action="/" @submit="loginPage">
              <input
                class="form-control my-2"
                placeholder="Username or email"
                type="text"
                name="email"
                v-model="LoginForm.email"
              />
              <input
                class="form-control my-2"
                placeholder="Password"
                type="password"
                name="password"
                v-model="LoginForm.password"
              />
              <div class="my-4">
                <div class="form-check d-inline-block">
                  <input
                    type="checkbox"
                    name="remember"
                    class="form-check-input"
                    id="remember"
                    v-model="LoginForm.remember"
                  />
                  <label for="remember" class="form-check-label"
                    >Lưu thông tin đăng nhập</label
                  >
                </div>
                <div class="float-right">
                  <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="my-3">
                  <button class="btn btn-primary text-uppercase w-100">
                    Đăng nhập
                  </button>
                </div>
                <div class="my-2 text-center">
                  Bạn chưa có tài khoản? Hãy
                  <router-link to="/regsister" tag="a">đăng ký</router-link>
                </div>
                <div class="my-5 text-center">
                  <div>
                    Chúng tôi không sử dụng thông tin của bạn với bất kỳ mục
                    đích nào. Bằng cách đăng nhập hoặc đăng ký, bạn đồng ý với
                    <a href="#">Điều khoản của chúng tôi</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created: function () {
    window.fbAsyncInit = function () {
      FB.init({
        appId: "511312209933949",
        cookie: true,
        xfbml: true,
        version: "v11.0",
      });
      FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
      var js,
        fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");

    (function (d, s, id) {
      var js,
        fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }
      js = d.createElement(s);
      js.id = id;
      js.src = "https://apis.google.com/js/api.js";
      fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "google-jssdk");

    function start() {
      // 2. Initialize the JavaScript client library.
      gapi.client
        .init({
          apiKey: "AIzaSyBkU-70I6hpeLqhIqlPNsR_HUsll6cMb9g",
          // Your API key will be automatically added to the Discovery Document URLs.
          discoveryDocs: ["https://people.googleapis.com/$discovery/rest"],
          // clientId and scope are optional if auth is not required.
          clientId:
            "878426957921-1nb3ou4ead95agl2e9cuut43tdm35q63.apps.googleusercontent.com",
          scope: "profile",
        })
        .then(function () {
          // 3. Initialize and make the API request.
          return gapi.client.people.people.get({
            resourceName: "people/me",
            "requestMask.includeField": "person.names",
          });
        })
        .then(
          function (response) {
            console.log(response.result);
          },
          function (reason) {
            console.log("Error: " + reason.result.error.message);
          }
        );
    }
    this.GGStart = start;
  },
  data: () => {
    return {
      result: {},
      LoginForm: {
        email: "",
        password: "",
        remember: true,
      },
    };
  },
  methods: {
    FBLogin: function (event) {
      var self = this;
      FB.login(
        function (response) {
          if (response.status == "connected") {
            var access_token = response.authResponse.accessToken;
            Vue.axios
              .get(`/api/facebook/auth?access_token=${access_token}`)
              .then((response) => {
                if (response.data.status) {
                  self.$root.$emit("onLogin", self.result);
                  self.$router.push({ name: "home" });
                }
                self.result = response.data;
              })
              .catch((error) => {
                console.error(error);
                self.result = error.response.data;
              });
          }
        },
        { scope: "email" }
      );
    },
    GGLogin: function () {
      gapi.load("client", this.GGStart);
    },
    loginPage(e) {
      e.preventDefault();
      var self = this;
      this.result = {};
      Vue.axios
        .post("/api/login", this.LoginForm)
        .then((response) => {
          if (response.data.status) {
            self.$root.$emit("onLogin", self.result);
            self.$router.push({ name: "home" });
          }
          self.result = response.data;
        })
        .catch((error) => {
          console.error(error);
          self.result = error.response.data;
        });
    },
  },
};
</script>

<style>
</style>