<template>
    <div class="title">Плейлист</div>
    <div class="header">
        <div class="number" :style="{width:this.widths.number}">Номер трека</div>
        <div class="name" :style="{width:this.widths.name}">Название трека</div>
        <div class="length" :style="{width:this.widths.length}" >Длина трека</div>
        <div class="dislike" :style="{width:this.widths.dislike}" >Дизлайк</div>
    </div>
    <div class="row" v-for="(item, i) in playerList" :key="item.id" :class="{'active':item.active}">
       <div class="number" :style="{width:this.widths.number}">{{ i + 1 }}</div>
       <div class="name" :style="{width:this.widths.name}">{{ item.title }} 
            <img v-if="item.active&&play_stop" class="plaing" src="@/assets/icons/play.gif" alt="">
        </div>
       <div class="length" :style="{width:this.widths.length}" >{{ item.time }}</div>
       <div class="dislike" :style="{width:this.widths.dislike}" @click="editDislike(item.id_players_lists, item.disLike)"><img v-if="Number(item.disLike)" src="@/assets/icons/disLike.svg" alt=""></div>
    </div>
</template>

<script>
import { sendCommand } from '@/servis/sendCommand.js'
import { EventBus } from '@/servis/EventBus'
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
        playerList: [Array,String],
        play_stop: Boolean,
    },
    methods:{
        async editDislike(id, val){
            await sendCommand('editDislike.php',{id_list: id, dislike:!Number(val)})
            EventBus.emit('player:update');
        }
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
        text-align: left;
        padding-left: 20px;
        padding-right: 20px;
    }

    .header .name{
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

    .dislike{
        cursor: pointer;
    }

@media(max-width:600px){
        .header{
            display: none;
        }
        .row > div{
            font-size: 12px;
        }
        .number{
            width: 10%!important;
        }
        .name{
            width: 70%!important;
        }
        .length{
            width: 10%!important;
            min-width: 40px;
        }
        .dislike{
            width: 10%!important;
        }
    }

    @media(max-width:400px){
        .number{
            display: none!important;
        }
        .length{
            display: none!important;
        }
        .dislike{
            width: 20%!important;
        }
    }
</style>