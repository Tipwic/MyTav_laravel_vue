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
  },
};
</script>

<style scoped>
.ellipsis{
  text-overflow: ellipsis;
}
</style>
