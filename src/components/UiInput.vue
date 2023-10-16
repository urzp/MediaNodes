<template>
    <input>
</template>

<script>
export default {
  name: 'UiInput',
  props:{
    text:String
  }
}
</script>

<style scoped>
    input{
        height: 45px;
        width: 440px;
        border: 1px solid #C5C5C5;
        border-radius: 25px;
        padding-left: 20px;
        font-family: 'Intro-Book';
        font-size: 16px;
        color: #858585;
    }

</style>
