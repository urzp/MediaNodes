<template>
    <div class="back">
        <RouterLink :to="to" class="backButton" >
            <img v-if="icon=='left'" src="@/assets/icons/leftarrow.svg" alt="back">
            <img v-if="icon=='right'" src="@/assets/icons/rightarrow.svg" alt="back">
        </RouterLink>
        <RouterLink :to="to" class="label">{{ label }}</RouterLink>
    </div>
</template>

<script>
export default {
    name: 'UiButtonBack',
    props:{
        label:{
            type: String,
            default: ''
        },
        to:{
            type: String,
            default: ''
        },
        icon:{
            type: String,
            default: 'left'
        },
        backgroundColor:{
            type: String,
            default: '#2F2F2F'
        }
    }
}
</script>

<style scoped>
    .back{
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .back .label{
        text-decoration: none;
        color: #ffffffc5;
        font-family: 'Intro-Book';
        font-size: 12px;
        margin-left: 10px;
        text-transform: uppercase ;
    }
    .backButton{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background-color: v-bind(backgroundColor);
        border-radius: 20px;
    }

</style>