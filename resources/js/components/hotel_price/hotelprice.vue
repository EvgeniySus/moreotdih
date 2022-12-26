<template>
<div>
    Прайс лист.<br>
 {{datastart}}

    <div class="prise-list" v-if="flagprice"></div>

    <error_alert v-if="error">{{error_msg}}</error_alert>
</div>
</template>
<script>
import error_alert from "../error_alert";

export default {
    name: "hotelprice",

    component: {
        error_alert
    },

    data() {
        return {
            pricelist: {},
            servdata: "",
            datastart: "",
            dataend: "",
            numguest: 0,
            hotelid: 0,

            flagprice: false,

            error: false,
            error_msg: "",
            loading: false,
        }
    },

    methods: {

        serchprise(){
            this.error=false;
            this.error_msg ="";
            if(this.hotelid != 0 && this.numguest>0)
            {
                this.loading=true;
                let url = `https://moreotdih-ru/api/prise/dstart/${this.datastart}/dend/${this.dataend}/numguest/${this.numguest}/hotelid/${this.hotelid}`;
                axios.get(url)
                    .then(res => {
                        console.log('OK!!!');
                        console.log(res.data); // Результат ответа от сервера
                        this.servdata = res.data.time;
                        this.loading=false
                    })
                    .catch(error =>{
                        this.error = true;
                        this.error_msg = "Ошибка сервера, не удалось получить доступные номера, попробуйте позже.";
                        console.log('ERROR Запрос прайса!!!');
                    });

                 this.flagprice = true;

            }
            else {
                this.error = true;
                this.error_msg = "Что то пошло не так, вы не заполнили один из необходимых параметров.";
            }
        }

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
