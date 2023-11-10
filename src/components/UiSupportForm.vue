<template>
    <div class="title">Техподдержка</div>
    <p>
        У Вас появились проблемы? Или есть вопросы по управлению устройствами? Пожалуйста, заполните форму, 
        и наш специалист свяжется с Вами в течение 24 часов.
    </p>
    <form method="post" ref="submit">

        <input name="id" type="hidden" :value="user.id">
        <input name="session" type="hidden" :value="session">

        <div class="title">Ваше сообщение</div>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Введите комментарий" v-model="message"></textarea>
        <div v-if="v$.message.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title">Изображение</div>
        <label for="files" class="btnGetFile" onclick="document.getElementById('getFile').click()">Загрузить изображение</label>
        <input type="file" id="getFile" style="display:none" name="img" accept="image/png, image/jpeg" />
        <input type="button" @click="submit()" class="submitButton" value="Отправить" />
    </form>
</template>

<script>
import { sendForm } from '@/servis/sendForm'
import useVuelidate from '@vuelidate/core'
import { required } from '@vuelidate/validators'
import { EventBus } from '@/servis/EventBus'
export default{
    name: 'UiSupportFormUser',
    setup () {
        return { v$: useVuelidate() }
    },
    data(){
        return{
            user:JSON.parse(sessionStorage.getItem('user')),
            session: sessionStorage.getItem('session'),
            message:''
        }
    },
    validations(){
        return{
            message: { required },
        }
    },
    methods:{
        async submit(){
            this.v$.$validate()
            if(!!this.v$.message.$error) return false
            await sendForm('sendMessageUser.php', this.$refs.submit)
            EventBus.emit('toaster',{status:'success', message:'Сообщение отправлено'});
            this.$refs.submit.reset()
        }
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

p{
    margin-top: 30px;
    width: 480px;
    text-align: left;
    color: #ffffffce;
    font-family: 'Intro-Book';
    font-size: 16px;
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

form textarea{
    margin-top: 10px;
    background-color: transparent ;
    width: 480px;
    border-radius: 5px;
    resize: none;
    color: #858585;
    font-family: 'Intro-Book';
    font-size: 16px;
    padding: 20px;
}

.btnGetFile{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    width: 220px;
    height: 45px;
    font-family: 'Intro-Book';
    font-size: 16px;
    color: #fff;
    background-color:#2F2F2F ;
    border-radius: 5px;
    cursor: pointer;

}

.submitButton{
    display: block;
    margin-top: 30px;
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

.error-message {
    margin-top: 5px;
    color: #e7e7e7;
}

</style>