<template>
<div class="block-logo">
    <div class="block-logo__img">
    МореОтдых.
    </div>
</div>
</template>

<script>
export default {
    name: "logo"
}
</script>

<style lang="scss" scoped>
.block-logo{
    width: 150px;
    margin-left: 5px;
    &__img{
        display: inline-block;
        padding-right: 23px;
        background: url("/assets/image/logo-globe.png") no-repeat top right;
        background-size: contain;
        background-position-y: -2px;
    }
}

</style>
