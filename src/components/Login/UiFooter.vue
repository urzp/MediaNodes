<template>
    <footer>
        <div class="copy-right">
            © 2023, LS MEDIA
        </div>
        <div class="contacts-social-network">
            <div class="whatsapp">
                <a href="#">
                    <img src="@/assets/icons/whatsapp.svg" alt="whatsapp">
                </a>
            </div>
            <div class="telegram">
                <a href="#">
                    <img src="@/assets/icons/telegram.svg" alt="whatsapp">
                </a>
            </div>
        </div>
        <div class="privacy-policy">
            <a href="#">
                Политика конфиденциальности
            </a>
        </div>
    </footer>
</template>

<script>
export default {
  name: 'UiFooter'
}
</script>

<style scoped>

footer{
    position: fixed;
    bottom: 0px;
    width: 100%;
    height: 80px;
    background-color: #2F2F2F;
    display: flex;
    color: #FFFFFF;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    font-family: 'Intro-Book';
    font-size: 15px;
}

.contacts-social-network{
    display: flex;
}
.contacts-social-network > div{
    margin: 0 5px;
    width: 30px;
    height: 30px;
}
.copy-right, .privacy-policy{
    opacity: 0.7;
    margin: auto 40px;
}

a{
    color: #fff;
    text-decoration: none;
}
</style>
