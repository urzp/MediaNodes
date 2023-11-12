<template>
    <div class="title">Загрузка...</div>
    <div class="img"><img src="@/assets/icons/Frame-1274.gif" alt=""></div>
</template>

<script>
export default {
    name: 'UiLoader',

}
</script>


<style scoped>
    .title{
        margin-top: 30px;
        font-family: 'Intro-Bold-Alt';
        font-size: 20px;
        color: #fff;
    }
    .img{
        display: flex;
        width: 100%;
        height: 80vh;
        justify-content: center;
        align-items: center;   
    }
    .img img{
        height: 232px;
    }
</style>