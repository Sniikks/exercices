<template>
  <div id="app">
    <h1>Bonjour je suis sur mon serveur VueJS</h1>
    <div>
      <article v-for="articleValue in articles" :key="articleValue.title" :id="articleValue.title[articleValue.title.length-1]">
        <h2>{{ articleValue.title }}</h2>
        <p>{{ articleValue.description }}</p>
        <img :src=articleValue.image alt="Image de l'article" />
      </article>
    </div>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      articles: [
        {
          title: "Mon article n°1",
          description: "Je suis le premier article",
          image: "./assets/article1.png"
        },
        {
          title: "Mon article n°2",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°3",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°4",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°5",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°6",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°7",
          description: "Je suis le premier article",
          image: "article1.png"
        },
        {
          title: "Mon article n°8",
          description: "Je suis le premier article",
          image: "article1.png"
        }
      ]
    }
  }
}
</script>

<style lang="scss">

</style>
