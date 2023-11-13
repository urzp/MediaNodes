<template>
    <div  class="base" :class="{'show':show}">
        <div class="top-marker">
        </div>
        <div class="title">
                <div>{{ message }}</div>
        </div>
    </div>
</template>

<script>
import { EventBus } from '@/servis/EventBus'
const colors ={
    error: '#D20000',
    success: '#449C4A',
}

export default {
    mounted(){
        this.showToster('success','Данные обновлены')
    },
    name: 'UiToaster',
    mounted(){
        EventBus.on('toaster', data=>this.showToster(data))
    },
    data(){
        return{
            color_marker: '',
            message:'',
            show: false
        }
    },
    methods:{
        showToster(data){
            this.show = true
            let time = data.time?data.time:3000
            this.color_marker = colors[data.status]
            this.message = data.message
            setTimeout( () =>{
                this.show = false;

            }, time )
        }
    },
}

</script>


<style scoped>
    .base{
        position: fixed;
        bottom: -100px;
        right: 10px;
        width: 360px;
        background-color: #363636;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        opacity: 0;
        transition: 1s;
        z-index: 999;

    }

    .top-marker{
        width: 100%;
        height: 15px;
        background-color: v-bind(color_marker);
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .title{
        margin-top: 30px;
        margin-bottom: 50px;
        font-family: 'Intro-Book';
        font-size: 18px;
        color: #fff;

    }

    .show{
        bottom: 0px;
        opacity: 1.0;
        transition: 1s;
    }
</style>