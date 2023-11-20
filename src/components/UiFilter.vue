<template>
    <div class="wrap">
        <div class="element player"></div>
        <div class="element user"></div>
        <div class="element place"></div>
        <div class="element online"></div>
        <div class="element updated"></div>
        <div class="element play"></div>
        <div class="element dislike"></div>
    </div>
</template>

<script>
export default {
    name: 'UiFilter',


}
</script>

<style scoped>
    .wrap{
        display: flex;
        flex-direction: row;
    }
    .element{
        width: 26px;
        height: 26px;
        margin-right: 15px;
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
        width: 16px;
        background-image: url('@/assets/icons/search/place.svg');
    }
    .place.active{
        width: 16px;
        background-image: url('@/assets/icons/search/activePlace.svg');
    }
    .online{
        background-image: url('@/assets/icons/search/online.svg');
    }
    .online.active{
        background-image: url('@/assets/icons/search/activeOnline.svg');
    }
    .updated{
        background-image: url('@/assets/icons/search/updated.svg');
    }
    .updated.active{
        background-image: url('@/assets/icons/search/activeUpdated.svg');
    }
    .play{
        background-image: url('@/assets/icons/search/play.svg');
    }
    .play.active{
        background-image: url('@/assets/icons/search/activePlay.svg');
    }
    .dislike{
        position: relative;
        top: 4px;
        background-image: url('@/assets/icons/search/dislike.svg');
    }
    .dislike.active{
        background-image: url('@/assets/icons/search/activeDislike.svg');
    }
</style>