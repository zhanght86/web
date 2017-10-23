<template>
  <div class="layout-head">
    <div class="head-wrap">
      <el-row class="h">
        <el-col :span="4">
          <my-logo/>
        </el-col>
        <el-col :span="16">
          <my-menu mode="horizontal" :collapse="false" />
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
      <nuxt/>
    </div>
  </div>
</template>
<script>
import menu from '../components/menu'
import face from '../components/face'
import headbar from '../components/headbar'
import logo from '../components/Logo'
import { mapMutations } from 'vuex'
export default {
  components: {
    'my-menu': menu,
    'my-face': face,
    'my-headbar': headbar,
    'my-logo': logo
  },
  computed: {
    isCollapse () { return this.$store.state.isCollapse }
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
  padding:0 1rem;
}

.layout-head .content {
  height: 100%;
  overflow: auto;
  padding:0;
  width:100%;
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
</style>
