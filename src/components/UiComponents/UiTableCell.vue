<template>
    <div class="background">
        <div class="content">
            <div class="text">{{ text }}</div>
            <slot/>
        </div>
    </div>
</template>

<script>
export default{
    name: 'UiTableCell',
    props:{
        text:String,
    }
}
</script>

<style scoped>
.content{
    margin-left: 10px;
    margin-right: 10px;
}
</style>
