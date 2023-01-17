<template>
<div>
   <hr>
    <div class="prise-list" v-if="list.differenceday.num">
<div class="hotelprise--infoblock">
    Наличие мест с {{list.datastart}} по {{list.dataend}}  ({{ list.differenceday.num }} {{ list.differenceday.text }}) для {{ list.numguest.num }} {{ list.numguest.text }}
</div>


        <hotel_item_rooms
            v-if="list.rooms_prise.length"
            v-for="item in list.rooms_prise"
            :key="item.id"
            :item="item"
            :GroupServices="list.groupservices"
            @saveItemRoom="save_room"
            @delItemRoom="delItemRoom"
            class="hotel-item-rooms-list_ittem">
        </hotel_item_rooms>

    </div>



    <error_alert v-if="errors">{{errors_msg}}</error_alert>
</div>
</template>
<script>
import error_alert from "../../error_alert";

export default {
    name: "hotelprice",

    props: {
        hotelid: 0,

    },

    component: {
        error_alert
    },

    data() {
        return {
            list: {},
            servdata: "",
            datastart: "",
            dataend: "",
            numguest: "",
            numday: "",

            flagprice: false, // ПОказывать прайс или нет
            loading: false, // Предзагрузчик

            select_room:{
                hotel:{
                    id: this.hotelid,
                    title: "",
                    adres: "",
                    datastart: this.datastart,
                    dataend: this.dataend,
                    countday: this.numday,
                    countpeple: this.numguest
                },
                room: [],
                itogo: 0,
                guest: {
                    email: "",
                    lastname: "",
                    firstname: "",
                    tel: "",
                    guest_id: false,
                    nosendemail: false
                }
            },

            errors: false, // Блок ошибки
            errors_msg: "",

        }
    },

    methods: {

        serchprise(url){
            this.data= {};
            this.flagprice = false;
            this.errors=false;
            this.errors_msg ="";



            if(this.hotelid != 0 )
            {
                this.loading=true;
                let d_start = (this.datastart == "") ? "" : `/${this.datastart}`;
                let d_end = (this.dataend == "") ? "" : `/${this.dataend}`;
                let nghost = (this.numguest == "") ? "" : `/${this.numguest}`;
                let url = `https://moreotdih-ru/api/site/holel/prise/${this.hotelid}${nghost}${d_start}${d_end}`;
                axios.get(url)
                    .then(res => {
                        console.log(res.data); // Результат ответа от сервера
                        console.log('OK!!!');
                        this.servdata = res.data.servdata;
                        this.list = res.data;
                        this.flagprice = true;
                        this.loading=false;
                        this.datastart = res.data.datastart;
                        this.numday = res.data.differenceday.num;
                    })
                    .catch(error =>{
                        console.log(error);
                        this.errors = true;
                        this.errors_msg = "Ошибка сервера, не удалось получить доступные номера, попробуйте позже.";
                        console.log('ERROR Запрос прайса!!!');
                    });

                 this.flagprice = true;

            }
            else {
                this.errors = true;
                this.errors_msg = "Что то пошло не так, вы не заполнили один из необходимых параметров.";
            }
        },


        //Запись выбранного номера в корзину или изменение числа номеров в корзине если они там есть.
        save_room(data)
        {
            if(this.select_room.room.length)
            {
                let issetroom = true;
                this.select_room.room.map(function (item) {

                    if (item.id == data.id)
                    {
                        item.selcol = data.selcol;
                        issetroom = false;
                    }

                });

                if(issetroom == true)
                {
                    this.select_room.room.push(data);
                }

            }
            else {
                this.select_room.room.push(data);
            }

            this.itogo();

        },

        // Удаление из корзины номера (когда выбрали 0 номеров)
        delItemRoom(data){
            let delindez="del"
            this.select_room.room.map(function (item, index) {
                if(item.id == data.id)
                {
                    delindez = index;
                }

            });
            if(delindez!="del")
            {
                this.select_room.room.splice(delindez, 1);
            }
            this.itogo();
        },

        // Подсчет общей суммы заказа и вывод
        itogo()
        {
            let sum = 0;
            this.select_room.room.map(function(item){
                sum = sum + item.sumprise * item.selcol;
                console.log(sum);
            });

            this.select_room.itogo = sum;

        },



    },

    mounted() {

        if(this.hotelid != 0)  this.serchprise();


    },

    created() {
        this.$root.$on('prisesearch', function (sercharr) {
            this.datastart = sercharr['datas'][0];
            this.dataend = sercharr['datas'][1];
            this.hotelid = sercharr['id'];
            this.numguest = sercharr['numguest'];
            this.serchprise();
        }.bind(this))




    },



}
</script>

<style scoped>

</style>
