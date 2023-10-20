<template>
        <div class="wrap">
        <RouterLink :to="to" class="Button" ><slot/></RouterLink>
        <RouterLink :to="to" class="label">{{ label }}</RouterLink>
    </div>
</template>

<script>
export default{
    name: UiButtonLabel,
    props:{
        label:String,
        to: String,
        backgroindColor:{
          type:String,
          default: "#2F2F2F"
        },
    }
}

</script>

<style scoped>
    .Button{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background-color: v-bind(backgroindColor); 
        border-radius: 20px;
    }

    .label{
        text-decoration: none;
        color: #ffffffc5;
        font-family: 'Intro-Book';
        font-size: 12px;
        margin-left: 10px;
        text-transform: uppercase ;
    }
</style>