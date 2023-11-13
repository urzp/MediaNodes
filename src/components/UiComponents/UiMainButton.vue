<template>
    <div class="button">
        <slot/>
    </div>
</template>


<script>

export default {
  name: 'UiBigButton',

}

</script>

<style scoped>
    .button{
        width: 350px;
        height: 210px;
        margin-right: 20px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background-color: #2F2F2F;
        transition: 0.5s;
        cursor: pointer;
    }
    .button:hover{
        background-color: #010101;
        transition: 0.5s
    }
    :slotted( img ) {
        max-width: 70px;
        max-height: 70px;
        margin-bottom: 30px;
    }
    :slotted( .name ) {
       color: #fff;
       font-family: 'Intro-Bold-Alt';
       font-size: 18px; 
    }
    
    @media (max-width: 1485.00px) { 
        .button{
            width: calc(33% - 18px);
        }
    }

    @media (max-width: 1140.00px) { 
        .button{
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 900.00px) { 
        .button{
            width: calc(100% - 10px);
        }
    }

</style>