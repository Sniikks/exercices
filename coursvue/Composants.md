# Les composants

Les composants en VueJS sont des morceaux de code reutilisable qui peuvent être utilisés partout dans votre application. le composant est autonome. Il peut contenir lui-même d'autres composants, et ainsi construire une arborescence de composants.
Un composant est une pièce unique de votre application qui peut-être utilisée partout dans votre application. Il peut contenir ses propres données, méthodes, cycles de vie, style.

On peux considéré un composant comme une fonction ou on peu lui rajouter des paramètres.

Dans un composant on y retrouve du HTML , du JavaScript et du CSS 
```js
<template>
    <h5>Coucou</h5>
</template>

<script>
export default {
    name: "Nom De Mon Composant"
}
</script>

<style scoped>
    h5 {
        color: red
    }
</style>
```
## Le template 

Le template contient tout le code HTML du composant il obligé de contenir un conteneur pour y mettre plusieurs élément

## Le script

Le script contient le code JavaScript du composant il a obligatoirement un `export default` qui va contenir l'objet représentant notre composant.

- `name`: Nom du composant, obligatoire pour que Vue puisse identifier ce composant
- `props`: 
