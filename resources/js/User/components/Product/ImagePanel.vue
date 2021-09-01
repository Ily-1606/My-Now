<template>
  <div>
    <modal title="Hình ảnh của sản phẩm" id="modalImg">
      <div class="card-body">
        <div class="card-img-bg">
          <img :src="stateImg" width="100%" height="100%" />
        </div>
      </div>
    </modal>
    <div class="image_cover">
      <img width="100%" height="100%" :src="getFirstFile(dataProduct.files)" />
    </div>
    <div class="row">
      <div class="col-12">
        <div class="small my-2">Các hình ảnh của sản phẩm</div>
      </div>
    </div>
    <div class="row">
      <div
        class="col-md-2 small_image"
        v-for="file in getlistFile(dataProduct.files)"
        :key="file"
      >
        <img :src="'/' + file" @click="showModalImg" />
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.image_cover {
  width: 100%;
  height: 300px;
  img {
    border-radius: 10px;
  }
}
.small_image {
  min-height: 40px;
  max-height: 100px;
  max-width: 150px;
  img {
    width: 100%;
    height: 100%;
    border-radius: 5px;
  }
}
</style>
<script>
import Modal from "../Modals/Modal.vue";
export default {
  components: { Modal },
  props: ["dataProduct"],
  data() {
    return {
      stateImg: "",
    };
  },
  methods: {
    getFirstFile(files) {
      files = JSON.parse(files);
      return `/${files[0]}`;
    },
    getlistFile(files) {
      return JSON.parse(files);
    },
    showModalImg(event) {
      this.stateImg = event.target.getAttribute("src");
      $("#modalImg").modal("toggle");
    },
  },
};
</script>