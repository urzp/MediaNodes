<template>
    <UiButtonBack :to="`/users`" label="Назад к списку пользователей"/>
    <UiLoader v-if="lading"/>
    <UiNotFound v-if="notFound"/>
    <template v-if='!lading&&!notFound'>
        <UiUserInf :user="user"/>
        <div class="title">Устройства пользователя</div>
        <UiTablePlayers users :user="user"/>
    </template>
</template>

<script>
import { getData } from '@/servis/getData.js'
import { EventBus } from '@/servis/EventBus'
import UiButtonBack from '@/components/UiComponents/UiButtonBack.vue';
import UiLoader from '@/components/UiLoader.vue'
import UiNotFound from '@/components/UiNotFound.vue'
import UiUserInf from '@/components/User/UiPUserInformation.vue'
import UiTablePlayers from '@/components/Player/UiTablePlayers.vue'


export default {
    name: 'UiUserPlayers',
    async mounted(){
       //this.loopUpdate = setInterval( this.udatePlayer, this.$settings.updateTime)
       this.udatePlayer()
       EventBus.on('user:update', this.udatePlayer)
       //EventBus.on('player:update', this.udatePlayer)
    },
    beforeUnmount(){
        clearInterval(this.loopUpdate)
    },
    props: {
        userId: String,
    },
    data(){
        return{
            lading:true,
            notFound:false,
            playersListsTable:'',
            user:{},
            playerList:'',
            test:this.$settings.udateTime
        }
    },
    methods:{
        async udatePlayer(){
            let result = await getData('readUserById.php',{'user_id':this.userId})
            if(!this.checkResult(result)) return false
            this.user = result.user
        },
        checkResult(result){
            this.lading = false
            if (result.success) return true
            this.notFound = true
            return false
        },
        async isChangeList(old_val, new_val){
            if(!old_val||!new_val) return true
            if(!old_val.length||!new_val.length) return true
            if(old_val.length != new_val.length) return true
            for(let i=0; i < old_val.length - 1; i++ ){
                if(old_val[i].id_track != new_val[i].id_track) return true
                if(old_val[i].disLike != new_val[i].disLike) return true
            }
            return false
        }
    },
    components: { 
        UiLoader,
        UiNotFound,
        UiUserInf,
        UiTablePlayers,
        UiButtonBack,
    }
}
</script>

<style>


.title{
    font-family: 'Intro-Bold-Alt';
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
  }

</style>

