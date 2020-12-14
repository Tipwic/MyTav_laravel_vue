<template>
  <div class="uk-article">
    <h1 class="uk-article-title">
      <a>Article Heading</a>
    </h1>
    <p class="uk-article-meta">
      Written by Author on 12 April 2013. Posted in <a href="#">Blog</a>
    </p>
    <p>
      <a
        ><img
          width="900"
          height="300"
          :src="'../../../../public/assets/images/fond.jpg'"
          alt=""
      /></a>
    </p>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor
      incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
      nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi
      consequat. Quis aute iure reprehenderit in voluptate velit esse cillum
      dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <h2>Subheading</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor
      incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
      nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi
      consequat. Quis aute iure reprehenderit in voluptate velit esse cillum
      dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <p>
      <a class="uk-button uk-button-primary" v-on:click="loadArticle"
        >Continue Reading</a
      >
      <a class="uk-button" href="layouts_post.html">4 Comments</a>
    </p>
  </div>
</template>


<script>
export default {
  name: "Article",

  methods: {
    loadArticle() {
      this.$router.push(`/article`).catch((err) => {});
    },
  },
};
</script>

<style scoped>
</style>
