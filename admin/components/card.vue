<template>
  <a href="" class="card" :style="'background-color:' + color[index]">
    <span class="icon">
      <b :class="'iconfont ' + data.icon"></b>
    </span>
    <span class="text">
      <b>{{data.count}}</b>
      <i>{{data.text}}</i>
    </span>
  </a>
</template>
<script>
export default {
  props: {
    data: {
      type: Object,
      default: []
    },
    index: {
      type: Number,
      default: 0
    }
  },
  data () {
    return {
      color: ['#3D81F3', '#44BDEF', '#F57069', '#E5C21E']
    }
  }
}
</script>
<style>
.card {
  display: table;
  width: 100%;
  height: 100%;
  border-radius: 5px;
  position: relative;
  overflow:hidden;
}

.card span {
  display: table-cell;
  vertical-align: middle;
}

.card b,
.card i {
  display: inline-block;
  width: 100%;
  font-weight:normal;
  font-style:normal;
  font-size:1.6rem;
}
.card b{
  font-size:3.6rem;
  font-family: 'Capsuula';
}
.card .icon{
  width:40%;
  text-align:center;
}
.card .text{
  width:60%;
  text-align:left;
  color:#fff;
}
.card .iconfont{
  font-weight:normal;
  color:rgba(255,255,255,0.9);
  font-size:5rem;
}
.card:before,.card:after{
  content:"";
  display:inline-block;
  position: absolute;
  left: 0;
  height:100%;
  width:100%;
  transition:0.3s;
  background:rgba(0,0,0,0.05);
  top:-100%;
}
.card:after{
  top:auto;
  bottom:-100%;
}
.card:hover:before{
  top:0
}
.card:hover:after{
  bottom:0;
}
</style>

