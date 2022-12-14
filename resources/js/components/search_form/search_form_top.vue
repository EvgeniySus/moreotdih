<template>

<form method="get" name="serch_form" class="serch_form-form" @submit.prevent="someAction()">

<div class="search-form-top">

    <div class="search-form-top__item search-form-top--inpregion">
        <label>Регион</label><br>
        <el-autocomplete
            class="inline-input"
            v-model="region_name"
            :fetch-suggestions="querySearch"
            placeholder="Введите регион"
            disableMobile="true"
            @select="handleSelect"
            @change="handleChange"

        ></el-autocomplete>
    </div>

<div class="search-form-top__item search-form-top--date-picker">
    <label>Даты заезда</label><br>
        <el-date-picker
            v-model="range"
            type="daterange"
            popper-class="custom-date-picker"
            range-separator="-"
            start-placeholder="Начало"
            end-placeholder="Конец"
            clearable="true"
            format="dd/MM/yyyy"
            align="center"
            @change="ChangeRange"
            value-format="yyyy-MM-dd">
        </el-date-picker>
</div>
        <div class="search-form-top__item search-form-top--inpnumber">
        <label>Гостей</label><br>
        <el-input-number v-model="num"  :min="1" :max="10"></el-input-number>
        </div>

    <div class="search-form-top__item search-form-top--button">
        <label></label><br>
        <el-button type="primary" @click="SubmitForm()" plain>Найти Отель</el-button>
    </div>

</div>

    <error_alert v-if="error">{{error_msg}}</error_alert>
    <div class="search-form-top_loader" v-if="loading">
        <div class="el-loading-spinner"><i class="el-icon-loading"></i><p class="el-loading-text">Loading...</p></div>
    </div>

    </form>

</template>

}
<script>
import error_alert from "../error_alert";


import axios from "axios";
export default {
    name: "search_form_top",
    props:{
        hotel: [],
    },
    component: {
        error_alert

    },
    data() {
        return {
            links: [],
            range: "",
            num: 1,
            region_name: "",
            region_id: "",
            servdata: "", // Серверное время текущий день с 00:00:01
            error: false,
            error_msg: "",
            loading: true,
        }
    },

    methods: {

        disabledDate(value)
        {
            alert(value);
        },

        ChangeRange()
        {
            this.checkRangeData();

        },

        SubmitForm(){
            this.error=false;
            this.error_msg ="";

            this.checkRangeData();

            if(this.region_name == "" || !Array.isArray(this.region_id)) {
                this.error = true;
                this.error_msg = "Выберите регион";

            }

            if(!Array.isArray(this.range))
            {
                this.error = true;
                this.error_msg = "Выберите даты заезад";
            }
            else {
                let start_data=parseInt((new Date(this.range[0]).getTime() / 1000).toFixed(0))
                let sdata=(this.servdata <= start_data) ? true : false;
                console.log(sdata);
            }

            if(this.num<1)
            {
                this.error = true;
                this.error_msg = "Количество гостей не может быть меньше 1";
            }



            if(!this.error)
            {
                let url=`/search/rangestart/${this.range[0]}/rangeend/${this.range[1]}/guest/${this.num}/regionid/${this.region_id}/regionname/${this.region_name}`;
                 window.location = url;
            }

        },


        checkRangeData()
        {
            let start_data=parseInt((new Date(this.range[0]).getTime() / 1000).toFixed(0))
            let end_data=parseInt((new Date(this.range[1]).getTime() / 1000).toFixed(0))
            let serv_data=parseInt((new Date(this.servdata).getTime() / 1000).toFixed(0))

            let sdata=(serv_data <= start_data && start_data < end_data) ? true : false;

            if(!sdata)
            {
                this.error = true;
                this.error_msg = "Дата начала и оканчания заезда должна быть больше или равна текущей дате";

            }
            else {
                this.error=false;
                this.error_msg ="";
            }
        },

        // Автокомплит
        querySearch(queryString, cb) {
            var links = this.links;
            var results = queryString ? links.filter(this.createFilter(queryString)) : links;
            // call callback function to return suggestions
            cb(results);
        },
        createFilter(queryString) {

            return (link) => {
                return (link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
            };
        },

        handleSelect(item) {
            this.region_id=item.link;
            this.error=false;
            this.error_msg ="";
          //  console.log(item.link+'Select');
        },

        handleChange(queryString) {
            let obj = this.links .find(item=> item.value.toLowerCase() === queryString.toLowerCase());
           // console.log(obj.link+' '+obj.value+' Change');
            (obj) ? this.region_id=obj.link : this.region_id = "";
            this.error=false;
            this.error_msg ="";

        },

    },


    mounted() {
        let url="http://moreotdih-ru/api/region/all";
        axios.get(url)
            .then(res => {
                console.log('OK!!!');
                console.log(res.data); // Результат ответа от сервера
                this.links=res.data.geo;
                this.servdata = res.data.time;
                this.loading=false
            })
            .catch(error =>{
                this.links = [{ "value": "К сожалению выбор региона не работает", "link": [0,0,0] }];
                console.log('ERROR список Регионов!!!');
            });

    }

}
</script>

<style lang="scss">
.custom-date-picker .el-date-table td.in-range div, .custom-date-picker .el-date-table td.in-range div:hover
{
    background-color: #bdd6f8;

}


.serch_form-form {
    display: block;
    position: relative;
}


.search-form-top {
    min-width: 250px;
    display: flex;
    justify-content: center;
    padding: 10px;

    label {
        font-size: 100%;
        color: #409EFF;
        padding-bottom: 5px;
        font-weight: bold;
    }

    &__item {
        margin-right: 10px;
    }
    &__item:last-child {
        margin-right: 0;
    }

}

.search-form-top_loader {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(129, 126, 126, 0.7);
    top: 0;
    z-index: 1000;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #000;

    .el-loading-spinner i, .el-loading-text {
        color: #8d0000;
    }

}

.el-autocomplete {
    min-width: 250px;
}

@media (max-width: 900px) {
    .search-form-top {
        flex-wrap: wrap;
        justify-content: start;

        &__item {
            margin-top: 10px;
        }
    }


    @media (max-width: 550px) {

        .search-form-top {

            &__item {
                margin-top: 10px;
                width: 100%;
            }
        }

        .el-autocomplete, .el-input-number, .el-button {
            width: 100%;
        }

        .custom-date-picker {
            width: 90%!important;
        }
        .el-picker-panel {
            left: 0 !important;
            width: 90%;
            top: 10px!important;
        }
        .el-date-range-picker__content {
            width: 100%;
        }
        .el-date-range-picker .el-picker-panel__body {
            min-width: 90%;
            margin: 0 auto;
        }

        .el-date-editor--daterange.el-input__inner {
         width: 100%;
        }

    }
}





</style>
