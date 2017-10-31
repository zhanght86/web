<template>
  <section class="container">
    <el-row class="w summary">
      <el-col :span="6" v-for="(item, index) in card" :key="index" class="h">
        <card :data="item" :index="index"/>
      </el-col>
    </el-row>
  </section>
</template>

<script>
import {layout} from '../config'
import card from '~/components/card'
export default {
  head () {
    return {
      title: '首页'
    }
  },
  layout: layout,
  computed: {
    card () {
      return this.$store.state.home.card
    }
  },
  components: {
    card
  },
  methods: {
  }
}
</script>

<style>
.title {
  font-family: "Quicksand", "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; /* 1 */
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
.summary{
  padding:10px 5px;
  height:120px;
}
.summary .el-col{
  padding:0 10px;
}
</style>
