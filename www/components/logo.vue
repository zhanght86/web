<template>
  <h1 class="logo" @click="gohome">永兴源UED团队</h1>
</template>
<script>
  export default {
    methods: {
      gohome () {
        this.$router.replace('/')
      }
    }
  }
</script>
<style>
.logo{
  font-size:0;
  display:inline-block;
  height: 50px;
  width: 400px;
  background:url(../assets/images/logo.png) no-repeat left center;
  background-size:contain;
  vertical-align: middle;
  cursor: pointer;
}
</style>
