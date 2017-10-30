<template>
  <div class="null">
    <slot name="text">很抱歉没有哦！</slot>
  </div>
</template>
<style>
.null{
  position: absolute;
  top:50%;
  left:50%;
}
.null h2{
  font-size:1.6rem;
  font-weight:normal;
  color:#999;
}
</style>
