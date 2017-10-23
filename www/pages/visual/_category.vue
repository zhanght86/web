<template>
  <section class="content">
    <app-subnav :data="classify"/>
    <div class="content-wrap">
      <ul class="list grid">
        <li class="item g-6" v-for="(item, index) in list" :key="index">
          <app-visual :data="item"/>
        </li>
      </ul>
    </div>
  </section>
</template>
<script>
  import subnav from '~/components/subnav'
  import visual from '~/components/visual'
  export default {
    head: {
      title: '视觉设计'
    },
    data () {
      return {
        sort: this.$route.params.category
      }
    },
    computed: {
      classify () {
        return this.$store.state.visual.classify
      },
      list () {
        return this.$store.state.visual.list
      }
    },
    components: {
      'app-subnav': subnav,
      'app-visual': visual
    }
  }
</script>
<style>
.list{
  margin:10px -10px;
}
.list li{
  padding:10px;
  box-sizing:border-box;
}
</style>
