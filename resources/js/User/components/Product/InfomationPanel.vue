<template>
  <div>
    <breadcrumb :data="dataBreadCrumb" />
    <h5 class="font-weight-bold">{{ dataProduct.name }}</h5>
    <div class="d-flex">
      <div>
        <rate :star="0" />
        <div class="mt-2">{{ dataProduct.total_star }} lượt đánh giá</div>
      </div>
      <div v-if="dataProduct.detail_infomation" class="ml-4">
        Địa chỉ quán: {{ dataProduct.detail_infomation }}
      </div>
      <div v-else class="ml-4">Địa chỉ quán: Chưa rõ</div>
    </div>
    <div class="mt-2">
      <div class="d-flex">
        <div>
          <p class="font-weight-bold">
            Đã bán: {{ dataProduct.sold }} sản phẩm
          </p>
        </div>
        <div class="ml-2">
          <div
            class="font-weight-bold text-success"
            v-if="dataProduct.salary - dataProduct.sold > 0"
          >
            Còn lại {{ dataProduct.salary - dataProduct.sold }} sản phẩm trong
            kho
          </div>
          <div class="font-weight-bold text-danger" v-else>
            Sản phẩm hiện đã hết
          </div>
        </div>
      </div>
      <p>Tùy chỉnh số lượng</p>
      <div class="d-flex justify-content-center">
        <div class="btn border rounded mx-2" @click="SalaryMinus">
          <svg-vue icon="minus" width="24px" height="24px"></svg-vue>
        </div>
        <div class="btn border rounded p-2 px-4 mx-2">{{ Salary }}</div>
        <div class="btn border rounded mx-2" @click="SalaryAdd">
          <svg-vue icon="add" width="24px" height="24px"></svg-vue>
        </div>
      </div>
      <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-6">
          <template v-if="ordered == false">
            <div
              class="btn btn-lg bg-warning text-white w-100"
              v-if="dataProduct.salary - dataProduct.sold > 0"
              @click="callOrder"
            >
              Đặt hàng
            </div>
            <div class="btn btn-lg bg-warning text-white w-100" disabled v-else>
              Đã tạm hết hàng
            </div>
          </template>
          <template v-else-if="ordered == 'running'">
            <div class="btn btn-lg bg-warning text-white w-100" disabled>
              Đang đặt hàng...
            </div>
          </template>
          <template v-else-if="ordered == true">
            <div class="btn btn-lg bg-success text-white w-100" disabled>
              Đã đặt hàng
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Breadcrumb from "../Others/Breadcrumb.vue";
import Rate from "../Others/Rate.vue";
export default {
  components: { Breadcrumb, Rate },
  data() {
    return {
      dataBreadCrumb: [],
      Salary: 0,
      ordered: false,
    };
  },
  beforeMount() {
    this.buildBreadCrumb();
  },
  methods: {
    buildBreadCrumb() {
      this.dataBreadCrumb.push(
        { name: "Home", active: false },
        { name: this.dataProduct.location.province_name, active: false },
        { name: this.dataProduct.name, active: true }
      );
    },
    SalaryAdd() {
      this.Salary++;
    },
    SalaryMinus() {
      this.Salary--;
    },
    callOrder() {
      if (this.Salary > 0) {
        this.ordered = "running";
        var self = this;
        Vue.axios
          .get(
            `/api/cart/remember?id=${this.dataProduct.id}&salary=${this.Salary}`
          )
          .then((response) => {
            self.ordered = true;
            this.$root.$emit("onUpdateCart",true);
          })
          .catch((error) => {
            self.ordered = false;
          });
      }
    },
  },
  props: ["dataProduct"],
};
</script>