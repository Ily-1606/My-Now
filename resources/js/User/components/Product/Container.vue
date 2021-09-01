<template>
  <div class="container mb-3">
    <template v-if="infoProduct">
      <div class="row" v-if="infoProduct">
        <div class="col-12 col-md-6 mt-2">
          <image-panel :dataProduct="infoProduct" />
        </div>
        <div class="col-12 col-md-6 mt-2">
          <infomation-panel :dataProduct="infoProduct" />
        </div>
      </div>
      <div class="row my-4">
        <div class="col-12">
          <detail-panel :dataProduct="infoProduct" />
        </div>
      </div>
    </template>
  </div>
</template>
<script>
import DetailPanel from "./DetailPanel.vue";
import ImagePanel from "./ImagePanel.vue";
import InfomationPanel from "./InfomationPanel.vue";
export default {
  data() {
    return {
      infoProduct: null,
    };
  },
  beforeMount() {
    this.loadInfoProduct();
  },
  components: { ImagePanel, InfomationPanel, DetailPanel },
  methods: {
    loadInfoProduct() {
      var self = this;
      Vue.axios
        .get(`/api/posts/info?id=${this.$route.params[1]}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.infoProduct = data.data;
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>