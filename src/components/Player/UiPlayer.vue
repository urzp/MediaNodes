<template>
    <UiButtonBack :to="`/players`" label="Назад к списку плееров"/>
    <UiPlayerInf :player="player"/>
    <UiPlayList :playerList="playerList" :play_stop="player.play_stop"/>
</template>

<script>
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue';
import { getData } from '@/servis/getData.js'
import UiPlayerInf from '@/components/Player/UiPlayerInformation.vue'
import UiPlayList from '@/components/Player/UiPlayList.vue'
import { EventBus } from '@/servis/EventBus'

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
            let player = await result.player     
            player.online = !!Number(player.online)
            player.play_stop = !!Number(player.play_stop)
            player.dislike = !!Number(player.dislike)
            player.last_online = !!player.last_online?player.last_online.toLocaleString():'-'
            this.player = player
            this.playerList = await result.playList
        },
    },
    components: { 
        UiPlayerInf,
        UiPlayList,
        UiButtonBack,
    }
}
</script>
