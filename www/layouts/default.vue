<template>
  <section class="container">
    <app-header/>
    <app-nav/>
    <app-toolbar/>
    <nuxt class="mid-layout main-content"/>
    <app-footer/>
  </section>
</template>
<script>
import header from '~/components/header'
import navigator from '~/components/navigator'
import footer from '~/components/footer'
import toolbar from '~/components/toolbar'
export default {
  components: {
    'app-header': header,
    'app-nav': navigator,
    'app-footer': footer,
    'app-toolbar': toolbar
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
}
.main-content{
  padding-top:20px;
  min-height:80vh;
}
</style>
