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
          {{data.time}}
        </i>
      </span>
    </span>
  </nuxt-link>
</template>
<script>
  export default {
    props: {
      data: {
        type: Object,
        default: {}
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
