<template>
  <div class="home">
    <nav>
      <router-link class="test" to="/about">About</router-link>
      <router-link class="test" to="/compteur">Compteur</router-link>
    </nav>
    <img alt="Vue logo" src="../assets/images/logo/dev.jpg">
    <HelloWorld balise="2" msg="Bonjour à tous les utilisateurs du site !"  />
    <HelloWorld balise="4" msg="Tes gros!"  />
    <a href="">Coucou</a>
  </div>
</template>

<script>
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  }
}
</script>
