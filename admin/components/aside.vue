<template>
  <div class="aside-menu">
    <el-menu :default-active="children" class="el-menu-vertical" background-color="#585F6F" text-color="#fff" active-text-color="#FA5555" :mode="'vertical'" @select="jump">
      <el-menu-item :index="item.url" v-for="(item, index) in aside" :key="index">
        <i class="el-icon-menu"></i>
        <span slot="title">{{item.text}}</span>
      </el-menu-item>
    </el-menu>
  </div>
</template>
<script>
export default {
  computed: {
    aside () {
      return this.$store.state.aside
    },
    children () {
      return this.$store.state.currentChildren
    }
  },
  created () {
    const rou = this.$route.path
    this.$store.commit('setChildren', rou)
  },
  methods: {
    jump (url) {
      this.$router.replace(url)
    }
  }
}
</script>
<style>
.aside-menu a {
  display: block;
  text-decoration: none;
  color: #A0AFBF;
  font-size: 1.4rem;
  padding: 1rem;
  padding-left:2rem;
  border-top: 1px solid #6A717E;
}
.aside-menu a:first-child{
  border-top:none;
}
.aside-menu .nuxt-link-active{
  background:#FA5555;
  color:#fff;
}
</style>
