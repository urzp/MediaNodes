<template>
    <div class="title">Профиль</div>
    <form  method="post" ref="submit">
        <div class="title">Название компании</div>

        <input name="id" type="hidden" :value="id">
        <input name="session" type="hidden" :value="session">

        <input name="name" placeholder="Альфа банк" v-model="name"/>
        <div v-if="v$.name.$error" class="error-message" >поле недолжно быть пустым</div>
        
        <div class="title">Email</div>
        <input name="email" placeholder="info@alfabank.ru" v-model="email"/>
        <div v-if="v$.email.$error" class="error-message">Введите корректный email</div>

        <div class="title">Телефон</div>
        <input name="tel" placeholder="+7 (495) 999 99 99"  v-model ="tel_number" data-phone-pattern/>

        <div class="title">Изображение</div>
        <label for="files" class="btnGetFile" onclick="document.getElementById('getFile').click()">Загрузить изображение</label>
        <input type="file" id="getFile" style="display:none" name="img" accept="image/png, image/jpeg, image/svg+xml, image/webp" />

        <div class="link" @click="editPassword = !editPassword">{{editPassword?'Не изменять пароль':'Изменить пароль'}}</div>
        <div v-if="editPassword" class="changePassword">
            <input name="editPassword" type="hidden" v-model="editPassword">

            <div class="title">Старый пароль</div>
            <input type="password" name="oldPassword" v-model="oldPassword"/>
            <div v-if="v$.oldPassword.$error" class="error-message" >поле недолжно быть пустым</div>

            <div class="title">Новый пароль</div>
            <input type="password" name="newPassword"  v-model="newPassword"/>
            <div v-if="v$.newPassword.$error" class="error-message" >поле недолжно быть пустым</div>

            <div class="title">Проверить новый пароль</div>
            <input type="password" name="confirmPassword"  v-model="confirmPassword"/>
            <div v-if="isErrMinLengt(v$.confirmPassword.$errors)" class="error-message" >пароль минимум 6 знаков</div>
            <div v-if="isErrSame(v$.confirmPassword.$errors)" class="error-message" >пароль несопадает</div>
        </div>

        <div class="buttons">
            <div class="cancelButton" @click="cancel()">Отмена</div>
            <div class="submitButton" @click="submit()">Отправить</div>
            <input type="button"  value="" style="display: none;" />
        </div>
    </form>
</template>

<script>
import { getData } from '@/servis/getData'
import { sendForm } from '@/servis/sendForm'
import useVuelidate from '@vuelidate/core'
import { required, email, minLength, sameAs } from '@vuelidate/validators'
import telMask from '@/scripts/tel_mask'
import { EventBus } from '@/servis/EventBus'
const php_script = "updateUser.php"
export default{
    name: 'UiUser',
    setup () {
        return { v$: useVuelidate() }
    },
    async created(){
        this.update()
    },
    mounted(){
        telMask()
    },
    data(){
        return{
            user:JSON.parse(sessionStorage.getItem('user')),
            id: '',
            session: sessionStorage.getItem('session'),
            name: '',
            email:'',
            tel_number:'',
            editPassword: false,
            oldPassword:'',
            newPassword:'',
            confirmPassword:'',
        }
    },
    validations(){
        return{
            name: { required },
            email:{ required, email },
            oldPassword: { required, minLength:minLength(6) },
            newPassword: { required, minLength:minLength(6) },
            confirmPassword: { required, minLength:minLength(6), sameAs: sameAs(this.newPassword) },
        }
    },
    methods:{
        async cancel(){
            this.update()
        },
        async submit(){
            this.v$.$validate()
            let nameCheck =!this.v$.name.$error
            let emailCheck =!this.v$.email.$error
            let usetInfCheck = nameCheck&&emailCheck

            let oldPasswordCheck =!this.v$.oldPassword.$error
            let newPasswordCheck =!this.v$.newPassword.$error
            let confirmPassword =!this.v$.confirmPassword.$error
            let passwordCheck = oldPasswordCheck&&newPasswordCheck&&confirmPassword

            if(!this.editPassword){
                
                if(usetInfCheck) { await sendForm(php_script, this.$refs.submit) } else return false
            }else{
                if(usetInfCheck&&passwordCheck) { await sendForm(php_script, this.$refs.submit) } else return false
            }
            let response = await getData('readUser.php')
            this.user = { ...await response.user }
            sessionStorage.setItem('user', JSON.stringify(this.user));
            EventBus.emit('user:update');
            EventBus.emit('toaster',{status:'success', message:'Данные обновлены'});
            
        },
        isErrMinLengt(errors){
            if(!errors) return false
            return !!errors.find(item => item.$validator == 'minLength')
        },
        isErrSame(errors){
            if(!errors) return false
            return !!errors.find(item => item.$validator == 'sameAs')
        },
        async update(){
            let response = await getData('readUser.php')
            let user = await response.user
            this.id = user.id
            this.name = user.name
            this.email = user.email
            this.tel_number = user.tel
        }
    },

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
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    flex-wrap: nowrap;
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

.link{
    display: block;
    margin-top: 30px;
    margin-bottom: 30px;
    text-align: left;
    font-family: 'Intro-Book';
    font-size: 16px;  
    color: #ffffffaf; 
    text-decoration: underline;
    cursor: pointer;
}

.buttons{
    display: flex;
    justify-content: flex-start;
}

.submitButton, .cancelButton{
    display: flex;
    align-items: center;
    justify-content: center;
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

.cancelButton{
    background-color: transparent;
    border: 1px solid #fff;
}


.error-message {
    margin-top: 5px;
    color: #e7e7e7;
}

@media (max-width: 550px) {
    form {
        width: calc(100% - 10px)!important;
    }

    input{
        width: calc(100% - 40px)!important;
    }
}
@media (max-width: 500px){
    .buttons{
        flex-direction: column!important;
    }

    .cancelButton, .submitButton {
        margin-top: 20px;
        height: 40px;   
    }

    .submitButton{
        margin-top: 20px;
        margin-bottom: 100px;
    }
}

</style>