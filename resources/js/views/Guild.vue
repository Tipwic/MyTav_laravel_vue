<template>
  <div class="uk-position-cover  uk-flex uk-flex-center uk-flex-middle">Guild {{ guild }}</div>
</template>

<script>
import axios from "axios";

export default {
  components: {},

  props: {
 
  },

  data: () => ({
   
    id : this.$route.params.message_id,
    guild : Number,
    loading: false,
    error: false,
  }),

  mounted() {
    this.loadGuild();
  },

  methods: {
    store() {
      this.loading = true;
      axios
        .post("/api/posts", this.form, {
          headers: {
            "Content-type": "application/json",
          },
        })
        .then((res) => {
          if (res.data.status) {
            this.$router.push("/post/" + res.data.post.id);
          } else {
            setTimeout(() => {
              this.loading = false;
            }, 300);
            this.error = true;
          }
        });
    },

    loadGuild(){
         axios.get("/api/guilds/"+this.id).then((res) => {
        console.log(res);
        this.guild = res.data;
        this.loading = false;
      });
    }
  },
};
</script>

<style scoped>
</style>
