<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li
        class="breadcrumb-item"
        v-for="item in data"
        :key="item.name"
        v-bind:class="{ active: item.active }"
      >
        <a href="#">{{ item.name }}</a>
      </li>
    </ol>
  </nav>
</template>
<script>
export default {
  props: ["data"],
};
</script>