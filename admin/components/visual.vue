<template>
  <div class="visual">
    <span class="pic">
      <img :src="file + data.pic" alt="">
      <div :class="'control ' + category(data.category)">
        <el-tooltip content="编辑" placement="top">
          <span class="iconfont icon-bianji"></span>
        </el-tooltip>
        <el-tooltip content="删除" placement="top">
          <span class="iconfont icon-shanchu" @click="popDel(data)"></span>
        </el-tooltip>
      </div>
    </span>
    <span class="info">
      <b class="name"><span :class="'category ' + category(data.category)">{{data.category}}</span>{{data.name}}</b>
      <span class="row w">
        <i class="col v-m count">
          <span class="iconfont icon-redu1 v-m"></span>
          <span class="v-m">{{data.view}}</span>
          <span class="iconfont icon-iconfontdianzan3 v-m"></span>
          <span class="v-m">{{data.thumb}}</span>
        </i>
        <i class="col v-m t-r">
          <span class="iconfont icon-time v-m"></span>
          <span class="v-m">{{time(data.created_time)}}</span>
        </i>
      </span>
    </span>
  </div>
</template>
<script>
  import {file} from '../config'
  import moment from 'moment'
  moment().utc()
  moment.locale('en', {
    relativeTime: {
      future: 'in %s',
      past: '%s以前',
      s: '1秒',
      ss: '%s秒',
      m: '1分钟',
      mm: '%d分钟',
      h: '1小时',
      hh: '%d小时',
      d: '1天',
      dd: '%d天',
      M: '1个月',
      MM: '%d月',
      y: '1年',
      yy: '%d年'
    }
  })
  export default {
    data () {
      return {
        file: file
      }
    },
    created () {
    },
    props: {
      data: {
        type: Object,
        default: {}
      }
    },
    methods: {
      time (time) {
        return moment(moment.unix(time).format()).fromNow()
      },
      category (string) {
        switch (string) {
          case '系统':
            return 'system'
          case '手机App':
            return 'app'
          case '网站':
            return 'web'
          case '画册':
            return 'book'
          case '动画':
            return 'swf'
        }
      },
      popDel (item) {
        console.log('删除')
        this.$store.commit('visual/toggleDelModal')
        this.$store.commit('visual/setCurrent', item)
      }
    }
  }
</script>
<style>
.visual{
  display:inline-block;
  width:100%;
  position: relative;
  border-radius:5px;
  border:1px solid #E8E8E8;
  overflow:hidden;
  transition:0.3s;
}
.visual:hover{
  transform:translate(0,-2px);
  box-shadow:0 2px 5px #ccc;
}
.visual .pic{
  display:inline-block;
  width:100%;
  height: 220px;
  overflow: hidden;
}
.pic img{
  width:100%;
  transition:0.3s;
  position: relative;
  z-index:99;
}
.pic:hover img{
  /* transform:scale(1.1) */
}
.visual .info{
  background:#fff;
  display:inline-block;
  width:100%;
  position: absolute;
  bottom:0;
  left:0;
  padding:10px;box-sizing:border-box;
  font-size:14px;
  color:#999;
  z-index:102;
}
.info .name{
  font-size:16px;
  color:#333;
  display: block;
  height:30px;
}
.info .count span{
  display:inline-block;
  margin-right:0.5rem;
}
.info .iconfont{
  color:#999;
}
.visual .category{
  display:inline-block;
  font-size:1.2rem;
  padding:1px 0.5rem;
  border-radius:0.2rem;
  color:#fff;
  margin-right:0.5rem;
}
.system{
  background:#2D8ADD;
}
.control.system{
  background:rgba(45,138,221,0.8)
}
.app{
  background:#D94447;
}
.app.control{
  background:rgba(217,68,71,0.8)
}
.web{
  background:#F58E00;
}
.web.control{
  background:rgba(245,142,0,0.8)
}
.book{
  background:#76BE54;
}
.book.control{
  background:rgba(118,190,84,0.8)
}
.swf{
  background:#7D61E7;
}
.swf.control{
  background:rgba(125,97,231,0.8)
}
.visual .control{
  position: absolute;
  left:0;
  top:0;
  z-index:100;
  width:100%;
  height:100%;
  text-align:center;
  padding:25% 0;
  opacity:0;
  transition:0.3s;
}
.visual .control .iconfont{
  font-size:2rem;
  color:#fff;
  margin:0 1rem;
  cursor: pointer;
}
.visual:hover .control{
  opacity:1;
}
</style>
