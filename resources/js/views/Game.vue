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
    game: Number,
    loading: true,
    error: false,
  }),

  mounted() {
  },

  watch: {
  },

  methods: {
    store() {
    },

    loadGame() {
    },
    onLoadedGame() {
    },
  },
};
</script>

<style scoped>
</style>
