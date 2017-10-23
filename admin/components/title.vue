<template>
  <h2 class="title">{{title}}</h2>
</template>
<script>
  export default {
    props: {
      title: {
        type: String,
        default: '默认标题'
      }
    }
  }
</script>
<style>
.title{
  font-size:1.6rem;
  font-weight:normal;
  margin:0;
  padding:1rem;
  border-bottom:1px solid #f5f5f5;
}
</style>
