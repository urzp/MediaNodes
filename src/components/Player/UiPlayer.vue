<template>
    <UiButtonBack :to="`/players`" label="Назад к списку плееров"/>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>
    <template v-if='!lading&&!notFound'>
        <UiPlayerInf :player="player"/>
        <UiPlayList :playerList="playerList" :play_stop="player.play_stop"/>
    </template>
</template>

<script>
import { getData } from '@/servis/getData.js'
import { EventBus } from '@/servis/EventBus'
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue';
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'
import UiPlayerInf from '@/components/Player/UiPlayerInformation.vue'
import UiPlayList from '@/components/Player/UiPlayList.vue'


export default {
    name: 'UiPlayer',
    async mounted(){
       this.loopUpdate = setInterval( this.udatePlayer, this.$settings.updateTime)
       EventBus.on('player:update', this.udatePlayer)
    },
    beforeUnmount(){
        clearInterval(this.loopUpdate)
    },
    props: {
        playerId: String,
    },
    data(){
        return{
            lading:true,
            notFound:false,
            player:{
                online:false,
                play_stop: false,
            },
            playerList:'',
            test:this.$settings.udateTime
        }
    },
    methods:{
        async udatePlayer(){
            let result = await getData('readPlayer.php',{'player_id':this.playerId})
            if(!this.checkResult(result)) return false
            let player = await result.player     
            player.online = !!Number(player.online)
            player.play_stop = !!Number(player.play_stop)
            player.dislike = !!Number(player.dislike)
            player.last_online = !!player.last_online?player.last_online.toLocaleString():'-'
            this.player = player
            this.playerList = await result.playList
        },
        checkResult(result){
            this.lading = false
            if (result.success) return true
            this.notFound = true
            return false
        }
    },
    components: { 
        UiLoader,
        UiNotFound,
        UiPlayerInf,
        UiPlayList,
        UiButtonBack,
    }
}
</script>

