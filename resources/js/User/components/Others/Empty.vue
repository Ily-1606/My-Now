<template>
  <div class="col-12 text-center">
    <svg-vue icon="box" width="24px" height="24px"></svg-vue>
    <span class="ml-2" v-if="message">{{message}}</span>
    <span class="ml-2" v-else>Không có sản phẩm ở gần đây.</span>
  </div>
</template>
<script>
export default {
  props: ["message"]
}
</script>