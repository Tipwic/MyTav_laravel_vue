<template>
  <div>
    <spin v-if="loading"></spin>
    <div style="display: flex; flex-wrap: wrap" v-else>
      <GuildCardList
        v-for="guild in guilds"
        v-bind:key="guild.id"
        :guild="guild"
      />
    </div>
  </div>
</template>

<script>
import Spin from "../components/Spin";
import axios from "axios";
import GuildCardList from "../components/Guild/GuildCardList";
export default {
  components: {
    Spin,
    GuildCardList,
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
        console.log(res);
        this.guilds = res.data.guilds;
        this.loading = false;
      });
    },
  },
};
</script>

<style scoped>
.uk-card {
  width: 40%;
  margin-right: 20px;
  margin-bottom: 20px;
}

.uk-card:last-child {
  margin-right: 0;
}
</style>
