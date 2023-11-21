<template>
        <div v-if="show_result" class="search">
            <img src="@/assets/icons/search.svg" alt="search">
            <input type="text" placeholder="Поиск плеера" v-model="find" @focus="gotoPlayers()">
            <UiFilter class="filter" :find_val="find" @filter:selected="(value)=>{find = value}"/>
        </div>
</template>


<script>
import UiFilter from '@/components/UiFilter.vue'

export default {
name: 'UiSearch',
    created(){
        this.show_hide()
        window.addEventListener("resize", this.show_hide);
    },
    data(){
        return {
            find:'',
            show_result: true
        }
    },
    props:{
        show:Object
    },
    components:{
        UiFilter,
    },
    methods:{
        gotoPlayers(){
            this.$router.push('/players')
        },
        show_hide(){
            let show = this.show
            if(window.innerWidth<show.w_size) this.show_result = !show.more
            if(window.innerWidth>=show.w_size) this.show_result = show.more
        }
    },
}

</script>

<style scoped>
    .search{
        position: relative;
        width: calc(80% - 50px);
        max-width: 750px;
        display: flex;
        align-items: center;   
    }
    .search img{
        position: absolute;
        left: 22px;
        top: 12px;
    }
    input{
        width: 100%;
        height: 45px;
        border-radius: 25px;
        background-color: transparent;
        border: 1px solid #B8B8B8;
        color: #B8B8B8;
        font-family: 'Intro-Book';
        font-size: 15px;
        padding-left: 65px;

    }
    .filter{
        position: absolute;
        right: 4px; 
    }
    @media (max-width: 900px) {
        .search{
                width: 60%;
        }

    }    

    @media (max-width: 800px) {
        .search{
                width: 440px;
        }

    }  

    @media(max-width:450px){
        .search{
            margin-bottom: 50px;
        }
    }
</style>