<template>
  <div class="uk-width-1-1">
    <spin v-if="loading" />
    <div v-else>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
              <img
                class="uk-border-circle"
                width="40"
                height="40"
                :src="'../../../../public/assets/images/fond.jpg'" alt=""
              />
            </div>
            <div class="uk-width-expand">
              <h3 class="uk-card-title uk-margin-remove-bottom">
                {{ avatar.name }}
              </h3>
              <p class="uk-text-meta uk-margin-remove-top">
                <time datetime="2016-04-01T19:00">April 01, 2016</time>
              </p>
            </div>
          </div>
        </div>
        <div class="uk-card-body">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt.
          </p>
        </div>
        <div class="uk-card-footer">
          <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
              <a class="uk-button uk-button-text" v-on:click="OpenAvatarForm"
                >Modifier</a
              >
            </div>
            <div>
              <a class="uk-button uk-button-text" v-on:click="OpenDeleteForm"
                >Supprimer</a
              >
            </div>
          </div>
        </div>
      </div>

      <div class="uk-grid force-width uk-margin-small-top">
        <Article />
        <Article />
      </div>
    </div>
  </div>
</template>

<script>
import Spin from "../components/utils/Spin";
import axios from "axios";
import { bus } from "../app";
import Article from "../components/Article/ArticlePreview";

export default {
  components: { Spin, Article },

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

  created() {
    bus.$on("onUpdatedAvatar", (data) => {
      this.avatar = data;
    });
  },

  methods: {
    loadAvatar() {
      this.loading = true;
      axios.get(`/api/avatars/${this.$route.params.id}`).then((res) => {
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

    OpenDeleteForm() {
      var data = {
        action: "delete",
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
.force-width {
  max-width: 100%;
}
</style>
