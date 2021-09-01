<template>
  <div class="ml-2">
    <modal title="Chọn địa điểm" :id="idModal">
      <div class="modal-body">
        <div class="font-weight-bold">
          Bạn có thể sử dụng tự động chọn location bằng cách nhấn
          <a href="#" @click="bindLocation">vào đây</a>(vui lòng bật GPS và cho
          phép quyền vị trí)
        </div>
        <div class="form-group">
          <label for="chosseProvince">Chọn tỉnh/thành phố</label>
          <select
            class="form-control-lg form-control"
            v-model="locationData.province.province_id"
            @change="changeProvince"
          >
            <option
              v-for="location in dataLocation"
              :key="location.province_id"
              :value="location.province_id"
              :selected="
                locationData.province.province_id == location.province_id
              "
            >
              {{ location.province_name }}
            </option>
          </select>
        </div>
        <input
          class="form-control-lg form-control"
          type="text"
          placeholder="Nhập địa chỉ bạn muốn giao hàng đến"
          v-model="locationData.locations"
          @input="locations = $event.target.value"
        />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" @click="saveLocation">
          Lưu
        </button>
      </div>
    </modal>
    <div class="mb-2 bg-white rounded">
      <div class="px-3 py-2" @click="showModal">
        Giao hàng đến -
        <span class="font-weight-bold">{{
          locationData != null ? locationData.locations : ""
        }}</span>
      </div>
    </div>
    <div class="mb-2 bg-white rounded">
      <div class="card p-2">
        <div class="card-header bg-white border-0">
          <div class="card-title d-inline-block h5 font-weight-bold mb-0">
            Ưu đãi
          </div>
          <div class="float-right">Xem tất cả</div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <template v-if="loadingLoadSale">
              <loading />
            </template>
            <template v-else>
              <template v-if="PostsSaling.length > 0">
                <div
                  class="col-6 col-md-4 p-1"
                  v-for="item in PostsSaling"
                  :key="item.id"
                >
                  <router-link :to="item.link" tag="a">
                    <Item
                      :image="buidURLFile(item.files)"
                      location="xx địa điểm"
                      link="#"
                      :text="item.name"
                    />
                  </router-link>
                </div>
              </template>
              <template v-else>
                <empty />
              </template>
            </template>
          </div>
        </div>
      </div>
    </div>
    <div class="mb-2 bg-white rounded">
      <div class="card p-2">
        <div class="mt-2">
          <ul class="nav nav-custom">
            <li class="nav-item">
              <a
                class="nav-link"
                v-bind:class="{ active: tabStatus == 'near' }"
                href="#"
                @click="setTabStatus('near')"
                >Gần tôi</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-bind:class="{ active: tabStatus == 'hot' }"
                @click="setTabStatus('hot')"
                >Bán chạy</a
              >
            </li>
          </ul>
        </div>
        <div class="card-body pt-0">
          <div v-show="tabStatus == 'near'">
            <template v-if="loadingLoadNear">
              <loading />
            </template>
            <template v-else>
              <template v-if="PostNear.length > 0">
                <div v-for="item in PostNear" :key="item.id" class="mt-2">
                  <item-left-content
                    :url="item.link"
                    :image="buidURLFile(item.files)"
                    :text="item.name"
                    location="12/2 Nguyễn Tuân, P. 3, Gò Vấp, TP. HCM"
                    :sale="item.sales"
                    :price="item.money"
                    class="mt-1"
                  />
                </div>
              </template>
              <template v-else>
                <empty />
              </template>
            </template>
          </div>
          <div v-show="tabStatus == 'hot'">
            <template v-if="loadingLoadHot">
              <loading />
            </template>
            <template v-else>
              <template v-if="PostHot.length > 0">
                <div v-for="item in PostHot" :key="item.id" class="mt-2">
                  <item-left-content
                    :url="item.link"
                    :image="buidURLFile(item.files)"
                    :text="item.name"
                    location="12/2 Nguyễn Tuân, P. 3, Gò Vấp, TP. HCM"
                    :sale="item.sales"
                    :price="item.money"
                    class="mt-1"
                  />
                </div>
              </template>
              <template v-else>
                <empty />
              </template>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import Item from "../Items/Item.vue";
import ItemLeftContent from "../Items/ItemLeftContent.vue";
import Modal from "../Modals/Modal.vue";
import Loading from "../Others/Loading.vue";
import Empty from "../Others/Empty.vue";
export default {
  props: ["locationData"],
  data() {
    return {
      idModal: "chooseLocation",
      dataLocation: null,
      locations: "",
      pronvinceInfo: {},
      loadingLoadSale: true,
      PostsSaling: [],
      loadingLoadNear: true,
      PostNear: [],
      loadingLoadHot: true,
      PostHot: [],
      tabStatus: "near",
    };
  },
  components: { Item, ItemLeftContent, Modal, Loading, Empty },
  methods: {
    showModal() {
      $(`#${this.idModal}`).modal("toggle");
      this.getLocations();
    },
    getLocations() {
      var self = this;
      Vue.axios
        .get("/api/locations/get")
        .then((response) => {
          var data = response.data;
          if (data.result) self.dataLocation = data.data;
        })
        .catch((error) => {
          consol.error(error);
        });
    },
    bindLocation() {
      var self = this;
      navigator.geolocation.getCurrentPosition(
        function (gl) {
          self.$root.$emit("reIndentify", [
            gl.coords.longitude,
            gl.coords.latitude,
          ]);
        },
        function (error) {
          alert(error.message);
        }
      );
    },
    saveLocation() {
      if (!this.locations) this.locations = this.locationData.locations;
      if (this.pronvinceInfo.province_id == undefined)
        this.pronvinceInfo = this.locationData.province;
      this.$root.$emit("saveLocation", {
        locations: this.locations,
        province: this.pronvinceInfo,
      });
      $(`#${this.idModal}`).modal("hide");
    },
    changeProvince(event) {
      this.pronvinceInfo = {};
      this.pronvinceInfo.province_id = event.target.value;
    },
    loadFeed(url, callback) {
      Vue.axios
        .get(url)
        .then((response) => {
          var data = response.data;
          callback(data);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    buidURLFile(listFile) {
      listFile = JSON.parse(listFile);
      return listFile[0];
    },
    handlerChangeLocation() {
      this.loadFeed(
        `/api/posts/list?perpage=12&sale=true&location=${this.$props.locationData.province.province_id}`,
        (data) => {
          this.PostsSaling = data.data;
          this.loadingLoadSale = false;
        }
      );
      this.loadFeed(
        `/api/posts/list?perpage=12&location=${this.$props.locationData.province.province_id}`,
        (data) => {
          this.PostNear = data.data;
          this.loadingLoadNear = false;
        }
      );
      this.loadFeed(`/api/posts/list?perpage=12&orderBy=hot`, (data) => {
        this.PostHot = data.data;
        this.loadingLoadHot = false;
      });
    },
    setTabStatus(value) {
      this.tabStatus = value;
    },
  },
  watch: {
    locationData: function (newValue) {
      this.handlerChangeLocation();
    },
  },
  beforeMount() {
    this.handlerChangeLocation();
  },
};
</script>