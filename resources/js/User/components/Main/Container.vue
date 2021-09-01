<template>
<div>
  <div class="background-food">
    <div class="container py-4">
      <div class="row align-items-center">
        <div class="col-md-5 col-sm-12">
          <left-container></left-container>
        </div>
        <div class="col-md-7 col-sm-12 vh-100 overflow-auto modify-scroll-bar">
          <right-container :locationData="locationData"></right-container>
        </div>
      </div>
    </div>
  </div>
  <div class="main-footer">
    <div class="container py-4">
      <card title="Giao hàng nhanh" des="Hệ thống với hàng trăm shiper trực tuyến và sẵn sàng đợi giao hàng" />
    </div>
    <x-footer></x-footer>
  </div>
</div>
</template>
<script>
import XFooter from '../XFooter.vue';
import Card from './Card.vue';
import LeftContainer from "./LeftContainer.vue";
import RightContainer from "./RightContainer.vue";
export default {
  components: { LeftContainer, RightContainer, Card, XFooter },
  props: ["locationData"],
  mounted() {
    console.log("Main container mounted!");
  },
};
</script>