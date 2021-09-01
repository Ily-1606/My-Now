<template>
  <div>
    <nav-header />
    <template v-if="userInfo.status != undefined">
      <container style="margin-top: 100px" :user="userInfo" />
    </template>
    <x-footer></x-footer>
  </div>
</template>
<script>
import NavHeader from "../navHeader.vue";
import XFooter from '../XFooter.vue';
import Container from "./Container.vue";
export default {
  components: { Container, NavHeader, XFooter },
  data() {
    return {
      userInfo: {
        status: undefined,
      },
    };
  },
  created() {
    var self = this;
    this.$root.$on("userInfo", (msg) => {
      self.userInfo = msg;
    });
  },
};
</script>