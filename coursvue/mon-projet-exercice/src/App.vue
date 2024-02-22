<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
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
  .test, button {
    font-size: 1.5em;
    background-color: rgb(223, 223, 65);
    border: none;
    padding: 15px;
    margin: 5px;
    border-radius: 10px;
    text-decoration: none;
    color: rgb(253, 254, 255)
  }
}
</style>
