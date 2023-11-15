<template>
    <div class="wrap" :class="{'open':open}">
        <UiButtonBack icon="right" backgroundColor="#474747" class="buton_close" @click="$emit('close', true)"/>
        <div class="title">
            <div class="icon"><img src="@/assets/icons/bigButtons/users.svg" alt=""></div>
            <div class="text">Выбрать</div>
        </div>
        <div class="users_list">
            <div class="row" v-for="item in users" :key="item.id" :class="{active:id_user_owner==item.id}" @click="selectUser(item.id)">
                <div v-if="id_user_owner==item.id" class="marker"></div>
                <div class="name_user">{{ item.name }}</div>
            </div>
        </div>
        <div v-if="false" class="cancel_button" @click="$emit('close', true)">
            <div class="text" >Закрыть</div>
        </div>  
    </div>
</template>

<script>
import { getData } from '@/servis/getData.js'
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue'
export default{
    name: 'UiUsersList',
    async mounted(){
        this.updateList()
    },
    data(){
        return{
            users:'',
        }
    },
    props:{
        id_user_owner: String,
        open:Boolean,
    },
    methods:{
        async updateList(){
            let result = await getData('readUsers.php')
            if (!result.success) return false
            this.users = await result.users
        },
        selectUser(id){
            this.$emit('select_user',id)
        }
    },
    emits:['close', 'select_user'],
    components:{
        UiButtonBack,
    }

}
</script>

<style scoped>
    .wrap{
        position: fixed;
        right: 0;
        top: 0px;
        width: 270px;
        height: 100Vh;
        z-index: 10;
        background-color: #303030;
        transform: translate(270px,0);
        transition: all 0.5s ease-in-out;
    }

    .wrap.open{
        transform: translate(0px,0);
        transition: all 0.5s ease-in-out;     
    }
    .buton_close{
        position: absolute;
        right: 5px;
        top: 10px;
    }
    .title{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-top: 50px;
    }
    .icon{
        height: 45px;
        width: 45px;
        margin-left: 50px;
    }
    img{
        width: 100%; 
    }
    .title .text{
        margin-left: 10px;
        font-family: 'Intro-Bold-Alt';
        font-size: 20px;
        color: #fff;
    }

    .users_list{
        margin-top: 30px;
    }
    .row{
        height: 40px;
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        font-family: 'Intro-Book';
        font-size: 16px;
        color: #858585;  
        text-align: left;    
        cursor: pointer;
    }

    .name_user{
        margin-left: 50px;
    }
    .active{
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.06) 0%, rgba(255, 255, 255, 0) 100%);
    }
    .marker{
        width: 6px;
        height: 100%;
        margin-right: -6px;
        background-color: #F93492;
        border-bottom-right-radius: 4px;
        border-top-right-radius: 4px;
    }

    .cancel_button{
        width: 115px;
        height: 40px;
        position: absolute;
        bottom: 0;
        left: 86px;
        margin-top: 25px;
        margin-right: 57px;
        margin-bottom: 15px;
        border: 1px solid #fff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        align-self: end;
        cursor: pointer;
        color:#fff;
        font-family: 'Intro-Bold-Alt';
        font-size: 16px;
        margin: 20px auto;
        text-align: center;
    }
</style>