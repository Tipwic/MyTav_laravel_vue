<template>
  <div>
 
    <div
      class="uk-grid-match uk-child-width-expand@s uk-text-center"
      uk-grid
      uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 100; repeat: true"
    >
      <div>
        <GuildCardList
          v-for="guild in guilds"
          v-bind:key="guild.id"
          :guild="guild"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Spin from "../components/utils/Spin";
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
