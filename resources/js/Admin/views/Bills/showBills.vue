<template>
  <a-spin :spinning="spinning" tip="Đang tải đơn đặt hàng...">
    <div class="spin-content">
      <template v-if="listBilling != null">
        <card-billing-info :dataBilling="listBilling" />
      </template>
    </div>
  </a-spin>
</template>
<script>
import CardBillingInfo from "../../components/Cards/CardBillingInfo.vue";
export default {
  components: { CardBillingInfo },
  data() {
    return {
      listBilling: null,
      spinning: true,
    };
  },
  beforeMount() {
    this.fetchBilling();
  },
  methods: {
    fetchBilling() {
      var self = this;
      this.spinning = true;
      Vue.axios
        .get("/api/bills")
        .then((response) => {
          self.spinning = false;
          self.listBilling = response.data.data;
        })
        .catch((error) => {
          self.spinning = false;
          console.error(error);
          self.$message.error("Lỗi nội bộ!");
        });
    },
  },
};
</script>