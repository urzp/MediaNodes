<template>
    <UiButtonBack :to="`/players/${player.id}`" label="Назад к плееру"/>
    <div class="title">Плеер: {{ player.name }}</div>
    <form action=""  ref="submit">

        <input name="user_id" type="hidden" :value="user_id">
        <input name="session" type="hidden" :value="session">
        <input name="player_id" type="hidden" :value="player.id">
        <input name="owner_id" type="hidden" :value="id_user_owner">

        <div class="title">Имя устройтсва</div>
        <InputMask class="input" name="name" placeholder="P00000000" mask="P999999999" v-model="name"/>
        <div v-if="v$.name.$error" class="error-message" >поле недолжно быть пустым</div>

        <template v-if="showOwner">
            <div class="title">Владелец плеера</div>
            <div class="owner" @click="showUsers=!showUsers"><div class="text" >{{ owner }}</div></div>
        </template>

        <div class="title">Город</div>
        <input name="city" placeholder="Москва" v-model="city"/>
        <div v-if="v$.city.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title">Адрес</div>
        <input name="address" placeholder="ул. Ленина д.2" v-model="address"/>
        <div v-if="v$.address.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="title" >IP</div>
        <InputMask class="input" name="ip" placeholder="178 . 178 . 035 . 035" mask="999 . 999 . 999 . 999" v-model="ip"/>
        <div v-if="v$.ip.$error" class="error-message" >поле недолжно быть пустым</div>

        <div class="buttons">
            <div class="cancelButton" @click="cancel()">Отмена</div>
            <div class="submitButton" @click="submit()">Отправить</div>
            <input type="submit"  value="" style="display: none;" />
        </div>
    </form>
    <UiUsersList :id_user_owner="id_user_owner" :open="showUsers" @close="showUsers = !$event" @select_user="id_user_owner=$event"/>
</template>

<script>
import  UiUsersList from '@/components/UiComponents/UiUsersList'
import { getData } from '@/servis/getData.js'
import { sendForm } from '@/servis/sendForm'
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue'
import InputMask from 'primevue/inputmask';
import useVuelidate from '@vuelidate/core'
import { required} from '@vuelidate/validators'
import { EventBus } from '@/servis/EventBus'


export default{
    name: 'UiPlayerEdit',
    setup () {
        return { v$: useVuelidate() }
    },
    async created(){
        this.update()
    },
    data(){
        return{
            player:{},
            user_id:JSON.parse(sessionStorage.getItem('user')).id,
            session: sessionStorage.getItem('session'),
            id_user_owner:'',
            showOwner:false,
            owner:'',
            name: '',
            city: '',
            address: '',
            ip:'',
            showUsers: false
        }
    },
    props:{
        playerId: String
    },
    validations(){
        return{
            name: { required },
            city: { required },
            address: { required },
            ip: { required }, 
        }
        
    },
    watch:{
        id_user_owner(){
            this.updateOwner()
        }
    },
    methods:{
        async submit(){
            this.v$.$validate()
            let nameCheck =!this.v$.name.$error
            let cityCheck =!this.v$.city.$error
            let addressCheck =!this.v$.address.$error
            let ipCheck =!this.v$.ip.$error
            let allCheck = nameCheck&&cityCheck&&addressCheck&&ipCheck
            if(allCheck) { await sendForm('updatePlayer.php', this.$refs.submit) } else return false
            EventBus.emit('toaster',{status:'success', message:'Данные обновлены'})
            setTimeout( ()=>{this.$router.push(`/players/${this.player.id}`)}, 3500)  ;
        },
        async cancel(){
            this.update()
        },
        async update(){
            let result = await getData('readPlayer.php',{'player_id':this.playerId})
            this.player = await result.player
            this.id_user_owner = this.player.id_user
            this.name = this.player.name
            this.city = this.player.city
            this.address = this.player.address
            this.ip = this.player.ip    
        },
        async updateOwner(){
            let result = await getData('readUserById.php',{user_id: this.id_user_owner})
            if(!result.success) return false
            this.owner = result.user.name;
            this.showOwner = true;
        }
    },
    components:{
        UiButtonBack,
        InputMask,
        UiUsersList
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

.buttons{
    display: flex;
    justify-content: flex-start;
}

.submitButton, .cancelButton{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    
    margin-top: 40px;
    margin-right: 10px;
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
.cancelButton{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: transparent;
    border: 1px solid #fff;
}

.input{
    box-sizing: content-box!important;
}
.error-message {
    margin-top: 5px;
    color: #e7e7e7;
}

.owner{
    width: 100%;
    height: 60px;
    border: 1px solid #858585;
    border-radius: 5px;
    margin-top: 10px;
    color: #858585;
    font-family: 'Intro-Book';
    font-size: 16px;
    display: flex;
    align-content: center;
    flex-wrap: wrap;
    cursor: pointer;
}

.owner .text{
    text-align: left;
    margin-left: 20px;
}

@media (max-width: 550px) {
    form {
        width: calc(100% - 10px);
    }

    input{
        width: calc(100% - 40px)!important;
    }

    .owner{
        width: 100%;
    }
}
@media (max-width: 500px){
    .buttons{
        flex-direction: column!important;
    }

    .cancelButton, .submitButton {
        height: 40px;   
    }

    .submitButton{
        margin-top: 20px;
        margin-bottom: 100px;
    }
}
</style>