<template>
  <div id="offcanvas" uk-offcanvas="flip: true; overlay: false; mode: slide;">
    <div class="uk-offcanvas-bar">
      <button class="uk-offcanvas-close" type="button" uk-close></button>


      <ul class="uk-nav uk-nav-default">
        <li class="uk-parent">
          <ul class="uk-nav-sub">
            <li class="uk-open" v-if="avatarSelected">
              <router-link
               
                :to="`/avatar/${avatarSelected}`"
                >avatar {{ avatarSelected }}</router-link
              >
              <ul>
                <li>menu 1</li>
                <li>menu 2</li>
                <li>menu 3</li>
              </ul>
            </li>
            <li v-if="avatarSelected">
              <router-link

                :to="`/avatar/${avatarSelected}`"
                >guilde avatar {{ avatarSelected }}</router-link
              >
              <ul>
                <li>menu 1</li>
                <li>menu 2</li>
                <li>menu 3</li>
              </ul>
            </li>
            <li v-if="avatarSelected">
              <router-link
               
                :to="`/avatar/${avatarSelected}`"
                >jeu avatar {{ avatarSelected }}</router-link
              >
              <ul>
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
      <spin v-if="loading"></spin>
      <ul v-else>
        <li
          v-for="avatar in avatars"
          v-bind:key="avatar"
          @click="updateSelected(avatar)"
        >
          <router-link :to="`/avatar/${avatar}`" class="uk-card">
            <AvtarCardList :avatar="avatar" />
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";
import AvtarCardList from "../components/Avatar/AvatarCardList";

export default {
  components: {
    Spin,
    AvtarCardList,
  },
  data: () => ({
    loading: true,
    avatars: [],
    avatarSelected: (Number = 0),
  }),
  mounted() {
    this.loadAvatars();
  },
  methods: {
    loadAvatars() {
      axios.get("/api/avatars").then((res) => {
        this.avatars = res.data;
        this.loading = false;
      });
    },

    updateSelected(event) {
      console.log(event);
      this.avatarSelected = event;
    },
  },
};
</script>

