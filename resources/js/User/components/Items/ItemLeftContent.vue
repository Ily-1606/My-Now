<template>
<router-link tag="a" :to="url">
    <div class="row">
        <div class="col-auto">
            <img :src="image" width="150px" height="90px" class="rounded">
        </div>
        <div class="col-auto">
            <div class="h5 font-weight-bold text-overflow-ellipsis">{{text}}</div>
            <div class="muted small text-overflow-ellipsis">{{location}}</div>
            <div>

                <span class="mr-2">Giảm: {{sale ? sale : 0}} VND</span>
                <span>Giá: {{price}} VND</span>
            </div>
        </div>
    </div>
</router-link>
</template>
<script>
export default {
    setup() {
        
    },
    props: ['image','text','location','sale','price',"url"]
}
</script>