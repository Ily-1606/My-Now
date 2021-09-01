<template>
    <div class="card">
        <div class="card-body">
            <div class="card-title h5 font-weight-bold">{{title}}</div>
            <div class="card-text">{{des}}</div>
        </div>
            <div class="card-img-bottom"></div>
    </div>
</template>
<script>
export default {
    props: ["title","des"]
}
</script>