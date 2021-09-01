<template>
    <div>
        <div class="card rounded">
            <div class="card-body">
                <h5 class="card-title">Thông tin sản phẩm</h5>
                <div class="card-text">
                    <span style="white-space: pre-line">
                        {{dataProduct.body}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    setup() {
        
    },
    props: ["dataProduct"]
}
</script>