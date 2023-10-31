<template>
    <UiButtonBack :to="`/players`" label="Назад к списку"/>
    <div class="title">Новый плеер</div>
    <form action="">
        <div class="title">Имя устройтсва</div>
        <InputMask class="input" name="" placeholder="P10000900" mask="P999999999" v-model="name"/>
        <div v-if="v$.name.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title">Город</div>
        <input name="" placeholder="Москва" v-model="city"/>
        <div v-if="v$.city.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title">Адрес</div>
        <input name="" placeholder="ул. Ленина д.2" v-model="address"/>
        <div v-if="v$.address.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title" >IP</div>
        <InputMask class="input" name="" placeholder="178 . 178 . 035 . 035" mask="999 . 999 . 999 . 999" v-model="ip"/>
        <div v-if="v$.ip.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="buttons">
            <div class="submitButton" @click="submit()">Отправить</div>
            <input type="submit"  value="" style="display: none;" />
        </div>
    </form>
</template>

<script>
import { sendForm } from '@/servis/sentForm'
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue'
import InputMask from 'primevue/inputmask';
import useVuelidate from '@vuelidate/core'
import { required} from '@vuelidate/validators'
const php_script = "newPlayer.php"
export default{
    name: 'UiPlayerNew',
    setup () {
        return { v$: useVuelidate() }
    },
    data(){
        return{
            name: '',
            city:'',
            address:'',
            ip:'' 
        }
    },
    validations(){
        return{
            name: { required },
            city: { required },
            address: { required },
            ip: { required }, 
        }
        
    },
    methods:{
        async submit(){
            this.v$.$validate()
            let nameCheck =!this.v$.name.$error
            let cityCheck =!this.v$.city.$error
            let addressCheck =!this.v$.address.$error
            let ipCheck =!this.v$.ip.$error
            let allCheck = nameCheck&&cityCheck&&addressCheck&&ipCheck
            if(allCheck) { await sendForm(php_script, this.$refs.submit) } else return false
            EventBus.emit('toaster',{status:'success', message:'Данные обновлены'});
        }
    },
    components:{
        UiButtonBack,
        InputMask
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
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    
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

.input{
    box-sizing: content-box!important;
}
.error-message {
    margin-top: 5px;
    color: #e7e7e7;
}

</style>