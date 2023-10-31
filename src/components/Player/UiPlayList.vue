<template>
    <div class="title">Плейлист</div>
    <div class="header">
        <div class="number" :style="{width:this.widths.number}">Номер трека</div>
        <div class="name" :style="{width:this.widths.name}">Название трека</div>
        <div class="length" :style="{width:this.widths.length}" >Длина трека</div>
        <div class="dislike" :style="{width:this.widths.dislike}" >Дизлайк</div>
    </div>
    <div class="row" v-for="item in playerList" :key="item.id" :class="{'active':item.active}">
       <div class="number" :style="{width:this.widths.number}">{{ item.id }}</div>
       <div class="name" :style="{width:this.widths.name}">{{ item.name }} <img v-if="item.active" class="plaing" src="@/assets/icons/play.gif" alt=""></div>
       <div class="length" :style="{width:this.widths.length}" >{{ item.time }}</div>
       <div class="dislike" :style="{width:this.widths.dislike}" ><img v-if="item.dislike" src="@/assets/icons/disLike.svg" alt=""></div>
    </div>
</template>

<script>
export default{
    name: 'UiPlayList',
    data(){
        return{
            widths:{
                number:'175px',
                name: '100%',
                length: '200px',
                dislike: '200px',
            }
        }
    },
    props:{
        playerList: Array,
    }
}
</script>

<style scoped>
    .title{
        margin-top: 40px;
        font-family: 'Intro-Bold-Alt';
        font-size: 20px;
        color: #fff;
    }
    .header{
        text-transform: uppercase;
    }
    .header, .row{
        margin-top: 20px;
        height: 60px;
        width: 100%;
        display: flex;
        font-family: 'Intro-Bold-Alt';
        font-size: 10px;
        color: #ffffffaa;
    }
    .row{
        margin-top: 10px;
    }
    .header > div, .row > div{
        width: 100px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #191919;
        border-radius: 5px;
        margin-right: 3px;
    }

    .row > div{
        background-color: #2F2F2F;
        font-size: 15px;
    }

    .active > div{
        background-color: #F09EC8;
        color:#1F1F1F;
    }

    .row .name{
        justify-content: space-between;
        padding-left: 20px;
        padding-right: 20px;
    }

    .row:last-child{
        margin-bottom: 100px;
    }

    .plaing{
        height: 30px;
        width: 30px;
    }

</style>