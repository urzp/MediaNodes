<template>
  <UiHeader/>
  <UiLeftBar selcted="home"/>
  <div class="content">
    <div class="title">Добро пожаловать в Личный кабинет!</div>
    <div class="buttons">
      <UiMainButton @click="$router.push('/players')"><img src="@/assets/icons/bigButtons/player.svg" alt=""><div class="name">Плееры</div></UiMainButton>
      <UiMainButton @click="$router.push('/user')"><img src="@/assets/icons/bigButtons/user.svg" alt=""><div class="name">Профиль</div></UiMainButton>
      <UiMainButton @click="$router.push('/support-user')"><img src="@/assets/icons/bigButtons/support.svg" alt=""><div class="name">Техподдержка</div></UiMainButton>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import UiLeftBar from '@/components/UiLeftBar.vue'
import UiHeader from '@/components/UiHeader.vue'
import UiMainButton from '@/components/UiComponents/UiMainButton.vue'

export default {
  name: 'HomeView',
  components: {
    UiLeftBar,
    UiHeader,
    UiMainButton
  }
}
</script>

<style scoped>
  .content{
    position: absolute;
    
    margin-top: 105px;
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;
    flex-direction: column;
    padding-left: 330px;
    width: calc(100% - 300px - 70px);

    background-image: url('@/assets/icons/backimg.svg');
    background-position: center;
    background-repeat: no-repeat;
    height: calc(100% - 105px);
  }

  .title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
  }

  .buttons{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin-top: 30px;
    width: 100%;
    height: 100%;
  }

</style>
