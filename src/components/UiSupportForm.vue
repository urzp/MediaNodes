<template>
    <div class="title">Техподдержка</div>
    <p>
        У Вас появились проблемы? Или есть вопросы по управлению устройствами? Пожалуйста, заполните форму, 
        и наш специалист свяжется с Вами в течение 24 часов.
    </p>
    <form action="">
        <div class="title">Ваше сообщение</div>
        <textarea name="" id="" cols="30" rows="10" placeholder="Введите комментарий"></textarea>
        <div class="title">Изображение</div>
        <label for="files" class="btnGetFile" onclick="document.getElementById('getFile').click()">Загрузить изображение</label>
        <input type="file" id="getFile" style="display:none" name="img" accept="image/png, image/jpeg" />
        <input type="submit" class="submitButton" value="Отправить" />
    </form>
</template>

<script>

export default{
    name: 'UiSupportFormUser',

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

</style>