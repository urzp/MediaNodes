<template>
    <div class="login-form">
        <div class="title">Техподдержка</div>
        <p>У Вас появились проблемы? Или есть вопросы по управлению устройствами? Пожалуйста, заполните форму, и наш специалист свяжется с Вами в течение 24 часов.</p>
        <form>
            <UiInput modelTape='text' v-model="email" placeholder="Введите ваш email" :class="{'error':v$.email.$error}"/>
            <div v-if="v$.email.$error">Введите корректный email</div>
            <UiInput tag="textarea" class="textarea" modelTape='text' v-model="message"  placeholder="Введите ваше сообщение"  :class="{'error':v$.message.$error}"/>
            <div v-if="v$.message.$error">Введите сообщение</div>
            <UiButton class="submit-button" text="Отправить" bg_color="#F93492" text_color="#fff" @click="submit"/>
        </form>
    </div>
    <div class="registration">
        <RouterLink to="/register" class="link-wight">Регистрация</RouterLink>
        <RouterLink to="/login">Войти</RouterLink>
    </div>
</template>

<script>
import sendData from '@/servis/sendData.js'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiComponents/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
import { EventBus } from '@/servis/EventBus'
export default {
  name: 'UiSupportForm',
  setup () {
    return { v$: useVuelidate() }
  },
  components:{
    UiInput,
    UiButton,
  },
  data(){
    return{
        email: '',
        message: '',
    }
  },
  validations(){
    return{
        email:{ required, email },
        message: { required },
    }
  },
  methods:{
    submit(){
        this.v$.$validate()
        if(!this.v$.$error){ 
            this.sendMessage({
                message: this.message,
                email: this.email,
            })
        }
    },
    async sendMessage(data){
        let result = await sendData('supportMessage.php', data)
        if(result.success){
            EventBus.emit('toaster',{status:'success', message:'Ваше сообщение принято'});
        }
    }
  }
}
</script>

<style scoped>
    .login-form{
        min-height: 580px;
        width: 560px;
        position: relative;
        top: -20px;
        background-color: #fff;
        border-radius: 5px ;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
    }

    .title{
        font-family: 'Intro-Bold-Alt';
        font-size: 28px;
        color: #1F1F1F;
        margin-top: 60px;
    }

    p{
        font-family: 'Intro-Book';
        font-size: 16px;
        margin-top: 20px;
        width: 420px;
    }

    p span{
        font-family: 'Intro-Bold-Alt';
    }

    form{
        margin-top:  40px;
    }

    form input{
        margin-top: 20px;
    }
    
    form :first-child{
        margin-top: 0px;
    }

    .submit-button{
        width: 400px;
        margin: 15px auto;
    }

    .registration{
        color:#FFF;
        font-family: 'Intro-Book';
        font-size: 15px;
        display: flex;
        flex-direction: row;
        margin-top: 10px;
    }

    a{
        color: #F93492;
        margin-left: 10px;   
    }

    .link-wight{
        color: #FFF;
    }

    @media(max-width:650px){
        .login-form{
            width: 90%;
        }

        .title, p{
            width: 80%;
        }

        form{
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;  
        }

        .button{
            width: 100%;
            padding: 0;
        }

        .terms-of-use{
            width: 80%;
        }
        
    }

    @media(max-width:530px){
        .title{
            font-size: 20px;
        }

        p{
            font-size: 14px; 
        }

        .registration{
            margin-top: 0px;
            margin-bottom: 40px;
        }
    }
</style>