<template>
    <UiButtonBack :to="`/players/${player.id}`" label="Назад к плееру"/>
    <div class="title">Плеер: {{ player.name }}</div>
    <form action="">
        <div class="title">Название</div>
        <input name="" :value="player.name"/>
        <div class="title">Город</div>
        <input name="" :value="player.city"/>
        <div class="title">Адрес</div>
        <input name="" :value="player.address"/>
        <div class="title">IP</div>
        <input name="" :value="player.ip"/>
        <div class="buttons">
            <div class="canselButton">Отмена</div>
            <input type="submit" class="submitButton" value="Отправить" />
        </div>
    </form>
</template>

<script>
import UiButtonBack from '@/components/UiButtonBack.vue'
export default{
    name: 'UiPlayerEdit',
    props:{
        player: Object
    },
    components:{
        UiButtonBack
    }
}

</script>


<style scoped>

.title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
}

form {
    margin-top: 30px;
}

form .title{
    color: #ffffffb1;
    font-family: 'Intro-Book';
    font-size: 16px;
    text-align: left;
}

form input{
    margin-top: 10px;
    background-color: transparent ;
    width: 440px;
    border: 1px solid #858585;
    border-radius: 5px;
    color: #858585;
    font-family: 'Intro-Book';
    font-size: 16px;
    padding: 20px;
}

.buttons{
    display: flex;
    justify-content: flex-start;
}

.submitButton, .canselButton{
    display: block;
    margin-top: 40px;
    margin-right: 10px;
    height: 55px;
    width: 190px;
    font-family: 'Intro-Bold-Alt';
    font-size: 16px;
    color: #fff;
    background-color: #F93492;
    border-radius: 30px;
    border:none;
    cursor: pointer;
}

.canselButton{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    border: 1px solid #fff;
}



</style>