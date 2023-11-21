<template>
    <div class="wrap">
        <div class="element player" :class="{active:selected == 'player'}" @click="select('player')"></div>
        <div class="element user" :class="{active:selected == 'user'}" @click="select('user')"></div>
        <div class="element place" :class="{active:selected == 'place'}" @click="select('place')"></div>
        <div class="element online" :class="{active:selected == 'online', no: no_online}" @click="select('online')"></div>
        <!-- <div class="element updated" :class="{active:selected == 'updated'}" @click="select('updated')"></div> -->
        <div class="element play" :class="{active:selected == 'play', no: no_play}" @click="select('play')"></div>
        <div class="element dislike" :class="{active:selected == 'dislike', no: no_dislike}" @click="select('dislike')"></div>
    </div>
</template>

<script>
import { EventBus } from '@/servis/EventBus'
export default {
    name: 'UiFilter',
    data(){
        return{
            selected:'player',
            no_online: false,
            no_play:false,
            no_dislike:false,
            result: false,
            find_use: true,
            mem_find:{},
        }
    },
    props:{
        find_val: String,
    },
    emits: ['filter:selected'],
    methods:{
        select(val){
            this.find_use = true
            if(val==this.selected){
                if(this.selected == 'online') this.no_online = !this.no_online;
                if(this.selected == 'play') this.no_play = !this.no_play;
                if(this.selected == 'dislike') this.no_dislike = !this.no_dislike; 
            }
            if(val == 'online') this.result = !this.no_online;
            if(val == 'play') this.result = this.no_play;
            if(val == 'dislike') this.result = !this.no_dislike;

            if(val == 'online' || val == 'play' || val == 'dislike' ){
                this.find_use = false
            }
            this.selected = val
            this.$emit('filter:selected', this.mem_find[this.selected])
            EventBus.emit('find',{find:this.find_val, find_use: this.find_use, selected: this.selected, selected_val: this.result});
        }
        
    },
    watch:{
        find_val(){
            this.mem_find[this.selected] = this.find_val
            EventBus.emit('find',{find:this.find_val, find_use: this.find_use, selected: this.selected, selected_val: this.result});
        }
    },

}
</script>

<style scoped>
    .wrap{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .element{
        width: 19px;
        height: 19px;
        margin-right: 18px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        cursor: pointer;
    }
    .player{
        background-image: url('@/assets/icons/search/player.svg');
    }
    .player.active{
        background-image: url('@/assets/icons/search/activePlayer.svg');
    }
    .user{
        background-image: url('@/assets/icons/search/user.svg');
    }
    .user.active{
        background-image: url('@/assets/icons/search/activeUser.svg');
    }
    .place{
        background-image: url('@/assets/icons/search/place.svg');
    }
    .place.active{
        background-image: url('@/assets/icons/search/activePlace.svg');
    }
    .online{
        background-image: url('@/assets/icons/search/online.svg');
    }
    .online.active{
        background-image: url('@/assets/icons/search/activeOnline.svg');
    }
    .no.online.active{
        background-image: url('@/assets/icons/search/NoOnline.svg');
    }
    .updated{
        background-image: url('@/assets/icons/search/update.svg');
    }
    .updated.active{
        background-image: url('@/assets/icons/search/activeUpdate.svg');
    }
    .play{
        background-image: url('@/assets/icons/search/play.svg');
    }
    .play.active{
        background-image: url('@/assets/icons/search/activePlay.svg');
    }
    .no.play.active{
        background-image: url('@/assets/icons/search/noPlay.svg');
    }
    .dislike{
        position: relative;
        top: 2px;
        width: 25px;
        height: 25px;
        margin-left: -2px;
        background-image: url('@/assets/icons/search/dislike.svg');
    }
    .dislike.active{
        background-image: url('@/assets/icons/search/activeDislike.svg');
    }
    .no.dislike.active{
        background-image: url('@/assets/icons/search/NoDislike.svg');
    }

    @media (max-width:450px){
        .wrap{
            width: 230px;
            top: 56px;
            left: 0px;
            padding-left: 22px;
            height: 45px;
            border-radius: 25px;
            background-color: #2f2f2f;
        }
    }
</style>