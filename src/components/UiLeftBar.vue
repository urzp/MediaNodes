<template>
    <div class="left-bar">
        <RouterLink to="/" class="logo"><img src="../assets/icons/Logo.png" alt="logo"></RouterLink>
        <div class="menu-list">
            <UiMenuItem text="Главная" :selected="true"><img src="../assets/icons/home.svg" alt="home"></UiMenuItem>
            <UiMenuItem text="Профиль"><img src="../assets/icons/user.svg" alt="home"></UiMenuItem>
            <UiMenuItem text="Техподержка"><img src="../assets/icons/support.svg" alt="home"></UiMenuItem>
            <UiMenuItem text="Выйти"><img src="../assets/icons/logout.svg" alt="home"></UiMenuItem>
        </div>
    </div>
</template>

<script>
import UiMenuItem from '@/components/UiMenuItem.vue'

export default {
  name: 'UiLeftBar',
  components: {
    UiMenuItem,
  }
}

</script>

<style scoped>
    .left-bar{
        position: fixed;
        width: 270px;
        height: 100vh;
        background-color: #2F2F2F;
    }

    .left-bar .logo{
        display: block;
        margin-top: 20px;
        margin-left: 40px;
        text-align: left;
    }
    .menu-list{
        margin-top: 40px;
    }
</style>