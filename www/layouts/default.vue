<template>
  <section class="container">
    <app-header/>
    <app-nav/>
    <nuxt class="mid-layout main-content"/>
    <app-footer/>
  </section>
</template>
<script>
import header from '~/components/header'
import navigator from '~/components/navigator'
import footer from '~/components/footer'
export default {
  components: {
    'app-header': header,
    'app-nav': navigator,
    'app-footer': footer
  }
}
</script>
<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
}
.container{
  height: 100vh;
  background:#F0F0F0;
}
.main-content{
  padding-top:20px;
  min-height:80vh;
}
</style>
