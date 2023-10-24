<template>
    <div class="title">Профиль</div>
    <form action="">
        <div class="title">Название компании</div>
        <input name="id" type="hidden" :value="user.id">
        <input name="session" type="hidden" :value="session">
        <input name="name" placeholder="Альфа банк" :value ="user.name"/>
        <div class="title">Email</div>
        <input name="email" placeholder="info@alfabank.ru" :value = "user.email"/>
        <div class="title">Телефон</div>
        <input name="tel" placeholder="+7 (495) 999 99 99"  :value ="user.telephon" data-phone-pattern/>
        <div class="title">Изображение</div>
        <label for="files" class="btnGetFile" onclick="document.getElementById('getFile').click()">Загрузить изображение</label>
        <input type="file" id="getFile" style="display:none" name="img" accept="image/png, image/jpeg" />
        <div class="link" @click="editPassword = !editPassword">{{editPassword?'Не изменять пароль':'Изменить пароль'}}</div>
        <div v-if="editPassword" class="changePassword">
            <input name="editPassword" type="hidden" :value="editPassword">
            <div class="title">Старый пароль</div>
            <input type="password" name="oldPassword" />
            <div class="title">Новый пароль</div>
            <input type="password" name="newPassword" />
            <div class="title">Проверить новый пароль</div>
            <input type="password" name="newPassword" />
        </div>
        <div class="buttons">
            <div class="canselButton">Отмена</div>
            <input type="submit" class="submitButton" value="Отправить" />
        </div>
    </form>
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, email, minLength } from '@vuelidate/validators'
import telMask from '@/scripts/tel_mask'
export default{
    name: 'UiUser',
    mounted(){
        telMask()
    },
    data(){
        return{
            editPassword: false,
            user:JSON.parse(sessionStorage.getItem('user')),
            session: sessionStorage.getItem('session')
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
    margin-bottom: 100px;
    display: flex;
    justify-content: flex-start;
}

.submitButton, .canselButton{
    display: block;
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



</style>