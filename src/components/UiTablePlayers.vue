<template>
    <div class="title">Устройства</div>  
    <table class="table-players">
      <thead class="header">
        <tr>
            <th class="name-plyer">Плеер</th>
            <th class="ip">IP Адрес</th>
            <th class="city">Город</th>
            <th class="adress">Адрес локации</th>
            <th class="sound-treck">Проигрываемый трек</th>
            <th class="network-status">Был в сети</th>
            <th class="uplodet">Дата<br>обновления</th>
            <th class="panel-control">Элементы<br>управления</th>
            <th class="dislike">Дизлайки</th>
        </tr>
      </thead>
    </table>
    <div class="name-plyer">Плеер</div>
</template>

<script>
export default {
  name: 'UiTablePlayers',
  components: {

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

  .table-players{
    margin-top: 25px ;
    width: 100%;
  }

  .header{

    height: 60px;
  }
  .header th, .name-plyer{
    color:#ffffffa1;
    font-family: 'Intro-Book';
    font-size: 10px;
    text-transform: uppercase;
    background-color: #191919;
    border-radius:5px ;

  }
</style>