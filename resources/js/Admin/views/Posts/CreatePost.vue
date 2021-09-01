<template>
  <a-row type="flex" :gutter="[24, 24]" justify="space-around" align="middle">
    <a-col
      :span="24"
      :md="12"
      :lg="{ span: 12, offset: 0 }"
      :xl="{ span: 12, offset: 0 }"
    >
      <form-post></form-post>
    </a-col>
  </a-row>
</template>
<script>
import formPost from "./formPost.vue";
export default {
  components: { formPost },
};
</script>