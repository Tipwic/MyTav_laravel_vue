<template>
  <div>
    <spin v-if="loading" />

    <div class="uk-margin">
      <div class="uk-inline uk-width-1-1">
        <span class="uk-form-icon" uk-icon="icon: user"></span>
        <input
          id="name"
          class="uk-input uk-form-large"
          type="text"
          placeholder="Pseudo"
          v-model="form.name"
          required
        />
      </div>
    </div>

    <div class="uk-margin">
      <button
        v-if="action == 'create'"
        type="submit"
        class="uk-button uk-button-primary uk-button-large uk-width-1-1"
        v-on:click="store"
      >
        Créer
      </button>

      <button
        v-if="action == 'update'"
        type="submit"
        class="uk-button uk-button-primary uk-button-large uk-width-1-1"
        v-on:click="update"
      >
        Modifier
      </button>
    </div>
  </div>
</template>

<script>
import Spin from "../utils/Spin";
import axios from "axios";
import { bus } from "../../app";

export default {
  components: { Spin },
  props: {
    form: Object,
    action: String,
  },
  data: () => ({
    loading: false,
    error: false,
  }),

  created() {},
  mounted() {},
  methods: {
    store() {
      if (!this.loading) {
        this.loading = true;
        console.log(this.form);
        axios
          .post("/api/avatars", this.form, {
            headers: {
              "Content-type": "application/json",
            },
          })
          .then((res) => {
            if (res.data) {
              bus.$emit("closeModal");
              bus.$emit("openSideNav");
              setTimeout(function () {
                bus.$emit("onCreatedAvatar", res.data.avatar);
              }, 1500);
            } else {
              this.error = true;
            }
            this.loading = false;
          });
      }
    },

    update() {
      if (!this.loading) {
        this.loading = true;
        axios
          .put("/api/avatars", this.form, {
            headers: {
              "Content-type": "application/json",
            },
          })
          .then((res) => {
            console.log(res);
            if (res.data) {
              bus.$emit("onUpdatedAvatar", res.data.avatar);
            } else {
              this.error = true;
            }
            this.loading = false;
          });
      }
    },
  },
};
</script>

<style scoped>
</style>
