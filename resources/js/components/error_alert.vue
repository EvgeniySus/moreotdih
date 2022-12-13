<template>
<div class="error_msg"> <slot></slot></div>
</template>

<script>
export default {
name: "error_alert"

}
</script>

<style type="scss" scoped>

.error_msg {
    min-width: 200px;
    max-width: 400px;
    padding: 5px;
    color: #fb0505;
    border: 1px solid #8d0000;
    font-size: 80%;
    border-radius: 5px;
    margin: 10px auto;
    background-color: #F2F2F2;

}

</style>
