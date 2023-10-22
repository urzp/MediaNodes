<template>
    <component :is="tag?tag:'input'" ref="input" :type="modelTape" class="input" v-bind="$attrs"
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
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
        border: 1px solid #C5C5C5;
        border-radius: 25px;
        padding-left: 20px;
        font-family: 'Intro-Book';
        font-size: 16px;
        color: #858585;
        background-color: transparent;
    }

    .error{
      background-color:#f934922b;
      border-color: #f93493
    };
    

</style>
