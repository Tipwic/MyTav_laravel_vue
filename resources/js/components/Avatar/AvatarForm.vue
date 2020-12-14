<template>
  <div>
    <spin v-if="loading" />
    <ErrorForm v-if="error" :error="error" :data="dataError" />

    <div v-if="action != 'delete'">
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

    <!-- delete message -->
    <div v-else>
      <button
        type="submit"
        class="uk-button uk-button-primary uk-button-large uk-width-1-1"
        v-on:click="deleteAvatar"
      >
        supprimer ??
      </button>
    </div>
  </div>
</template>

<script>
import Spin from "../utils/Spin";
import ErrorForm from "../utils/ErrorForm";
import axios from "axios";
import { bus } from "../../app";

export default {
  components: { Spin, ErrorForm },
  props: {
    form: Object,
    action: String,
  },
  data: () => ({
    loading: false,
    error: false,
    dataError: {},
  }),

  created() {},
  mounted() {},
  methods: {
    store() {
      if (!this.loading) {
        this.loading = true;
        this.error = false;
        axios
          .post("/api/avatars", this.form, {
            headers: {
              "Content-type": "application/json",
            },
          })
          .then((res) => {
            if (res.data.avatar) {
              bus.$emit("closeModal");
              bus.$emit("onCreatedAvatar", res.data.avatar);
              this.showNotification(res.data.message)
            } else {
              this.error = true;
              this.dataError = res.data.error ? res.data.error : {};
            }
            this.loading = false;
          });
      }
    },

    update() {
      if (!this.loading) {
        this.loading = true;
        axios
          .put(`/api/avatars/${this.form.id}`, this.form, {
            headers: {
              "Content-type": "application/json",
            },
          })
          .then((res) => {
            if (res.data.avatar) {
              bus.$emit("closeModal");
              bus.$emit("onUpdatedAvatar", res.data.avatar);
               this.showNotification(res.data.message)
            } else {
              this.error = true;
              this.dataError = res.data.error ? res.data.error : {};
            }
            this.loading = false;
          });
      }
    },

    deleteAvatar() {
      if (!this.loading) {
        this.loading = true;
        axios
          .delete(`/api/avatars/${this.form.id}`, {
            headers: {
              "Content-type": "application/json",
            },
          })
          .then((res) => {
            if (res.data) {
              bus.$emit("closeModal");
              bus.$emit("onDeletedAvatar", this.form.id);
              this.showNotification(res.data.message);
            } else {
              this.error = true;
              this.dataError = res.data.error ? res.data.error : {};
            }
            this.loading = false;
          });
      }
    },

    showNotification(mess) {
      UIkit.notification(
        `<span uk-icon='icon: check'></span>${mess}`,
        "success"
      );
    },
  },
};
</script>

<style scoped>
</style>
