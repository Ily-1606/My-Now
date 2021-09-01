<template>
  <div>
    <div class="container mb-3">
      <div class="row">
        <div class="col-md-4 col-12">
          <panel-control :user="$attrs.user" :statusNav="statusNav" />
        </div>
        <div class="col-md-8 col-12">
          <panel-action :user="$attrs.user" :statusNav="statusNav" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import panelControl from "./panelControl.vue";
import panelAction from "./PanelAction.vue";
export default {
  components: { panelControl, panelAction },
  data() {
    return {
      statusNav: this.$route.params.option =="bill" ? "info_order" : "account",
    };
  },
};
</script>