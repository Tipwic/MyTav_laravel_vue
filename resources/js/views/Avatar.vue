<template>
  <div>
    <spin v-if="loading" />
    <div v-else class="uk-position-center uk-overlay uk-overlay-default">
      Avatar {{ avatar }}
    </div>
  </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";

export default {
  components: { Spin },

  props: {},

  data: () => ({
    avatar: Number,
    loading: true,
    error: false,
  }),

  mounted() {
    this.loadAvatar();
  },

  watch: {
    $route(to, from) {
      this.loadAvatar();
    },
  },

  methods: {
    store() {
      this.loading = true;
      axios
        .post("/api/posts", this.form, {
          headers: {
            "Content-type": "application/json",
          },
        })
        .then((res) => {
          if (res.data.status) {
            this.$router.push("/post/" + res.data.post.id);
          } else {
            setTimeout(() => {
              this.loading = false;
            }, 300);
            this.error = true;
          }
        });
    },

    loadAvatar() {
      (this.loading = true),
        axios.get("/api/avatars/" + this.$route.params.id).then((res) => {
          this.avatar = res.data;
          this.loading = false;
        });
    },
    onLoadedAvatar() {
      this.$emit("onLoaded", this.avatar);
      this.$emit("custom-event-name", { message: "My custom message" });
    },
  },
};
</script>

<style scoped>
</style>
