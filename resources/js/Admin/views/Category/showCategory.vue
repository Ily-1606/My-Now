<template>
  <div>
    <a-row type="flex" :gutter="4">
      <a-col :span="24" :md="12" class="col-info">
        <list-categorys :updateStatus="updateStatus" />
      </a-col>
      <a-col
        :span="24"
        :md="12"
        :lg="{ span: 12, offset: 0 }"
        :xl="{ span: 12, offset: 0 }"
      >
        <create-category />
      </a-col>
    </a-row>
  </div>
</template>
<script>
import createCategory from "./create.vue";
import listCategorys from "./list.vue";
export default {
  components: { createCategory, listCategorys },
  data() {
    return {
      updateStatus: false,
    };
  },
  beforeMount() {
    this.$root.$on("updateCat", (msg) => {
      this.updateStatus = msg;
    });
  },
};
</script>