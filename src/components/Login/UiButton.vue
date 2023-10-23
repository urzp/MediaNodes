<template>
    <div class="button">
        <div class="text">{{ text }}</div>
    </div>
</template>

<script>
export default {
  name: 'UiButton',
  props:{
    text:String,
    bg_color: String,
    text_color: String,
  }
}
</script>

<style scoped>
    .button{
        border: 1px solid #fff;
        border-radius: 25px;
        color: #fff;
        height: 45px;
        padding: 0 30px 0 30px;
        display: flex;
        align-items: center;
        cursor: pointer;
        background-color: v-bind(bg_color);
        justify-content: center;
    }
    .text{
        color: v-bind(text_color);
        font-family: 'Intro-Bold-Alt';
        font-size: 15px;
    }
</style>
