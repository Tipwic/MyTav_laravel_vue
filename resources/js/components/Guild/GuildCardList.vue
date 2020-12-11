<template>
  <div class="uk-card uk-card-default">
    <div class="uk-card-header">
      test
    </div>
    <div class="uk-card-body">
      <p>test</p>
    </div>
    <div class="uk-card-footer">
      <a href="#" class="uk-button uk-button-text">Read more</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    guild: Object,
  },
  mounted() {
    console.log(this.guild);
  },
};
</script>

<style scoped>
</style>
