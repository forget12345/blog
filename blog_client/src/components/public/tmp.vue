<template>

</template>

<script>
export default {
  name: "tmp",
  data() {
    return {};
  },
  mounted: function() {
    this.$router.push({
      path: "/",
      query: {
        id: this.$route.query.id
      }
    });
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
</style>
