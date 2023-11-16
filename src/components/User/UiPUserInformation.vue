<template>
<div class="title">
    <div class="text">Пользователь</div>
    <div v-if="false"  class="edit">
        <RouterLink :to="`/players/edit/${user.id}`" class="editButton"><img src="@/assets/icons/pen.svg" alt="pen"></RouterLink>
        <RouterLink :to="`/players/edit/${user.id}`" class="label">Редактировать пользователя</RouterLink>
    </div>
</div>
<div class="inf v1">
    <div class="cell icon"><img :src="url_avatars" alt=""></div>
    <div class="cell name"><div class="text">{{ user.name }}</div></div>
    <div class="cell email"><div class="text">{{ user.email }}</div></div>
    <div class="cell tel"><div class="text">{{ user.tel }}</div></div>
    <div class="cell level" @click="showUserLevel=true">
        <div class="text">{{ user.level}}</div>
        <div class="icon_edit"><img src="@/assets/icons/pen.svg" alt=""></div>
    </div>
</div>
<div class="inf v2">
    <div class="inf_row">
        <div class="cell icon"><img :src="url_avatars" alt=""></div>
        <div class="cell name"><div class="text">{{ user.name }}</div></div>
    </div>
    <div class="inf_row">
        <div class="cell email"><div class="text">{{ user.email }}</div></div>
        <div class="cell tel"><div class="text">{{ user.tel }}</div></div>
        <div class="cell level" @click="showUserLevel=true">
            <div class="text">{{ user.level}}</div>
            <div class="icon_edit"><img src="@/assets/icons/pen.svg" alt=""></div>
        </div>
    </div>
</div>
<div class="inf v3">
    <div class="inf_row">
        <div class="cell icon"><img :src="url_avatars" alt=""></div>
        <div class="cell name"><div class="text">{{ user.name }}</div></div>
    </div>
    <div class="inf_row">
        <div class="cell email"><div class="text">{{ user.email }}</div></div>
    </div>
    <div class="inf_row">
        <div class="cell tel"><div class="text">{{ user.tel }}</div></div>
        <div class="cell level" @click="showUserLevel=true">
            <div class="text">{{ user.level}}</div>
            <div class="icon_edit"><img src="@/assets/icons/pen.svg" alt=""></div>
        </div>
    </div>

</div>
<UiUserLevelSelect v-if="showUserLevel" :user="user" @close="showUserLevel = !$event"/>
</template>


<script>
import UiUserLevelSelect from '@/components/UiComponents/UiUserLevelSelect.vue'


export default {
    name: 'UiPUserInf',
    data(){
        return{
            showUserLevel: false,
        }
    },
    props: {
        user: [Object, String],
    },
    components: { 
        UiUserLevelSelect
    },
    computed:{
        url_avatars(){
            let url = window.baseUrl + 'img/default/avatar.svg'
            if(this.user.img) url = window.baseUrl + `img/user_${this.user.id}/${this.user.img}`
            return url
        }
    }
}
</script>


<style scoped>
.back, .edit{
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.edit{
        position: absolute;
        right: 15px;
}
.back .label{
    text-decoration: none;
    color: #ffffffc5;
    font-family: 'Intro-Book';
    font-size: 12px;
    margin-left: 10px;
    text-transform: uppercase ;
}

.edit .label{
    color: #ffffff87;
    font-family: 'Intro-Book';
    font-size: 14px;
    margin-left: 10px;
}
.backButton, .editButton{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #2F2F2F;
    border-radius: 20px;
}
.editButton{
    background-color: #434343;
}

.title{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 60px;
    background-color: #2F2F2F;
    border-radius: 5px;
    margin-top: 25px;
}
.title .text{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;      
    color: #fff;
    
}

.title .edit{
    width: 240px;
}

.inf{
    display: flex;
    flex-direction: row;
    width: 100%;
    height: 60px;
    margin-top: 25px;
}
.cell{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    width: 200px;
    background-color: #2F2F2F;  
    border-radius: 5px;    
    margin-right: 3px;
    font-family: 'Intro-Book';
    font-size: 12px;  
    color: #fff;
}
.inf .name{
    justify-content: left;
    padding-left: 30px;
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;    
}

.icon img{
    max-width: 70px;
    height: 40px;
}

.level{
    cursor: pointer;
    position: relative;
}

.icon_edit{
    position:  absolute;
    right: 5px;
    top: 5px;
    width: 30px;
    height: 30px;
    border-radius: 20px;
    background-color: #434343;
  }

  .icon_edit img{
    display: block;
    margin: 9px;
  }
  .icon{
    width: 10%!important;
    min-width: 100px;
  }
  .name{
    width: 50%!important;
  }
  .email{
    width: 20%!important;
    min-width: 180px;
  }
  .tel{
    width: 15%!important;
    min-width: 150px;
  }
  .level{
    width: 10%!important;
    min-width: 100px;
  }

  .v2, .v3{
    display: none;
  }
@media(max-width:1200px){
    .v1{
        display: none;
    }

    .v2{
        display: flex;
        flex-direction: column;
        margin-bottom: 80px;
    }

    .inf_row{
        display: flex;
        margin-bottom: 4px;
    }

    .name{
        width: 100%!important;
        
    }

    .email{
    width: 35%!important;
    min-width: 180px;
  }
  .tel{
    width: 35%!important;
    min-width: 150px;
  }
  .level{
    width: 30%!important;
    min-width: 100px;
  }
}

@media(max-width:460px){
    .v2{
        display: none;
    }
    .v3{
        display: flex;
        flex-direction: column;
        margin-bottom: 160px;
    }
    .email{
        width: 100%!important;
        min-width: 180px;
    }
    .tel{
        width: 50%!important;
        min-width: 150px;
    }
    .level{
        width: 50%!important;
        min-width: 100px;
    }
}

</style>