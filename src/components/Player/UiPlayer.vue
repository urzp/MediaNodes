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

export default {
    name: 'UiPlayer',
    async created(){
        let result = await getData('readPlayer.php',{'player_id':this.playerId})
        let player = await result.player     
        player.online = !!Number(this.player.online)
        player.play_stop = !!Number(this.player.play_stop)
        player.dislike = !!Number(this.player.dislike)
        player.last_online = !!this.player.last_online?this.player.last_online.toLocaleString():'-'
        this.player = player
        this.playerList = await result.playList
    },
    props: {
        playerId: String,
    },
    data(){
        return{
            player:'',
            playerList:'',
        }
    },
    components: { 
        UiPlayerInf,
        UiPlayList,
        UiButtonBack,
    }
}
</script>
