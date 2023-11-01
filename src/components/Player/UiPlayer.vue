<template>
    <UiButtonBack :to="`/players`" label="Назад к списку плееров"/>
    <UiPlayerInf :player="player"/>
    <UiPlayList :playerList="playerList"/>
</template>

<script>
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue';
import { getData } from '@/servis/getData.js'
import PlayerList from '@/servis/testPlayList'
import UiPlayerInf from '@/components/Player/UiPlayerInformation.vue'
import UiPlayList from '@/components/Player/UiPlayList.vue'

export default {
    name: 'UiPlayer',
    async created(){
        let result = await getData('readPlayer.php',{'player_id':this.playerId})
        this.player = await result.player
        this.player.online = !!Number(this.player.online)
        this.player.play_stop = !!Number(this.player.play_stop)
        this.player.dislike = !!Number(this.player.dislike)
        this.player.last_online = !!this.player.last_online?this.player.last_online.toLocaleString():'-'
    },
    props: {
        playerId: String,
    },
    data(){
        return{
            player:''
        }
    },
    computed: {
        playerList(){
            return PlayerList
        }
    },
    components: { 
        UiPlayerInf,
        UiPlayList,
        UiButtonBack,
    }
}
</script>
