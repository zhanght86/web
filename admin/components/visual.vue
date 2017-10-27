<template>
  <div class="visual">
    <span class="pic">
      <img :src="data.pic" alt="">
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
.app{
  background:#D94447;
}
.web{
  background:#F58E00;
}
.book{
  background:#76BE54;
}
.swf{
  background:#7D61E7;
}
</style>
