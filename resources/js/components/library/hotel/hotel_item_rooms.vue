<template>
    <tr>
            <td class="hotel-item-rooms-list_item__title" style="padding: 5px;">
                <h4>{{item.title}}</h4>
                <p>Основных мест: <b>{{item.osnPlace}}</b></p>
                <p>Дополнительных мест: <b>{{item.dopPlace}}</b></p>

            </td>
            <td>
                <label>Выберите количество номеров:</label>
                <p v-if="item.counts">
                <select v-model="selected" @change="onchangeCol">
                    <option value="0">0</option>
                <option v-for="n in item.counts" :value="n">{{n}}</option>
                </select><br>
                </p>
                <p v-else>0</p>

            </td>
            <td>
                <p v-if="item.counts">{{ item.sumprise }}р. </p>

            </td>
        <td><span v-if="selected>0"> x {{selected}}</span></td>
<td>
    <p><b>Количество комнат:</b> {{item.numroom}}</p>
    <p><b>Размер номера:</b> {{item.numroom}} кв.м.</p>
    <p><b>Услуги:</b>
        <servises :sevise_list="item.services" :groupservise="GroupServices"></servises>
       </p>

    <p><b>Описание номера:</b> {{item.about}}</p>
    <a><b>Подробней</b></a>
</td>

    </tr>
</template>

<script>
import servises from "./servises.vue";

export default {
    name: "hotel_item_rooms",
    components: {servises},
    props:["item", "GroupServices"],

    data(){
        return {
            selected: 0,
            servise: {},
        }
    },

    methods:
        {
            onchangeCol()
            {

                this.item.selcol = this.selected;



                if(this.selected==0)
                {
                    this.$emit('delItemRoom', this.item);
                }
                else {
                    this.$emit('saveItemRoom', this.item);
                }

            }


        },


    computed: {
            prise() {
                if(this.item.sumpris)  this.itemprise = this.item.sumprise;
                return this.itemprise;
            },


        }



}
</script>

<style scoped>
.hotel-item-rooms-list_ittem {
    border: 1px solid #000;
    padding: 10px;
}
.hotel-item-rooms-list_ittem td {padding: 10px; border: 1px solid #000;}
.hotel-item-rooms-list_ittem .ps {font-size: 11px;}
</style>
