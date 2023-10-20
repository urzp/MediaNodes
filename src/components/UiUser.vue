<template>
    <div class="title">Профиль</div>
    <form action="">
        <div class="title">Название компании</div>
        <input name="" placeholder="Альфа банк"/>
        <div class="title">Email</div>
        <input name="" placeholder="info@alfabank.ru"/>
        <div class="title">Телефон</div>
        <input name="" placeholder="+7 (495) 999 99 99"/>
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