<template>
    <UiButtonBack :to="`/players`" label="Назад к списку плееров"/>
    <UiPlayerInf :player="player"/>
    <UiPlayList :playerList="playerList"/>
</template>

<script>
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue';
import getPlayers from '@/servis/testPlayers.js'
import PlayerList from '@/servis/testPlayList'
import UiPlayerInf from '@/components/Player/UiPlayerInformation.vue'
import UiPlayList from '@/components/Player/UiPlayList.vue'

export default {
    name: 'UiPlayer',
    props: {
        playerId: String,
    },
    computed: {
        player() {
            return getPlayers.find(item => item.id == this.playerId);
        },
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
