<template>
    <div class="menu-item"  :class="{'selected':selected}">
        <div class="icon"><slot/></div>
        <div class="name-menu-item">{{ text }}</div>
        <div v-if="selected" class="seleted-indicator-wrap">
            <div class="seleted-indicator"></div>
        </div>
    </div>
</template>

<script>

export default {
  name: 'UiLeftBar',
  props: {
    text: String,
    selected: Boolean,
  }
}

</script>

<style scoped>
.menu-item{
    height: 45px;
    display: flex;
    flex-direction: row;
    align-items: center;
}
.icon{
    margin-left: 40px;
    width: 30px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
.name-menu-item{
    margin-left: 10px;
    color: #B8B8B8;
    font-family: 'Intro-Book';
    font-size: 16px;
    cursor: pointer;
}

.seleted-indicator-wrap{
    height: 100%;
    
}
.seleted-indicator{
    width: 6px;
    position: absolute;
    height: 45px;
    right: 0;
    background-color: #F93492;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}

.menu-item.selected{
    background: linear-gradient(90deg, rgba(255, 255, 255, 0.06) 0%, rgba(255, 255, 255, 0) 100%);
}

.selected .icon{
    cursor: default;
}

.selected .name-menu-item{
    color: #fff;
    cursor: default;
}
</style>
