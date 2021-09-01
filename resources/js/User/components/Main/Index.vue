<template>
  <div>
    <nav-header></nav-header>
    <main-container
      style="margin-top: 75px"
      :locationData="locationData"
    ></main-container>
  </div>
</template>
<script>
import navHeader from "../navHeader.vue";
import mainContainer from "../Main/Container.vue";
export default {
  data() {
    return {
      locationData: {
        province: {
          province_id: 1,
        },
        locations: "",
      },
    };
  },
  beforeMount() {
    var locationStorage = window.localStorage.getItem("dataLocation");
    if (locationStorage) {
      this.locationData = JSON.parse(locationStorage);
    } else {
      this.getLocation();
    }
  },
  mounted() {
    this.$root.$on("reIndentify", (msg) => {
      this.indentifyLocation(msg[0], msg[1]);
    });
    this.$root.$on("saveLocation", (msg) => {
      this.locationData = msg;
      window.localStorage.setItem(
        "dataLocation",
        JSON.stringify(this.locationData)
      );
    });
  },
  methods: {
    getLocation() {
      var self = this;
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (info) => {
            var long = info.coords.longitude;
            var lat = info.coords.latitude;
            this.indentifyLocation(long, lat);
          },
          (error) => {
            console.error(error);
          }
        );
      }
    },
    indentifyLocation(long, lat) {
      var self = this;
      Vue.axios
        .get(`/api/locations/indentify?long=${long}&lat=${lat}`)
        .then((response) => {
          var res = response.data;
          if (res.status) {
            self.locationData = {};
            self.locationData.province = res.data.province;
            self.locationData.locations = "";
            res.data.listInfo.forEach((element) => {
              self.locationData.locations = `${element.name}, ${self.locationData.locations}`;
            });
            window.localStorage.setItem(
              "dataLocation",
              JSON.stringify(self.locationData)
            );
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
  components: { navHeader, mainContainer },
};
</script>