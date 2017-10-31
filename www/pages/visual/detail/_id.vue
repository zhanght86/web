<template>
  <div class="detail">
    <div class="grid">
      <div class="item g-16">
        <div class="preview">
          <img :src="file + detail.content" alt="">
        </div>
      </div>
      <div class="item g-8">
        <h1 class="title">详细信息</h1>
      </div>
    </div>
  </div>
</template>
<script>
import {visualDetail, file} from '../../../config'
import axios from 'axios'
export default {
  head: {
    title: '详情页'
  },
  data () {
    return {
      id: null,
      detail: {},
      file: file
    }
  },
  created () {
    this.id = this.$route.params.id
    this.getDetail()
  },
  methods: {
    getDetail () {
      axios(visualDetail + this.id).then((res) => {
        console.log(res.data)
        this.detail = res.data
      })
    }
  }
}
</script>
<style>
.detail .title{
  font-size:1.4rem;
  color:#666;
  border-bottom:1px solid #eee;padding:1rem;
  position: relative;
}
.detail .title:before{
  content:"";
  display:inline-block;
  width:4px;
  height: 1.4rem;
  background:#2B93DC;
  position: absolute;
  top:50%;
  margin-top:-0.7rem;
  left:0;
}
.detail .preview{
  border:1px solid #eee;padding:1rem;border-radius:1rem;
}
.detail .preview img{
  width:100%;
}
.detail .item:first-child{
  padding-right:20px;
}
.detail{
  margin-bottom:2rem;
}
</style>
