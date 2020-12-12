<template>
<div >
          <a class="ellipsis">{{ avatar.name }}</a>
</div>


</template>

<script>
export default {
  props: {
    avatar:{},
  },
  mounted() {
console.log(this.avatar)
  },
};
</script>

<style scoped>
.ellipsis{
  text-overflow: ellipsis;
}
</style>
