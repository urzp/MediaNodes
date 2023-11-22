<template>
    <header>
        <div v-for="item, i in header" :key="item.key" :class="header[i].class">
            {{ item.name }}
            <div v-if="i==0&&addPlayer" class="add_player" @click="$router.push({ name: 'addPlayer' })">
                <img src="@/assets/icons/plus.svg" alt="">
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'UiTableHeader',
    data(){
        return{
        header:[
            {key:1, class:'table-col-1', name:'Плеер'},
            {key:2, class:'table-col-2', name:'Пользователь'},
            {key:3, class:'table-col-3', name:'Город'},
            {key:4, class:'table-col-4', name:'Адрес локации'},
            {key:5, class:'table-col-5', name:'Проигрываемый трек'},
            {key:6, class:'table-col-6', name:'Был в сети'},
            {key:7, class:'table-col-7', name:'Обновлен'},
            {key:8, class:'table-col-8', name:'Элементы управления'},
            {key:9, class:'table-col-9', name:'Дизлайки'},
        ],
        }
    },
    props:{
        addPlayer:Boolean
    },
}
</script>

<style scoped>
    .table-col-1{
        position: relative;
    }
  .add_player{
    position: absolute;
    right: 0px;
    margin: 12px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 22px;
    height: 22px;
    border-radius: 15px;
    background-color: #383838;
    cursor: pointer;
  }
 header{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
  }
  header>div{
    display: flex;
    align-items: center;
    justify-content: center;
    color:#ffffffa1;
    font-family: 'Intro-Bold-Alt';
    font-size: 10px;
    text-transform: uppercase;
    background-color: #191919;
    border-radius:5px ;
    height: 60px;
    margin-right: 3px;
  }

</style>

<style scoped src="./widthColloms.css"></style>