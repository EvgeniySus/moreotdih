<template>
    <div>
        <ul v-for="servis, index in sevise_list">
            <li style="list-style-type: none;" v-if="groupservise[index]"><b>{{groupservise[index]}}</b></li>
            <li v-for="item_servis in servis ">
                {{item_servis[0]}}
            </li>

        </ul>
    </div>
</template>


<script>
export default {
    name: "servises",
    props:["sevise_list", "groupservise"],

    computed: {


    }



}
</script>

<style scoped>

</style>
