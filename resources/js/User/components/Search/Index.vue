<template>
  <div>
    <nav-header></nav-header>
    <container style="margin-top: 100px"></container>
    <x-footer></x-footer>
  </div>
</template>
<script>
import navHeader from "../navHeader.vue";
import XFooter from "../XFooter.vue";
import Container from "./Container.vue";
export default {
  setup() {},
  components: { navHeader, Container, XFooter },
};
</script>