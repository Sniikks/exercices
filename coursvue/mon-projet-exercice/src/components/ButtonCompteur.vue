<template>
    <div>
        <button @click="clickerBouton()">J'augmente de {{ incrementation }} </button> 
        <p>Le résultat est {{ resultat }} </p>    
    </div>
</template>

<script>
export default {
    name: "ButtonCompteur",
    data() {
        return {
            incrementation: 1,
            resultat: 0 
        }
    },
    methods: {
        clickerBouton(){
            this.resultat += this.incrementation
            console.log(this.resultat)
        }
    }
}
</script>

