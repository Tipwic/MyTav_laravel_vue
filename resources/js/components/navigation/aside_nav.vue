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
    bus.$on("openSideNav", (data) => {
      this.openCanva();
    });
    bus.$on("closeSideNav", (data) => {
      this.closeCanva();
    });
    bus.$on("onCreatedAvatar", (data) => {
      this.openCanva();
      self = this;
      setTimeout(function () {
        self.avatars.unshift(data);
        bus.$emit("noUserAvatar", true);
        self.updateSelected(data);
      }, 500);
    });
    bus.$on("onUpdatedAvatar", (data) => {
      let i = this.avatars.findIndex((a) => a.id == data.id);
      if (i > -1) {
        this.openCanva();
        this.avatars[i] = data;
        this.selectCurrent(data);
      }
    });
    bus.$on("onDeletedAvatar", (data) => {
      this.loadAvatars();
    });
    bus.$on("onLoadedAvatar", (data) => {
      let i = this.avatars.findIndex((a) => a.id == data.id);
      if (i > -1) {
        this.selectCurrent(data);
      }
    });
  },
  mounted() {
    this.loadAvatars(true);
  },
  methods: {
    loadAvatars(isFirstLoad = false) {
      axios.get("/api/userAvatar/" + CurrentUserId).then((res) => {
        this.avatars = [...res.data.avatars];
        if (this.avatars.length == 0) {
          this.$router.push("/home").catch((err) => {});
          bus.$emit("noUserAvatar", true);
        } else {
          this.updateSelected(this.avatars[0], isFirstLoad);
        }
        this.loading = false;
      });
    },

    updateSelected(event, isFirstLoad = false) {
      if (
        !this.avatarSelected.id ||
        (this.avatarSelected.id &&
          this.avatarSelected.id != event.id &&
          !this.loading)
      ) {
        this.loading = true;
        if (!isFirstLoad) {
          this.$router.push("/avatar/" + event.id).catch((err) => {});
        }
      }
    },

    selectCurrent(event) {
      this.avatarSelected = {};
      self = this;
      setTimeout(function () {
        self.avatarSelected =
          self.avatars[self.avatars.findIndex((e) => e.id == event.id)];
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

    openCanva() {
      UIkit.offcanvas($("#offcanvas")).show();
    },

    closeCanva() {
      UIkit.offcanvas($("#offcanvas")).hide();
    },
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