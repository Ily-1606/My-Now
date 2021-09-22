<template>
  <div>
    <nav-header></nav-header>
    <div class="container mb-3" style="margin-top: 100px;">
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <h1
          class="
            mr-3
            pr-3
            align-top
            border-right
            inline-block
            align-content-center
          "
        >
          404
        </h1>
        <div class="inline-block align-middle">
          <h2 class="font-weight-normal lead" id="desc">
            The page you requested was not found.
          </h2>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import navHeader from "../navHeader.vue";
export default {
  components: { navHeader },
};
</script>