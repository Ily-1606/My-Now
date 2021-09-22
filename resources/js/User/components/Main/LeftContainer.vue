<template>
  <div class="mr-2">
    <div class="mb-2" v-if="dataNear">
      <div class="h4 font-weight-bold text-white">Đặt đồ ăn</div>
      <div class="font-weight-bold text-white" v-if="dataNear.data">
        Có {{dataNear.data.count}} món ăn ở gần bạn
      </div>
    </div>
    <div class="mb-4">
      <form class="row m-0">
        <div class="col p-0">
          <input
            type="text"
            class="form-control form-control-lg preend"
            placeholder="Tìm đồ ăn, địa điểm"
          />
        </div>
        <div class="col-auto p-0">
          <button class="btn btn-info text-white append py-0-6 px-3">
            <svg-vue icon="search" width="24px" height="24px"></svg-vue>
          </button>
        </div>
      </form>
    </div>
    <div class="mb-4" v-if="categoryList != null">
      <Tag :text="item.name" class="mr-3 mb-3" v-for="item in categoryList" :key="item.id" :id="item.id" />
    </div>
  </div>
</template>
<script>
import Tag from "./Tag.vue";
export default {
  components: { Tag },
  props: ["locationData"],
  data(){
    return {
      dataNear: null,
      categoryList: null
    }
  },
  beforeMount(){
    this.getDataNear()
    this.getCategory();
  },
  methods: {
    getDataNear() {
      var self = this;
      Vue.axios
        .get(
          `/api/locations/getNear?location_id=${this.locationData.province.province_id}`
        )
        .then((response) => {
          var data = response.data;
          self.dataNear = data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getCategory(){
      var self = this;
      Vue.axios
      .get(`/api/categorys/list`)
      .then(response =>{
        self.categoryList = response.data.data
      })
      .catch(error =>{
        console.error(error);
      });
    }
  },
};
</script>