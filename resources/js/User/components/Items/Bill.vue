<template>
  <div class="row border rounded p-2 m-2">
    <div class="col-12 col-md-6 col-lg-4">
      <img :src="getFile(data.files)" class="rounded img_medimum" />
    </div>
    <div class="col-12 col-md-6 col-lg-8">
      <div class="my-2 h5 font-weight-bold">{{ data.name }}</div>
      <div class="d-inline-block my-2">
        <span class="font-weight-bold text-primary"
          >Số lượng: {{ data.salary }}</span
        >
        <span class="font-weight-bold text-success mx-2"
          >Thành tiền: {{ data.money }} VND</span
        >
      </div>
      <div>
        <div class="my-2"><b>Địa chỉ nhận hàng:</b> {{ data.address }}</div>
        <div class="my-2"><b>Số điện thoại:</b> {{ data.numberphone }}</div>
        <div>
          <b>Ghi chú:</b><i>{{ data.note }}</i>
        </div>
      </div>
      <div>
        <b>Trạng thái:</b>
        <span v-if="data.status == 'created'">Đang xử lý</span>
        <span v-else-if="data.status == 'doing'">Đang vận chuyển</span>
        <span v-else-if="data.status == 'done'">Đã giao hàng</span>
        <span v-else-if="data.status == 'denied'">Đã từ chối đơn hàng</span>
      </div>
      <div class="my-2">Thời gian đặt: {{ data.order_time }}</div>
      <div class="my-2">
        <router-link :to="data.url" tag="a" class="link"
          >Xem thông tin sản phẩm</router-link
        >
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["data"],
  methods:{
    getFile(files){
      return "/"+JSON.parse(files)[0];
    }
  }
};
</script>