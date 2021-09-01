<template>
  <div class="p-4 border-1 border rounded shadow-sm">
    <div class="d-flex align-items-center">
      <img
        class="rounded-circle"
        width="36px"
        height="36px"
        :src="user.image"
      />
      <div class="font-weight-bold text-overflow-ellipsis ml-2">
        {{ user.fullname }}
      </div>
    </div>
    <div class="d-flex align-items-center mt-4 py-2 justify-content-between cursor-pointer" v-bind:class="[statusNav == 'account' ? 'font-weight-bold text-danger' : '']" @click="setStatusNav('account')">
      <div class="d-flex align-items-center">
        <svg-vue icon="user" width="16px" height="16px"></svg-vue>
        <div class="ml-2">Cập nhật tài khoản</div>
      </div>
      <svg-vue icon="arrow_right" width="16px" height="16px"></svg-vue>
    </div>
    <div class="d-flex align-items-center py-2 justify-content-between cursor-pointer" v-bind:class="[statusNav == 'info_order' ? 'font-weight-bold text-danger' : '']" @click="setStatusNav('info_order')">
      <div class="d-flex align-items-center">
        <svg-vue icon="shop" width="16px" height="16px"></svg-vue>
        <div class="ml-2">Thông tin đơn hàng</div>
      </div>
      <svg-vue icon="arrow_right" width="16px" height="16px"></svg-vue>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      userInfo: this.user,
    };
  },
  beforeMount() {
    if (this.userInfo.status == false) {
      this.$router.push({ name: "login" });
    }
  },
  props: ["user","statusNav"],
  methods: {
    setStatusNav(value){
      this.$parent.$data.statusNav = value
    }
  },
};
</script>