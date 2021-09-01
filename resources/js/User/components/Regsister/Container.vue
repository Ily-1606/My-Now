<template>
  <div>
    <div class="container mb-3">
      <div class="row justify-content-center">
        <div class="col-md-6 col-12 border rounded bg-white">
          <div class="my-4 h5 text-center font-weight-bold">Sign up</div>
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
              Hoặc đăng ký bằng cách điền thông tin dưới đây
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
                Đăng ký thành công
              </div>
            </div>
          </div>
          <div class="mb-3">
            <form action="/">
              <input
                class="form-control my-2"
                placeholder="Nhập tên đầy đủ"
                type="text"
                name="name"
                v-model="form.name"
              /><input
                class="form-control my-2"
                placeholder="Nhập email"
                type="text"
                name="email"
                v-model="form.email"
              />
              <input
                class="form-control my-2"
                placeholder="Nhập mật khẩu"
                type="password"
                name="password"
                v-model="form.password"
              /><input
                class="form-control my-2"
                placeholder="Nhập lại mật khẩu"
                type="password"
                name="password_confirmation"
                v-model="form.password_confirmation"
              />
              <div class="my-4">
                <div class="my-3">
                  <button
                    class="btn btn-primary text-uppercase w-100"
                    v-on:click="regsisterHandle"
                  >
                    Đăng ký
                  </button>
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
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
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
                self.result = response.data;
                self.$root.$emit("onLogin", self.result);
                self.$router.push({ name: "home" });
              })
              .catch((error) => {
                console.error(error);
              });
          }
        },
        { scope: "email" }
      );
    },
    GGLogin: function () {
      gapi.load("client", this.GGStart);
    },
    regsisterHandle(e) {
      e.preventDefault();
      var self = this;
      Vue.axios
        .post("/api/regsister", this.form)
        .then((response) => {
          self.result = response.data;
          if (self.result.status) {
            self.$root.$emit("onLogin", self.result);
            self.$router.push({ name: "home" });
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>

<style>
</style>