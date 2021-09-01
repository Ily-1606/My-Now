<template>
    <div class="card">
        <img class="card-img-top" :src="image" :alt="text" style="max-height: 112px">
        <div class="card-body">
            <div class="h6 font-weight-bold text-overflow-ellipsis">{{text}}</div>
            <div class="text-info small text-overflow-ellipsis">{{location}}</div>
        </div>
    </div>
</template>
<script>
export default {
    setup() {
        
    },
    props: ["link", "image","text","location"]
}
</script>