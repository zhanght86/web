<template>
  <div class="toolbar">
    <span class="item">
      <i class="iconfont icon-erweima1"></i>
      <b>手机查看</b>
    </span>
    <span class="item">
      <i class="iconfont icon-feedback"></i>
      <b>反馈</b>
    </span>
    <span class="item">
      <i class="iconfont icon-dingbu"></i>
      <b>返回顶部</b>
    </span>
  </div>
</template>
<style>
.toolbar{
  position: fixed;
  right: 20px;
  bottom:120px;
  font-size:18px;
  width:80px;
}
.toolbar span{
  display:inline-block;
  width:100%;
  text-align:center;
  background-attachment: #f5f5f5;border:1px solid #eee;margin-bottom:5px;
  font-size:14px;
  padding:10px;
  cursor: pointer;
  color:#999;
  border-radius:5px;
  transition:0.3s;
}
.toolbar .iconfont{
  font-size:30px;
  display:inline-block;
  width:100%;
}
.toolbar span:hover{
  background:#2B93DC;
  color:#fff;
}
</style>
