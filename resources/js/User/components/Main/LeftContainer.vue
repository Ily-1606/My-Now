<template>
  <div class="mr-2">
    <div class="mb-2">
      <div class="h4 font-weight-bold text-white">Đặt đồ ăn</div>
      <div class="font-weight-bold text-white">
        Có $x địa điểm ở $y từ 06:00 - 17:00
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
    <div class="mb-4">
      <Tag text="All" class="mr-3 mb-3" />
      <Tag text="Đồ ăn" class="mr-3 mb-3" />
      <Tag text="Đồ uống" class="mr-3 mb-3" />
      <Tag text="Đồ chay" class="mr-3 mb-3" />
      <Tag text="Bánh kem" class="mr-3 mb-3" />
      <Tag text="Tráng miệng" class="mr-3 mb-3" />
      <Tag text="Homemade" class="mr-3 mb-3" />
      <Tag text="Vỉa hè" class="mr-3 mb-3" />
      <Tag text="Pizza/Burger" class="mr-3 mb-3" />
      <Tag text="Món gà" class="mr-3 mb-3" />
      <Tag text="Món lẩu" class="mr-3 mb-3" />
      <Tag text="Sushi" class="mr-3 mb-3" />
      <Tag text="Mì phở" class="mr-3 mb-3" />
      <Tag text="Cơm hộp" class="mr-3 mb-3" />
    </div>
  </div>
</template>
<script>
import Tag from "./Tag.vue";
export default {
  components: { Tag },
};
</script>