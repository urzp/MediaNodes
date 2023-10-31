<template>
    <component :is="tag?tag:'input'" ref="input" :type="modelTape" class="input" v-bind="$attrs"
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
    <div class="error-message"><slot /></div>
</template>

<script>
export default {
  name: 'UiInput',
  data(){
    return{
      beginValue: '',
      type: 'text',
    }
  },
  props:{
    modelValue:String,
    modelTape:String,
    tag: String,
  },
  emits: ['update:modelValue'],
}
</script>

<style scoped>
    .input{
        height: 45px;
        width: 440px;
        margin-top: 20px;
        border: 1px solid #C5C5C5;
        border-radius: 25px;
        padding-left: 20px;
        font-family: 'Intro-Book';
        font-size: 16px;
        color: #858585;
        background-color: transparent;
    }
    .textarea{
        margin-top: 20px;
        padding-top: 15px;
        height: 160px;
        resize: none;
    }

    .error{
      background-color:#f934922b;
      border-color: #f93493
    }

    .error-message :slotted(*){
        color: #F93492;
        margin-top: 20px;
        font-family: 'Intro-Bold-Alt';
        font-size: 16px;
    }
</style>
