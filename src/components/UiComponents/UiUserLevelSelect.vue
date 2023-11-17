<template>
    <div class="form">
        <div class="title">
            Уровень пользователя.
        </div>
        <div class="radiobatons">
            <div class="selection-row">
                <input type="radio" value="admin"  v-model="level">
                <label>admin</label>
            </div>
            <div class="selection-row">
                <input type="radio" value="user"  v-model="level">
                <label>user</label>
            </div>
            <div class="selection-row">
                <input type="radio" value="guest"  v-model="level">
                <label>guest</label>
            </div>
        </div>
        <div class="cancel_button" @click="$emit('close', true)">
            <div class="text">Отмена</div>
        </div>  
    </div>
</template>

<script>
import sendData from '@/servis/sendData'
import { EventBus } from '@/servis/EventBus'
export default{
    name: 'UiUserLevelSelect',
    data(){
        return{
            level: this.user.level,
            user_id:JSON.parse(sessionStorage.getItem('user')).id,
            session: sessionStorage.getItem('session'),
        }
    },
    props:{
        user: Object,
    },
    watch:{
        level(){
           setTimeout( ()=>{ this.$emit('close', true) }, 300)
           this.sendLevelUser();
        }
    },
    methods:{
        async sendLevelUser(){
            let data = {
                id: this.user_id,
                session: this.session,
                user_id_edit: this.user.id,
                user_level: this.level,
            }
           await sendData('updateUserLevel.php',data)
           EventBus.emit('user:update');
        }
    },
    emits:['close']
}

</script>

<style scoped>
    .form{
        position: fixed;
        top: calc(50% - 80px);
        left: calc(50% - 340px/2);
        width: 340px;
        min-height: 230px;
        padding: 15px;
        border-radius: 10px;
        background-color: #1F1F1F;
        color: #fff;
        font-family: 'Intro-Bold-Alt';
        font-size: 18px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        z-index: 100;
    }
    .title{
        font-family: 'Intro-Bold-Alt';
        font-size: 20px;
        margin: 20px auto;
        text-align: center;
    }
    .radiobatons{
        margin-left: 56px;
    }
    .selection-row{
        
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-top: 10px;
    }

    label{
        margin-left: 25px;
    }

    .cancel_button{
        width: 115px;
        height: 40px;
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
    }

    input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: white;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        cursor: pointer;
    }
    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #F93492;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        cursor: pointer;
    }

    @media(max-width: 540px){
        .form{
            width: 260px;
            min-height: 200px;
            left: calc(50% - 290px/2);
        }
    }
</style>