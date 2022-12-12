<template>

    <form method="get" name="serch_form" action="/search">

<div class="search-form-top">

    <div class="search-form-top__item search-form-top--inpregion">
        <label>Регион</label><br>
        <el-autocomplete
            class="inline-input"
            v-model="region_name"
            :fetch-suggestions="querySearch"
            placeholder="Введите регион"
            @select="handleSelect"
        ></el-autocomplete><br>
        {{region_name}} - {{region_id}}
    </div>

<div class="search-form-top__item search-form-top--date-picker">
    <label>Даты заезда</label><br>
        <el-date-picker
            v-model="value1"
            type="daterange"
            popper-class="custom-date-picker"
            range-separator="-"
            start-placeholder="Начало"
            end-placeholder="Конец"
            format="dd/MM/yyyy"
            value-format="yyyy-MM-dd">
        </el-date-picker><br>
    {{value1}}
</div>
        <div class="search-form-top__item search-form-top--inpnumber">
        <label>Гостей</label><br>
        <el-input-number v-model="num" @change="handleChange" :min="1" :max="10"></el-input-number><br>
            {{num}}
        </div>

    <div class="search-form-top__item search-form-top--button">
        <label></label><br>
        <el-button type="primary" plain>Найти</el-button>
    </div>

</div>
    </form>

</template>

<script>
import axios from "axios";
export default {
    name: "search_form_top",

    data() {
        return {
            links: [],
            value1: "",
            num: 1,
            region_name: "",
            region_id: "",

        }
    },

    methods: {
        handleChange(value) {
           // this.region_id=value;
            console.log(value);
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
            console.log(item.link);
        }

    },


    mounted() {
        let url="http://moreotdih-ru/api/region/all";
        axios.get(url)
            .then(res => {
                console.log('OK!!!');
                console.log(res.data); // Результат ответа от сервера
                this.links=res.data.geo;
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



.search-form-top {
    display: flex;
    justify-content: center;


    &__item {
        margin-right: 10px;
    }
    &__item:last-child {
        margin-right: 0;
    }

}
</style>
