<template>
  <div class="d-flex text-warning">
    <svg-vue icon="full-star" width="24px" height="24px" v-for="i in Math.floor(star)" :key="i"></svg-vue>
    <svg-vue icon="half-star" width="24px" height="24px" v-if="Math.floor(star) < star && star < Math.ceil(star)"></svg-vue>
    <svg-vue icon="star" width="24px" height="24px" v-for="i in range(Math.ceil(star)+1,5)" :key="i"></svg-vue>
  </div>
</template>
<script>
export default {
  props: ["star"],
  methods: {
    range: function (min, max) {
      var array = [],
        j = 0;
      for (var i = min; i <= max; i++) {
        array[j] = i;
        j++;
      }
      return array;
    },
  },
};
</script>