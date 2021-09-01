<template>
  <div class="container mb-3">
    <div v-if="listSearch != null">
      <div class="card">
        <div class="card-body">
          <div class="card-title">
            <h5 class="font-weight-bold">Tìm kiếm với từ khóa: {{ q }}</h5>
          </div>
          <template v-if="listSearch.length > 0">
            <div class="row">
              <div
                class="col-lg-6 col-12 mt-2"
                v-for="item in listSearch"
                :key="item"
              >
                <item-left-content
                  :url="item.url"
                  :text="item.name"
                  :location="item.location.province_name"
                  :sale="item.sales"
                  :price="item.money"
                  :image="loadImage(item.files)"
                />
              </div>
            </div>
          </template>
          <template v-else>
            <empty
              message="Không có sản phẩm với từ khóa trên, vui lòng thử từ khóa khác"
            />
          </template>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ItemLeftContent from "../Items/ItemLeftContent.vue";
import Empty from "../Others/Empty.vue";
export default {
  components: { Empty, ItemLeftContent },

  data() {
    return {
      listSearch: null,
      q: this.$route.params.keyWord,
    };
  },
  beforeMount() {
    this.fetchSeach();
  },
  watch: {
    $route(to, from) {
      this.q = to.params.keyWord;
      this.fetchSeach();
    },
  },
  methods: {
    fetchSeach() {
      var self = this;
      Vue.axios
        .get(`/api/search?q=${this.q}`)
        .then((response) => {
          var data = response.data;
          if (data.status) {
            self.listSearch = data.data;
          }
        })
        .catch((error) => {
          console.error(error);
        });
    },
    loadImage(files) {
      return "/" + JSON.parse(files)[0];
    },
  },
};
</script>