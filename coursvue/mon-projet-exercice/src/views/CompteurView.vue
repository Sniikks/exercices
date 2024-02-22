<template>
    <div>
        <nav>
            <button @click="Retour()">Retour</button>
            <button @click="Page()">Home</button>
            <router-link class="test" to="/">Home</router-link>
            <router-link class="test" to="/about">About</router-link>
        </nav>
        <ButtonCompteur/>
    </div>
</template>

<script>
import ButtonCompteur from '../components/ButtonCompteur.vue'

export default {
    name: "CompteurView",
    components: {
        ButtonCompteur
    }, 
    methods: {
        Retour() {
            this.$router.go(-1)
        }, 
        Page() {
            this.$router.push({ name: 'home' })
        }
    }
}

</script>

<style>
</style>