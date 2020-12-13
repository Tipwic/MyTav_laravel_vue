<template>
  <div v-if="error" class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p v-for="err in errorsList" v-bind:key="err">
      {{ err }}
    </p>
  </div>
</template>

<script>
export default {
  name: "ErrorForm",

  props: ["error", "data"],

  data: () => ({
    errorsList: [],
  }),

  mounted() {
    this.formatError();
  },

  methods: {
    formatError() {
      this.errorsList = [""];
      for (const property in this.data) {
        this.errorsList.push(`${property}:`);
        for (const err of this.data[property]) {
          this.errorsList.push(` - ${err}`);
        }
      }

      if (this.errorsList.length == 0) {
        this.errorsList.push(`Unknown Error`);
      }
    },
  },
};
</script>

<style scoped>
.spin {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
</style>
