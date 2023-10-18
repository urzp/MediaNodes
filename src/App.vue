<template>
  <!-- <nav> -->
    <!-- <router-link to="/">Home</router-link> | -->
    <!-- <router-link to="/about">About</router-link> -->
  <!-- </nav> -->
  <router-view/>
</template>

<style lang="scss">
*{
  margin: 0;padding: 0;
}

body{
  background-color: #1F1F1F;
}

#app {

  @font-face {
    font-family: 'Intro-Book';
    src: local('Intro-Book'),
      url(assets/fonts/Intro-Book.ttf);
  }

  @font-face {
    font-family: 'Intro-Bold-Alt';
    src: local('Intro-Bold-Alt'),
      url(assets/fonts/Intro-Bold-Alt.ttf);
  }

  @font-face {
    font-family: 'Intro-Black-Alt';
    src: local('Intro-Black-Alt'),
      url(assets/fonts/Intro-Black-Alt.ttf);
  }

  font-family: Intro-Book, Arial, sans-serif;
  -webkit-font-smoothing: Intro-Book;
  -moz-osx-font-smoothing: Intro-Book;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
