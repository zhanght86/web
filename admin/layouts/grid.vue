<template>
  <div :class="[{'show': aside}, 'layout-head']">
    <div class="head-wrap">
      <el-row class="h">
        <el-col :span="4">
          <my-logo/>
        </el-col>
        <el-col :span="16">
          <my-menu mode="horizontal" :collapse="false" :hideSub="true" :menu="menu"/>
        </el-col>
        <el-col :span="3">
          <my-headbar/>
        </el-col>
        <el-col :span="1" class="t-r">
          <my-face/>
        </el-col>
      </el-row>
    </div>
    <div class="content">
      <div class="aside">
        <my-aside/>
      </div>
      <nuxt/>
    </div>
  </div>
</template>
<script>
import menus from '../components/menu'
import face from '../components/face'
import headbar from '../components/headbar'
import logo from '../components/Logo'
import aside from '../components/aside'
import { mapMutations } from 'vuex'
export default {
  components: {
    'my-menu': menus,
    'my-face': face,
    'my-headbar': headbar,
    'my-logo': logo,
    'my-aside': aside
  },
  computed: {
    isCollapse () {
      return this.$store.state.isCollapse
    },
    aside () {
      return this.$store.state.aside
    },
    menu () {
      return this.$store.state.menu
    }
  },
  methods: {
    ...mapMutations({
      toggleCollapse: 'toggleCollapse'
    })
  }
}
</script>
<style>
.layout-head {
  padding-top: 61px;
  overflow: hidden;
  width: 100vw;
  height: 100vh;
}

.layout-head .head-wrap {
  background: #495060;
  height: 61px;
  margin: -61px 0 0 0;
  padding: 0 1rem;
}

.layout-head.show .content {
  height: 100%;
  overflow: hidden;
  padding-left: 200px;
}

.head-wrap .el-row {
  display: table;
  width: 100%;
}

.head-wrap .el-col {
  display: table-cell;
  vertical-align: middle;
  float: none;
}

.layout-head .face {
  width: 3rem;
  height: 3rem;
}

.layout-head .aside {
  height: 100%;
  width: 200px;
  background: #585F6F;
  margin-left: -200px;
  float: left;
}
</style>
