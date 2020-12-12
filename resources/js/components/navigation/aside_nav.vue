<template>
  <div id="offcanvas" uk-offcanvas="flip: true; overlay: false; mode: slide;">
    <div class="uk-offcanvas-bar" id="nav-canva">
      <button class="uk-offcanvas-close" type="button" uk-close></button>

      <ul class="uk-nav uk-nav-default">
        <li class="uk-parent aside_nav_container">
          <ul class="uk-nav-sub">
            <li
              v-if="avatarSelected.id"
              uk-scrollspy="cls: uk-animation-slide-left; repeat: true"
            >
              <router-link :to="`/avatar/${avatarSelected}`">{{
                avatarSelected.name
              }}</router-link>
              <ul class="padded">
                <li>menu 1</li>
                <li>menu 2</li>
                <li>menu 3</li>
              </ul>
            </li>
            <li
              v-if="avatarSelected.id"
              uk-scrollspy="cls: uk-animation-slide-left; repeat: true"
            >
              <router-link :to="`/avatar/${avatarSelected}`"
                >guilde avatar</router-link
              >
              <ul class="padded">
                <li>menu 1</li>
                <li>menu 2</li>
                <li>menu 3</li>
              </ul>
            </li>
            <li
              v-if="avatarSelected.id"
              uk-scrollspy="cls: uk-animation-slide-left; repeat: true"
            >
              <router-link :to="`/avatar/${avatarSelected}`"
                >jeu avatar</router-link
              >
              <ul class="padded">
                <li>menu 1</li>
                <li>menu 2</li>
                <li>menu 3</li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="uk-nav-header">Mes Avatars</li>
        <li class="uk-nav-divider"></li>
      </ul>
      <ul>
        <li
          v-for="avatar in avatars"
          v-bind:key="avatar.id"
          v-on:click="updateSelected(avatar)"
          uk-scrollspy="cls: uk-animation-slide-left; repeat: true"
        >
          <AvtarCardList :avatar="avatar" />
        </li>
      </ul>
      <button
        class="uk-button uk-button-primary uk-width-1-1 uk-button-small"
        v-on:click="OpenAvatarForm"
      >
        + Avatar
      </button>
    </div>
  </div>
</template>

<script>
import Spin from "../utils/Spin";
import axios from "axios";
import { bus } from "../../app";
import AvtarCardList from "../Avatar/AvatarCardList";

export default {
  components: {
    Spin,
    AvtarCardList,
  },
  data: () => ({
    loading: true,
    avatars: [],
    avatarSelected: {},
  }),
  created() {
    bus.$on("openSideNav", (data) => {this.openCanva()});
    bus.$on("closeSideNav", (data) => {this.closeCanva()});
    bus.$on("onCreatedAvatar", (data) => {
      console.log('create')
      console.log(data)
      this.avatars.unshift(data);
      this.updateSelected(data);
    });
    bus.$on("onUpdatedAvatar", (data) => {
      this.updateSelected(data);
    });
    bus.$on("onDeletedAvatar", (data) => {});
    bus.$on("onLoadedAvatar", (data) => {
      this.selectCurrent(data);
    });
  },
  mounted() {
    this.loadAvatars();
  },
  methods: {
    loadAvatars() {
      axios.get("/api/avatars").then((res) => {
        console.log(res);
        this.avatars = res.data.avatars;
        this.loading = false;
      });
    },

    updateSelected(event) {
      if (
        !this.avatarSelected.id ||
        (this.avatarSelected.id &&
          this.avatarSelected.id != event.id &&
          !this.loading)
      ) {
        this.loading = true;
        this.$router.push("/avatar/" + event.id);
      }
    },

    selectCurrent(event) {
      console.log("event = ", event);
      this.avatarSelected = {};
      self = this;
      setTimeout(function () {
        self.avatarSelected = event;
        self.loading = false;
      });
    },

    OpenAvatarForm() {
      var data = {
        action: "create",
        category: "avatar",
        form: { name: "" },
      };
      bus.$emit("OpenAvatarForm", data);
    },

    openCanva(){
      console.log('open')
      UIkit.offcanvas($('#offcanvas')).show();
    },

    closeCanva(){
      UIkit.offcanvas($('#offcanvas')).hide();
    }

  },
};
</script>

<style scoped>
.padded {
  padding-left: 10px;
}

.aside_nav_container {
  min-height: 300px;
  margin-top: 30px;
}
</style>