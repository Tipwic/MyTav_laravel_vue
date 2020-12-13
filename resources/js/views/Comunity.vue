<template>
<div>
  <spin v-if="loading" />
 <ul v-else class="uk-list">
      <!--~~~-->
      <li  v-for="guild in guilds" v-bind:key="guild.id" class="uk-panel uk-transition-toggle uk-animation-slide-left" style="animation-delay: 100ms;">
              <guild-card-list :guild="guild" />
              <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                <p class="uk-h4 uk-margin-remove">Visiter la guilde</p>
            </div>
      </li>

    </ul>
</div>
</template>

<script>
import Spin from "../components/utils/Spin";
import axios from "axios";
import GuildCardList from "../components/Guild/GuildCardList";
export default {
  components: {
    Spin,
    GuildCardList
  },
  data: () => ({
    loading: true,
    guilds: [],
  }),
  mounted() {
    this.loadGuilds();
  },
  methods: {
    loadGuilds() {
      axios.get("/api/guilds").then((res) => {
        this.guilds = res.data.guilds;
        this.loading = false;
      });
    },
  },
};
</script>

<style scoped>
.container {
  width: 70%;
  padding: 3em;
  margin: auto;
  position: relative;
}
</style>
