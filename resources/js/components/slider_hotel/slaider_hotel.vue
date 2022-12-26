<template>
<div class="section-item-slider">
        <h2>{{title}}</h2>
    <div class="carusel" >
        <div class="carusel-list" id="carusellist">

            <item_slider_card @chengesize="objeckSize"  v-for="(item, key, index) in hotellist" :key="'list_hotel_'+item.id" :item="item" :imgurl="imgurl" :index="index">

            </item_slider_card>

        </div>
    </div>
    <div class="carusel-navigation" v-if="countlist<2">
        <button class="but carusel-but carusel-but-prev"> < </button>
        <button class="but carusel-but carusel-but-next"> > </button>
    </div>
</div>
</template>

<script>


import config from "../../../js/config";
import item_slider_card from "../library/hotel/item_slider_card";


const api_url=config.getServUrl();
const imgurl=config.getImgUrl();

export default {
    name: "slaider_hotel",
    props: {
        title: {
            type: String,
            default: ""
        }

    },

    component: {
        item_slider_card
    },

    data() {
        return {
            hotellist: "",
            time: "",
            countlist: 0,
            imgurl: "",
            flag_vizibl_block: false,
            sizeblock: 230,
            i: 0,
        }
    },

    methods: {

        loadhotelLimit() {
            let url = `${api_url}/holel/limit/7`;
            console.log(url);
            //  this.$emit('LoadingSpiner', true);
            axios.get(url)
                .then(res => {
                    console.log('OK выбор отелей!!!');
                    console.log(res.data); // Список заказов
                    this.hotellist = res.data.hotellist;
                    this.time = res.data.time;
                    this.countlist = res.data.hotelcount;
                    if (this.countlist > 0) {
                        this.flag_vizibl_block = true;

                    }

                    //this.$emit('LoadingSpiner', false);
                })
                .catch(error => {

                    console.log('ERROR выбор отелей!!!');

                });
        },

        objeckSize(e) {

            this.sizeblock = e;
           // alert(this.sizeblock);
            console.log(this.sizeblock);
        }




    },


    mounted()
    {

    this.loadhotelLimit();
    this.imgurl=imgurl;


    },





}
</script>

<style scoped>

</style>
