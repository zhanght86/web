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
  import {navChild, visualServer} from '../../config'
  import axios from 'axios'
  export default {
    head: {
      title: '视觉设计'
    },
    data () {
      return {
        sort: this.$route.params.category,
        tag: ''
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
    },
    created () {
      this.tag = this.$route.params.category
      this.getClassify()
    },
    methods: {
      getClassify () {
        axios(navChild).then((res) => {
          this.$store.commit('visual/setclassify', res.data)
          this.getList(this.tag)
        })
      },
      getList (tag) {
        console.log(this.classify)
        if (tag === 'all') {
          tag = ''
        } else {
          this.classify.map((item, index) => {
            if (item.tag === tag) {
              console.log(item)
              tag = item.text
            }
          })
        }
        axios(visualServer + '?category=' + tag).then((res) => {
          this.$store.commit('visual/setList', res.data.data)
          console.log(res.data.data)
        })
      }
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
