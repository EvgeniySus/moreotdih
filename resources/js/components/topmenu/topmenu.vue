<template>
<nav class="block-menu">
    <ul class="block-menu__topmenu">
        <li class="block-menu__topmenu__item">О нас</li>
        <li class="block-menu__topmenu__item">Добавить отель</li>
        <li class="block-menu__topmenu__item">Как забронировать</li>
        <li class="block-menu__topmenu__item">Информация</li>
    </ul>
</nav>
</template>

<script>
export default {
name: "topmenu"
}
</script>

<style lang="scss" scoped>
.block-menu {

    &__topmenu {
        display: flex;
        justify-content: space-between;
        margin: 0;

        &__item {
            list-style: none;
            margin: 0 10px 0 10px;

        }

    }

}


</style>
