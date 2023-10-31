<template>
    <div class="icon"><img src="@/assets/icons/sound.svg" alt=""></div>
    <div class="bar">
        <div class="background"></div>
        <div class="active"></div>
        <div class="tuning"></div>
    </div>
</template>


<script>
export default {
    name: 'UiVolume',
    props:{
        value:String,
    }
}
</script>

<style scoped>
    .icon{
        display: flex;
        align-items: center;
    }

    .bar {
        width: 50%;
        position: relative;
    }

    .background{
        width: 100%;
        height: 3px;
        background-color: #464646;
        border-radius: 2px;
    }

    .active{
        position: absolute;
        top: 0px;
        height: 3px;
        width: v-bind(value);
        background-color: #F93492;
        border-radius: 2px;       
    }

    .tuning{
        position: absolute;
        top: -1px;    
        left: calc(v-bind(value) - 3px);   
        height: 5px;
        width: 5px;
        background-color: #F93492;
        border-radius: 3px;       
    }
</style>