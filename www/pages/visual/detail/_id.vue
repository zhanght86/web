<template>
  <div class="detail">
    <div class="grid" v-if="detail">
      <div class="item g-18">
        <div class="preview">
          <img :src="file + detail.content" alt="">
        </div>
      </div>
      <div class="item g-6">
        <h1 class="title">详细信息</h1>
        <p class="item"><span class="name">名称：</span>{{detail.name}}</p>
        <p class="item"><span class="name">作者：</span>{{detail.author || '不详'}}</p>
        <p class="item"><span class="name">分类：</span>{{detail.category}}</p>
        <p class="item"><span class="name">喜欢：</span>{{detail.thumb}}</p>
        <p class="item"><span class="name">浏览：</span>{{detail.view}}</p>
        <p class="item"><span class="name">标签：</span>{{detail.tag}}</p>
        <p class="item"><span class="name">创建日期：</span>{{detail.created_time}}</p>
        <p class="item"><span class="name">修改日期：</span>{{detail.updated_time}}</p>
        <a :href="download + detail.package" class="btn btn-default full" style="margin-top:20px;">下载</a>
      </div>
    </div>
  </div>
</template>
<script>
import {visualDetail, file, download} from '../../../config'
import axios from 'axios'
export default {
  head: {
    title: '详情页'
  },
  data () {
    return {
      id: null,
      detail: null,
      file: file,
      download: download
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
    },
    downfile (file) {
      axios(download + file).then((res) => {
        console.log(res.data)
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
.detail .item{
  font-size:14px;
  color:#666;
  padding:10px;
}
</style>
