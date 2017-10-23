<template>
  <el-badge is-dot>
    <el-popover ref="face" :placement="position" width="300" trigger="click">
      <el-row>
        <el-col :span="10">
          <img :src="info.face" alt="" style="width:100px;height:100px;border-radius:50%;">
        </el-col>
        <el-col :span="12">
          <h2 class="name">{{info.name}}
            <span class="status">{{info.status}}</span>
          </h2>
          <p class="t-r">
            <nuxt-link to="/user/login">退出登录</nuxt-link>
          </p>
        </el-col>
      </el-row>
    </el-popover>
    <div class="face">
      <img :src="info.face" alt="" v-popover:face>
    </div>
  </el-badge>
</template>
<script>
export default {
  computed: {
    info () {
      return this.$store.state.user.info
    }
  },
  props: {
    position: {
      type: String,
      default: 'bottom'
    }
  }
}
</script>
<style>
.face {
  width: 8rem;
  height: 8rem;
  border-radius: 50%;
  overflow: hidden;
  margin: 0 auto;
  cursor: pointer;
}

.face img {
  width: 100%;
  height: 100%;
  transition: 0.3s;
}

.face:hover img {
  transform: scale(1.1)
}

.true .face {
  width: 4rem;
  height: 4rem;
}

.name {
  font-size: 2rem;
  font-weight: normal;
}

.name .status {
  font-size: 1.2rem;
  display: inline-block;
  color: #fff;
  background: #FA5555;
  padding: 1px 5px;
  border-radius: 4px;
  vertical-align: middle;
}
.el-popover a{
  text-decoration:none;
  font-size:1.4rem;
  color:#FA5555;
}
</style>
