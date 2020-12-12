<template>
  <div>
    <spin v-if="loading" />
    <div v-else class="uk-position-center uk-overlay uk-overlay-default">
      Avatar {{ avatar.name }}
    </div>
    <button
        class="uk-button uk-button-primary uk-width-1-1 uk-button-small"
        v-on:click="OpenAvatarForm"
      >
        Modifier Avatar
      </button>
  </div>
</template>

<script>
import Spin from "../components/utils/Spin";
import axios from "axios";
import { bus } from "../app";

export default {
  components: { Spin },

  props: {},

  data: () => ({
    avatar: {},
    loading: true,
    error: false,
    formAction: String,
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
    loadAvatar() {
      (this.loading = true),
        axios.get("/api/avatars/" + this.$route.params.id).then((res) => {
          console.log(res)
          this.avatar = res.data.avatar;
          this.onLoadedAvatar();
          this.loading = false;
        });
    },

    OpenAvatarForm() {
      var data = {
        action: "update",
        category: "avatar",
        form: this.avatar,
      };
      bus.$emit("OpenAvatarForm", data);
    },

    onLoadedAvatar() {
      bus.$emit("onLoadedAvatar", this.avatar);
    },
  },
};
</script>

<style scoped>
</style>
