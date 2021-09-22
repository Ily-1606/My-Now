<template>
    <router-link class="px-3 py-2 rounded font-weight-bold border-white text-white d-inline-block border" tag="a" :to="url">
        {{text}}
    </router-link>
</template>
<script>
export default {
    data(){
        return{
            url: `/category/${this.id}`
        }
    },
    props: ['tag','text',"id"]
}
</script>