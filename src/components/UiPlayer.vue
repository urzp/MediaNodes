<template>
    <div class="back">
        <RouterLink to="/players" class="backButton" ><img src="@/assets/icons/leftarrow.svg" alt="back"></RouterLink>
        <RouterLink to="/players" class="label">Назад к списку плееров</RouterLink>
    </div>
    <UiPlayerInf :player="player"/>
    <UiPlayList :playerList="playerList"/>
</template>

<script>
import { RouterLink } from 'vue-router';
import getPlayers from '@/servis/testPlayers.js'
import PlayerList from '@/servis/testPlayList'
import UiPlayerInf from '@/components/UiPlayerInformation.vue'
import UiPlayList from '@/components/UiPlayList.vue'

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
        RouterLink,
        UiPlayerInf,
        UiPlayList
    }
}
</script>

<style scoped>
    .back{
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .back .label{
        text-decoration: none;
        color: #ffffffc5;
        font-family: 'Intro-Book';
        font-size: 12px;
        margin-left: 10px;
        text-transform: uppercase ;
    }
    .backButton{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background-color: #2F2F2F;
        border-radius: 20px;
    }

</style>