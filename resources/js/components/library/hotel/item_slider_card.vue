<template>
    <div class="carusel-list__item" :ref="'item'+index">

        <a :href="'/hotel/'+item.slug" target="_blank"  class="carusel-list__item__img"
             :style="{ backgroundImage: 'url('+imgurl+item.id+'/'+item.image+')'}">
<div class="carusel-list__item__type">{{item.type}} </div>
            <div class="carusel-list__item__prise">от 3200 сутки</div>
        </a>
        <div class="carusel-list__item__text">
            <a :href="'/hotel/'+item.slug" target="_blank">
            <h3>{{item.title}}</h3>
            <address>{{item.adres}}</address>
            <p>{{item.anons}}</p>
            </a>
        </div>
    </div>

</template>

<script>
export default {
    name: "item_slider_card",
    props: {
        item: {
            type: Object,
            default: {}
        },
        imgurl: {
            type: String,
            default: "https://cp.moreotdih-ru/storage/hotel/hotel_"
        },
        index: {

        }
    },

    methods: {

        test()
        {
            if(this.index==0)
            {
                this.$emit("chengesize",this.$refs.item0.clientWidth);


            }
        }
    },

    mounted() {
        this.test();
    },

    created() {
        if(this.index==0)
        {
        window.addEventListener('resize', this.test);
        }
    },


}
</script>

<style scoped>

</style>
