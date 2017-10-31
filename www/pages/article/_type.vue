<template>
  <section class="content">
    <app-subnav :data="classify"/>
    <div class="content-wrap">
      {{sort}}
    </div>
  </section>
</template>
<script>
  import subnav from '../../components/subnav'
  export default {
    data () {
      return {
        sort: this.$route.params.type
      }
    },
    computed: {
      classify () {
        return this.$store.state.blog.classify
      }
    },
    components: {
      'app-subnav': subnav
    }
  }
</script>
<style>
</style>
