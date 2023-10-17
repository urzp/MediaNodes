<template>
    <component :is="tag?tag:'input'" ref="input" :type="type" class="input" 
    :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" 
    @focus="$emit('focus', handfocus($event.target.value))" @blur="('blur',handBlur($event.target.value))"/>
</template>

<script>
export default {
  name: 'UiInput',
  mounted(){
    this.beginValue = this.modelValue;
  },
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
  emits: ['update:modelValue', 'focus', 'blur'],
  methods:{
    handfocus(value){
      if(this.beginValue == value){
        this.type = this.modelTape;
        setTimeout(()=>{this.$refs.input.value = ''},100)
      }
    },
    handBlur(value){
      if(value == ''){ 
        this.type = 'text'
        setTimeout(()=>{this.$refs.input.value = this.beginValue},100)
      }
    }
  }
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
    }

</style>
