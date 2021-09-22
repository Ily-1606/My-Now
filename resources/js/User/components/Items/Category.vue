<template>
    <div>
        <router-link tag="a" class="p-2 border rounded" :to="data.url">
            {{data.name}}
        </router-link>
    </div>
</template>
<script>
export default {
    props:["data"]
}
</script>