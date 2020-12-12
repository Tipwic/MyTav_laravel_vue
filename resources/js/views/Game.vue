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
    this.loadGame();
  },

  watch: {
    $route(to, from) {
      this.loadGame();
    },
  },

  methods: {
    store() {
      this.loading = true;
      axios
        .post("/api/games", this.form, {
          headers: {
            "Content-type": "application/json",
          },
        })
        .then((res) => {
          if (res.data.status) {
            this.$router.push("/game/" + res.data.post.id);
          } else {
            setTimeout(() => {
              this.loading = false;
            }, 300);
            this.error = true;
          }
        });
    },

    loadGame() {
      (this.loading = true),
        axios.get("/api/avatars/" + this.$route.params.id).then((res) => {
          this.avatar = res.data;
          this.loading = false;
        });
    },
    onLoadedGame() {
      this.$emit("onLoaded", this.game);
    },
  },
};
</script>

<style scoped>
</style>
