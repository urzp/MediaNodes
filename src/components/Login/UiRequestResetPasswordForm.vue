<template>
    <div class="login-form">
        <div class="title">Сброс пароля</div>
        <p>Введите адрес <span>электронной почты</span>,  который вы указали при регистрации. Мы отправим вам письмо с ссылкой для сброса пароля.</p>
        <form>
            <UiInput modelTape='text' placeholder="Введите ваш email" v-model="email">
                <div v-if="v$.email.$error">Введите корректный email</div>
            </UiInput>
            <UiButton class="submit-button" text="Отправить"  @click="submit()" bg_color="#F93492" text_color="#fff"/>
        </form>
    </div>
    <div class="registration">
        Если вам нужна помощь, обратитесь в
        <RouterLink to="/support">службу поддержки LS Media</RouterLink>
    </div>
</template>

<script>
import  sendResetPassword  from '@/servis/sendRequrstResetPassword.js'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import UiInput from '@/components/UiComponents/UiInput.vue'
import UiButton from '@/components/Login/UiButton.vue'
export default {
  name: 'UiRequestResetPasswordForm',
  components:{
    UiInput,
    UiButton
  },
  setup () {
    return { v$: useVuelidate() }
  },
  validations(){
    return{
        email:{ required, email },
    }
  },
  data(){
    return{
        email: '',
    }
  },
  emits: ['ready'],
  methods:{
    async submit(){
        this.v$.$validate()
        if(!this.v$.$error){
            this.v$.$touch()
            let result = await sendResetPassword({email: this.email})
            if(result.success){
                sessionStorage.setItem('email_reset', this.email);
                this.$emit('ready', true)
            }
        }else{
            
        }
    }
  }
}
</script>

<style scoped>
    .login-form{
        height: 365px;
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

        margin: 15px auto;
    }

    .registration{
        color:#FFF;
        font-family: 'Intro-Book';
        font-size: 15px;
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    a{
        color: #F93492;
        margin-left: 10px;   
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