<template>
  <div class="manage">
    <el-tabs v-model="activeName" @tab-click="tabClick">
      <el-tab-pane :label="item.text" :name="item.tag" :search="item.tag" v-for="(item, index) in parent" :key="index">
        <el-row gutter="10">
          <el-col :span="4" v-for="(item, index) in child" :key="index">
            <el-card class="cate">
              <span :class="'circle iconfont ' + item.icon"></span>
              <h2 class="cate-title">{{item.text}}</h2>
            </el-card>
          </el-col>
        </el-row>
      </el-tab-pane>
    </el-tabs>
  </div>
</template>
<script>
import {layout, parentList, childList} from '../../config'
import axios from 'axios'
export default {
  layout: layout,
  data () {
    return {
      activeName: null,
      parent: [],
      child: []
    }
  },
  created () {
    this.getParent()
  },
  methods: {
    tabClick (item) {
      this.getChild(item.name)
    },
    getParent () {
      axios.get(parentList, {
      }).then(res => {
        this.parent = res.data
        this.activeName = res.data[0].tag
        console.log(res.data)
        this.getChild(res.data[0].tag)
      })
    },
    getChild (tag) {
      axios.get(childList + tag, {
      }).then(res => {
        console.log(res.data)
        this.child = res.data
      })
    }
  }
}
</script>
<style>
.manage{
  padding:1rem;
  height:100%;
}
.cate-title{font-size:1.8rem;text-align:center;font-weight:normal;}
.cate .circle{
  width:6rem;
  height:6rem;
  display: block;
  margin:1rem auto;
  border-radius:50%;
  line-height:6rem;
  text-align:center;
  font-size:3rem;
}
/* 系统
手机app
网站
画册 */
</style>
