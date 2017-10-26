<template>
  <nuxt-link :to="'/visual/detail/' + data.id" class="visual">
    <span class="pic">
      <img :src="data.pic" alt="">
    </span>
    <span class="info">
      <b class="name">{{data.name}}</b>
      <span class="row w">
        <i class="col v-m">
          <span class="iconfont icon-zuihuo"></span>
          {{data.view}}
          <span class="iconfont icon-thumb"></span>
          {{data.thumb}}
        </i>
        <i class="col v-m t-r">
          {{time(data.time)}}
        </i>
      </span>
    </span>
  </nuxt-link>
</template>
<script>
  import moment from 'moment'
  moment.locale('en', {
    relativeTime: {
      future: 'in %s',
      past: '%s以前',
      s: '秒',
      m: '1分钟',
      mm: '%d分钟',
      h: '1小时',
      hh: '%d小时',
      d: '1天',
      dd: '%d天',
      M: '1个月',
      MM: '%d个月',
      y: '1年',
      yy: '%d年'
    }
  })
  export default {
    props: {
      data: {
        type: Object,
        default: {}
      }
    },
    methods: {
      time (time) {
        return moment(time).startOf('hour').fromNow()
      }
    }
  }
</script>
<style>
.visual{
  display:inline-block;
  width:100%;
  position: relative;
}
.visual .pic{
  display:inline-block;
  width:100%;
  height: 250px;
  overflow: hidden;
}
.pic img{
  width:100%;
  transition:0.3s;
}
.pic:hover img{
  transform:scale(1.1)
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
  height:60px;
}
.info .iconfont{
  color:#999;
}
</style>
