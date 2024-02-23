<template>
  <div id="app">
    <Header/>
    <router-view/>
  </div>
</template>

<script>
import '@/GlobalStyle.scss'
import Header from '@/components/Header.vue'

export default {
  name: "App",
  components: {
    Header
  }
}
</script>

<style lang="scss">
</style>
