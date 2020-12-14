<template>
  <div>
    <div class="uk-width-1-1@m">
      <div
        class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin featured uk-background-cover"
        uk-grid
      >
        <div class="uk-card-media-left uk-cover-container">
          <img
            :src="'../../../../public/assets/images/fond.jpg'"
            alt=""
            hidden
            uk-cover
          />
          <canvas width="600" height="400"></canvas>
        </div>
        <div>
          <div class="uk-card-body featured-text">
            <h4>Media Left</h4>
            <p class="uk-text-small">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt consectetur adipiscing elit, sed do
              eiusmod tempor incididunt consectetur adipiscing elit, sed do
              eiusmod tempor incididunt.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div v-if="noUserAvatar">
      <a class="uk-button uk-button-text" v-on:click="OpenAvatarForm"
        >Créez votre premier avatar</a
      >
    </div>
  </div>
</template>

<script>
import { bus } from "../app";

export default {
  name: "Index",

  data: () => ({
    noUserAvatar: Boolean,
  }),

  created() {
    this.noUserAvatar = false;
    bus.$on("noUserAvatar", (data) => {
      this.noUserAvatar = data;
    });
  },

  methods: {
    OpenAvatarForm() {
      var data = {
        action: "create",
        category: "avatar",
        form: { name: "" },
      };
      bus.$emit("OpenAvatarForm", data);
    },
  },
};
</script>

<style scoped>
</style>
