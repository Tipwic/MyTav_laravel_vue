<template>
  <div>
    <spin v-if="loading" />
    <div v-else class="uk-position-center uk-overlay uk-overlay-default">
      Game {{ game }}
    </div>
  </div>
</template>

<script>
import Spin from "../components/utils/Spin";
import axios from "axios";

export default {
  components: { Spin },

  props: {},

  data: () => ({
    guild: Number,
    loading: true,
    error: false,
  }),

  mounted() {
  },

  watch: {
    $route(to, from) {
    },
  },

  methods: {
    store() {
    },

    loadGuild() {
    },
    onLoadedGuild() {
    },
  },
};
</script>

<style scoped>
</style>
