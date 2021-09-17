<template>
  <div class="container mb-3">
    <div v-if="listCart">
      <modal :title="'Chọn địa điểm giao hàng'" :id="'ChosseLocation'">
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="cacheLocation">Địa điểm giao hàng</label>
              <input
                type="text"
                class="form-control"
                v-model="cacheLocation"
                placeholder="Nhập địa điểm giao hàng"
                id="cacheLocation"
              />
            </div>
            <div class="form-group">
              <label for="cacheNumberphone">Số điện thoại</label>
              <input
                type="text"
                class="form-control"
                v-model="cacheNumberphone"
                placeholder="Nhập số điện thoại"
                id="cacheNumberphone"
              />
            </div>
            <div class="form-group">
              <label for="orderNote">Ghi chú</label>
              <input
                type="text"
                class="form-control"
                v-model="orderNote"
                placeholder="Ghi chú để lại cho chủ quán"
                id="orderNote"
              />
            </div>
            <div class="form-group">
              <template v-if="confirming">
                <button class="btn btn-success" disabled>
                  Đang tạo hóa đơn
                </button>
              </template>
              <template v-else>
                <button class="btn btn-success" @click="orderConfirm">
                  Xác nhận
                </button>
              </template>
            </div>
          </form>
        </div>
      </modal>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Giỏ hàng</h5>
          <div class="card-text">
            <template v-if="listCart.length > 0">
              <div class="row" v-for="item in listCart" :key="item.product_id">
                <div class="col-12">
                  <CartItem
                    :image="getImage(item.data_product.files)"
                    :money="item.money"
                    :name="item.data_product.name"
                    :salary="item.salary"
                    :sales="item.sales"
                    :total_money="item.total_money"
                    :url="item.url"
                    :cost_ship="item.cost_ship"
                    :order_time="item.order_time"
                    :product_id="item.product_id"
                    :function_delete="deleteCartItem"
                  />
                </div>
              </div>
              <div class="row m-2">
                <div class="col font-weight-bold">
                  Tổng thanh toán là: {{ total_order_money }} VND
                </div>
                <div class="col text-right">
                  <button class="btn btn-primary" @click="handleConfirmAll">
                    Thanh toán
                  </button>
                </div>
              </div>
            </template>
            <template v-else>
              <empty
                :message="'Bạn chưa mua gì cả, hay mua sắm vài thứ, rồi quay trở lại đây nhé'"
              />
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import CartItem from "../Items/Cart.vue";
import Empty from "../Others/Empty.vue";
import Modal from "../Modals/Modal.vue";
export default {
  components: { CartItem, Empty, Modal },
  data() {
    return {
      listCart: null,
      total_order_money: 0,
      cacheLocation: "",
      cacheNumberphone: "",
      confirming: false,
      product_id_ordering: "all",
      orderNote: "",
    };
  },
  beforeMount() {
    this.fetchCart();
    this.$on("deleteItem", (product_id) => {
      this.deleteCartItem(product_id);
    });
    this.$on("orderItem", product_id =>{
      this.handleConfirm();
      this.product_id_ordering = product_id;
    });
    var dataLocation = window.localStorage.getItem("dataLocation");
    if (dataLocation) {
      this.cacheLocation = JSON.parse(dataLocation).locations;
    }
    var cacheNumberphone = window.localStorage.getItem("cacheNumberphone");
    if (dataLocation) {
      this.cacheNumberphone = cacheNumberphone;
    }
  },
  methods: {
    fetchCart() {
      var self = this;
      Vue.axios
        .get("/api/cart/remember/get")
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.listCart = data.data;
            self.total_order_money = data.total_order_money;
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getImage(files) {
      var files = JSON.parse(files);
      return files[0];
    },
    deleteCartItem(id) {
      var self = this;
      Vue.axios
        .delete(`/api/cart/remember/remove?product_id=${id}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.listCart = data.data;
            self.total_order_money = data.total_order_money;
            self.$root.$emit("onUpdateCart", true);
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    handleConfirmAll(){
      this.product_id_ordering = "all";
      this.handleConfirm()
    },
    handleConfirm() {
      $("#ChosseLocation").modal("toggle");
    },
    orderConfirm() {
      var dataLocation = window.localStorage.getItem("dataLocation");
      if (dataLocation) {
        var dataLocation = JSON.parse(dataLocation);
        dataLocation.locations = this.cacheLocation;
        window.localStorage.setItem(
          "dataLocation",
          JSON.stringify(dataLocation)
        );
      } else {
        var dataLocation = {};
        dataLocation.locations = this.cacheLocation;
        window.localStorage.setItem(
          "dataLocation",
          JSON.stringify(dataLocation)
        );
      }
      if(this.cacheNumberphone)
      window.localStorage.setItem("cacheNumberphone", this.cacheNumberphone);
      this.confirming = true;
      var self = this;
      Vue.axios
        .post("/api/bills", {
          product_id_ordering: self.product_id_ordering,
          dataLocation: self.cacheLocation,
          dataPhone: self.cacheNumberphone,
          orderNote: self.orderNote,
        })
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.confirming = false;
            self.fetchCart();
            self.$root.$emit("onUpdateCart", true);
            self.handleConfirm()
          }
        })
        .catch((error) => {
          self.confirming = false;
          console.error(error);
          alert(error.response.data.msg)
        });
    },
  },
};
</script>