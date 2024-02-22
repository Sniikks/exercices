<template>
    <div>
        <nav>
            <button @click="Retour()">Retour</button>

            <router-link to="/">Home</router-link> | 
            <router-link to="/about">About</router-link>
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
        }
    }
}

</script>

<style>

</style>