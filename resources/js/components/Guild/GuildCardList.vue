<template>
    <div class="uk-card uk-card-default uk-card-hover">
      <div class="uk-card-header">
        <div class="uk-grid-small uk-flex-middle" uk-grid>
          <div class="uk-width-auto">
            <img width="60" height="60" src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d6/BT_logo.svg/1280px-BT_logo.svg.png">
          </div>
          <div class="uk-width-expand">
            <h3 class="uk-card-title uk-margin-remove-bottom">{{ guild.name }}</h3>
            <p class="uk-text uk-margin-remove"><time datetime="2016-04-01T19:00">Internet Service Provider</time></p>
            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Contracts: 0, Warranties: 0</time></p>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    guild: Object,
  },
  mounted() {
  },
};
</script>

<style scoped>
</style>
