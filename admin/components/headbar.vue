<template>
  <div class="h">
    <el-popover
      ref="popover2"
      placement="bottom"
      title="标题"
      width="200"
      trigger="click"
      content="这是一段内容,这是一段内容,这是一段内容,这是一段内容。">
    </el-popover>
    <el-row class="head">
      <el-col :span="12" v-if="text">{{text}}</el-col>
      <el-col :span="text?12:24" class="t-r">
        <i class="el-icon-menu" v-popover:popover2></i>
        <i class="el-icon-message"></i>
        <i class="el-icon-setting"></i>
      </el-col>
    </el-row>
  </div>
</template>
<script>
  // import { mapMutations } from 'vuex'
  export default {
    data () {
      return {
        appBox: true
      }
    },
    computed: {
      // appBox () { return this.$store.state.appBox }
    },
    props: {
      text: {
        type: String,
        default: ''
      }
    },
    methods: {
      // ...mapMutations({
      //   toggleappBox: 'toggleappBox'
      // })
      toggleappBox () {
        this.appBox = !this.appBox
      }
    }
  }
</script>
<style>
.head {
  height: 100%;
  display: table;
  width: 100%;
  font-size: 1.2rem;
  color: #2D2F33;
  padding: 0 1rem;
}

.head .el-col {
  display: table-cell;
  vertical-align: middle;
  float: none;
  text-align: right;
}

.head .el-col:first-child {
  text-align: left;
}

.head i {
  font-size: 1.6rem;
  color: #8492A6;
  cursor: pointer;
  margin-left:1.5rem;
}
</style>

