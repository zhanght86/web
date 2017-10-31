<template>
  <div class="nav-panel" :style="theme">
    <ul class="row w mid-layout">
      <li class="col v-m g-18 nav">
        <nuxt-link :to="item.url" v-for="(item, index) in nav" :key="index">{{item.text}}</nuxt-link>
      </li>
      <li class="col v-m g-6 t-r info">
        <a class="iconfont icon-erweima"></a>
        <nuxt-link to="/author/login">登录</nuxt-link>
      </li>
    </ul>
  </div>
</template>
<script>
  import {theme, navParent} from '../config'
  import axios from 'axios'
  export default {
    data () {
      return {
        theme: theme,
        nav: []
      }
    },
    created () {
      this.getNavParent()
    },
    methods: {
      getNavParent () {
        axios(navParent).then((res) => {
          this.nav = res.data
        })
      }
    }
  }
</script>
<style>
.nav-panel{
  width:100%;
  padding-bottom:1.3em;
}
.nav a{
  font-size:16px;
  color:#64627A;
  text-decoration:none;
  display:inline-block;
  margin-right:2em;
  transition:0.3s;
}
.nav .nuxt-link-active{
  color:#f58e00 !important;
}
.nav a:hover{
  color:#fff;
}
.info{
  font-size:1.4rem;
  color:rgba(255,255,255,0.3)
}
.info a{
  text-decoration:none;
  color:rgba(255,255,255,0.3);
  font-size:16px;
  display:inline-block;
  vertical-align: middle;margin-left:1em;
}
.info .iconfont{
  font-size:18px;
}
</style>

