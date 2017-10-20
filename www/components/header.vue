<template>
  <div class="header" :style="theme">
    <ul class="mid-layout row h">
      <li class="col v-m g-10"><app-logo/></li>
      <li class="col v-m g-14"></li>
    </ul>
  </div>
</template>
<script>
  import {theme} from '../config'
  import logo from '~/components/logo'
  export default {
    data () {
      return {
        theme: theme
      }
    },
    components: {
      'app-logo': logo
    }
  }
</script>
<style>
.header{
  height:100px;
}
</style>
