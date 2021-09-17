<template>
  <div class="row border rounded p-2 m-2">
    <div class="col-12 col-md-6 col-lg-4">
      <img :src="image" class="rounded img_medimum" />
    </div>
    <div class="col-12 col-md-6 col-lg-8">
      <div class="my-2 h5 font-weight-bold">{{ name }}</div>
      <div class="d-inline-block my-2">
        <span class="font-weight-bold text-primary"
          >Số lượng: {{ salary }}</span
        >
        <span class="font-weight-bold text-primary mx-2"
          >Đơn giá: {{ money }} VND</span
        >
        <span class="font-weight-bold text-primary mx-2" v-if="sales"
          >Đã giảm: {{ sales }} VND</span
        ><span class="font-weight-bold text-primary mx-2"
          >Phí vận chuyển: {{ cost_ship }} VND</span
        >
        <span class="font-weight-bold text-success mx-2"
          >Thành tiền: {{ total_money }} VND</span
        >
      </div>
      <div class="my-2">Thời gian đặt: {{ order_time }}</div>
      <div class="my-2">
        <router-link :to="url" tag="a" class="link"
          >Xem thông tin sản phẩm</router-link
        >
      </div>
      <div class="float-right">
        <span
          @click="deleteItem(product_id)"
          :product_id="product_id"
          class="cursor-pointer"
        >
          <svg-vue
            icon="trash"
            width="24px"
            height="24px"
            class="text-danger mx-2"
          ></svg-vue>
        </span>
        <span
          @click="orderItem(product_id)"
          :product_id="product_id"
          class="cursor-pointer"
        >
          <svg-vue
            icon="check"
            width="24px"
            height="24px"
            class="text-success mx-2"
          ></svg-vue>
        </span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: [
    "image",
    "name",
    "money",
    "salary",
    "sales",
    "total_money",
    "url",
    "order_time",
    "product_id",
    "cost_ship",
  ],
  methods: {
    deleteItem(id) {
      this.$parent.$emit("deleteItem", id);
    },
    orderItem(id) {
      this.$parent.$emit("orderItem", id);
    },
  },
};
</script>