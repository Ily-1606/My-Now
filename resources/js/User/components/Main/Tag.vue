<template>
    <div class="px-3 py-2 rounded font-weight-bold border-white text-white d-inline-block border">
        {{text}}
    </div>
</template>
<script>
export default {
    setup() {
        
    },
    props: ['tag','text']
}
</script>