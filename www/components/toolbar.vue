<template>
  <div class="toolbar" v-if="toTop">
    <span class="item">
      <i class="wrap">
        <i class="iconfont icon-erweima1"></i>
        <b>手机查看</b>
      </i>
      <span class="sub">
        <qrcode :value="url" :options="{ size: 120 }"></qrcode>
      </span>
    </span>
    <span class="item">
      <i class="wrap">
        <i class="iconfont icon-feedback"></i>
        <b>反馈</b>
      </i>
    </span>
    <span class="item" @click="scrollTop">
      <i class="wrap">
        <i class="iconfont icon-dingbu"></i>
        <b>返回顶部</b>
      </i>
    </span>
  </div>
</template>
<script>
  import VueQrcode from '@xkeshi/vue-qrcode'
  export default {
    data () {
      return {
        toTop: false,
        timer: null,
        stop: false,
        url: null
      }
    },
    created () {
    },
    mounted () {
      this.$nextTick(() => {
        window.addEventListener('scroll', this.needToTop)
      })
      this.url = window.location.href
    },
    components: {
      'qrcode': VueQrcode
    },
    methods: {
      scrollTop () {
        document.body.scrollTop = 0
        document.documentElement.scrollTop = 0
      },
      needToTop () {
        let curHeight = document.documentElement.scrollTop || document.body.scrollTop
        let viewHeight = document.documentElement.clientHeight
        if (curHeight > viewHeight) {
          this.toTop = true
        } else {
          this.toTop = false
        }
        if (this.stop) {
          clearInterval(this.timer)
        }
        this.stop = true
      }
    }
  }
</script>
<style>
.toolbar{
  position: fixed;
  right: 0;
  padding-right:20px;
  background:#fff;
  bottom:120px;
  font-size:18px;
  width:100px;
}
.toolbar span{
  display:inline-block;
  width:100%;
  text-align:center;
  background-attachment: #f5f5f5;border:1px solid #eee;margin-bottom:5px;
  font-size:14px;
  cursor: pointer;
  color:#999;
  border-radius:5px;
  transition:0.3s;
  position: relative;
}
.toolbar .iconfont{
  font-size:30px;
  display:inline-block;
  width:100%;
}
.toolbar .wrap{
  background:#fff;
  display:inline-block;
  padding:12px 10px;
  border-radius:5px;
  width:100%;
  height:80px;
}
.toolbar span:hover{
  color:#2B93DC;
  background:#eee;
}
.toolbar .sub{
  position:absolute;
  left:0;
  z-index:-1;
  background:#eee;
  bottom:0;
  width:79px;
  height:79px;
  box-sizing:border-box;
  margin:0;
}
.toolbar .sub canvas{
  width:100%;
  height:100%;
}
.toolbar span:hover .sub{
  left: -130px;
  bottom:0;
  width:120px;
  height:120px;
}
</style>
