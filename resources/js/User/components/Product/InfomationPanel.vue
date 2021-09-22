<template>
  <div>
    <modal title="Chọn vị trí" v-if="modalStatus" id="modalMap">
      <div class="card-body">
        <div class="my-2">
          Hãy yên tâm, chúng tôi sẽ lưu vị trí của bạn lần sau, bạn chỉ cần
          thiết lập bước này lần đầu.
        </div>
        <map-sdk :dataCoordinate="dataCoordinate" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" @click="saveLocation">
          Lưu
        </button>
      </div>
    </modal>
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
            quán
          </div>
          <div class="font-weight-bold text-danger" v-else>
            Sản phẩm hiện đã hết
          </div>
        </div>
      </div>
      <div class="my-2">
        <template v-if="dataProduct.sales">
          <span class="mr-2">
            Giá gốc:
            <span class="font-weight-bold text-danger line-through">{{
              dataProduct.money
            }}</span>
            VND
          </span>
          <span>
            Giảm giá:
            <span class="font-weight-bold text-success h5">{{
              dataProduct.moneyF
            }}</span>
            VND
          </span>
        </template>
        <template v-else>
          Giá:
          <span class="font-weight-bold text-success h5">{{ dataProduct.money }} VND</span>
        </template>
      </div>
      <div class="my-2">
        <span>Phí vận chuyển: </span>
        <span class="ml-2 font-weight-bold text-success">{{
          messageShip
        }}</span>
        <span class="ml-2"
          >(<a href="#" class="link" @click="showModal">Thủ công</a>)</span
        >
      </div>
      <div class="my-2">
        <span>Tổng tiền: </span>
        <span class="font-weight-bold text-success">{{ totalMoney }} VND</span>
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
          <template v-if="canOrder == false">
            <div class="btn btn-lg bg-warning text-white w-100">
              Vui lòng cấu hình vị trí
            </div>
          </template>
          <template v-else>
            <template v-if="ordered == false">
              <div
                class="btn btn-lg bg-warning text-white w-100"
                v-if="dataProduct.salary - dataProduct.sold > 0"
                @click="callOrder"
              >
                Đặt hàng
              </div>
              <div
                class="btn btn-lg bg-warning text-white w-100"
                disabled
                v-else
              >
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
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Modal from "../Modals/Modal.vue";
import Breadcrumb from "../Others/Breadcrumb.vue";
import MapSdk from "../Others/MapSdk.vue";
import Rate from "../Others/Rate.vue";
export default {
  components: { Breadcrumb, Rate, Modal, MapSdk },
  data() {
    return {
      dataBreadCrumb: [],
      Salary: 1,
      ordered: false,
      messageShip: "Đang tính phí vận chuyển...",
      canOrder: false,
      cost_ship: 0,
      totalMoney: 0,
      dataCoordinate: {
        long: null,
        lat: null,
      },
      long: null,
      lat: null,
      modalStatus: true,
    };
  },
  beforeMount() {
    this.buildBreadCrumb();
    this.getCostShip();
  },
  watch: {
    Salary: function () {
      this.totalMoney = this.dataProduct.moneyF * this.Salary + this.cost_ship;
    },
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
    showModal() {
      $("#modalMap").modal("toggle");
    },
    saveLocation() {
      if (this.dataCoordinate.long && this.dataCoordinate.lat) {
        var locationSystem = {
          long: this.dataCoordinate.long,
          lat: this.dataCoordinate.lat,
        };
        window.localStorage.setItem(
          "locationSystem",
          JSON.stringify(locationSystem)
        );
        this.showModal(); //Hide modal
        this.getCostShipCoord(); //Re-fetching cost ship
      } else {
        alert("Vui lòng chọn vị trí trước khi nhấn lưu!");
      }
    },
    callOrder() {
      if (this.Salary > 0) {
        this.ordered = "running";
        var self = this;
        Vue.axios
          .get(
            `/api/cart/remember?id=${this.dataProduct.id}&salary=${this.Salary}&long=${this.long}&lat=${this.lat}`
          )
          .then((response) => {
            self.ordered = true;
            this.$root.$emit("onUpdateCart", true);
          })
          .catch((error) => {
            self.ordered = false;
          });
      }
    },
    getCostShip() {
      //Using GPS
      var self = this;
      navigator.geolocation.getCurrentPosition(
        function (gl) {
          Vue.axios
            .get(
              `/api/posts/CostShip?id=${self.dataProduct.id}&long=${gl.coords.longitude}&lat=${gl.coords.latitude}`
            )
            .then((response) => {
              var data = response.data;
              self.messageShip = data.data.cost_ship + " VND";
              self.long = gl.coords.longitude;
              self.lat = gl.coords.latitude;
              self.cost_ship = data.data.cost_ship;
              self.totalMoney =
                self.dataProduct.moneyF * self.Salary + self.cost_ship;
              self.canOrder = true;
            })
            .catch((error) => {
              console.error(error);
            });
        },
        function (error) {
          var locationSystem = window.localStorage.getItem("locationSystem");
          if (locationSystem) {
            self.getCostShipCoord();
          } else {
            self.messageShip =
              "Không thể sử dụng GPS, không thể tính phí vận chuyển, vui lòng chọn cách thủ công.";
            alert("Vui lòng sử dụng GPS:" + error.message);
          }
        }
      );
    },
    getCostShipCoord() {
      var self = this;
      var locationSystem = window.localStorage.getItem("locationSystem");
      if (locationSystem) {
        locationSystem = JSON.parse(locationSystem);
        Vue.axios
          .get(
            `/api/posts/CostShip?id=${self.dataProduct.id}&long=${locationSystem.long}&lat=${locationSystem.lat}`
          )
          .then((response) => {
            var data = response.data;
            self.messageShip = data.data.cost_ship + " VND";
            self.cost_ship = data.data.cost_ship;
            self.long = locationSystem.long;
            self.lat = locationSystem.lat;
            self.totalMoney =
              self.dataProduct.moneyF * self.Salary + self.cost_ship;
            self.canOrder = true;
          })
          .catch((error) => {
            console.error(error);
          });
      }
    },
  },
  props: ["dataProduct"],
};
</script>