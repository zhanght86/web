<template>
  <div class="mid-layout sub-nav">
    <nuxt-link v-for="(item, index) in data" :to="item.url" :key="index"><span :style="'color:' + item.color">{{item.tag}}</span>{{item.text}}</nuxt-link>
  </div>
</template>
<script>
  export default {
    props: {
      data: {
        type: Array,
        default: []
      }
    }
  }
</script>
<style>
.sub-nav{border-bottom:1px solid #DDD;}
.sub-nav a{
  text-decoration:none;
  color:#666;
  font-size:14px;
  display:inline-block;
  padding:10px 30px;
}
.sub-nav .nuxt-link-active{
  color:#f58e00;
  border-bottom:1px solid #f58e00;
}
.sub-nav .nuxt-link-active span{
  color:#f58e00 !important;
}
</style>
