<template>
    <div class="back">
        <RouterLink :to="to" class="backButton" ><img src="@/assets/icons/leftarrow.svg" alt="back"></RouterLink>
        <RouterLink :to="to" class="label">{{ label }}</RouterLink>
    </div>
</template>

<script>
export default {
    name: 'UiButtonBack',
    props:{
        label:String,
        to:String
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
        background-color: #2F2F2F;
        border-radius: 20px;
    }

</style>