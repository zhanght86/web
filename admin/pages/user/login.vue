<template>
  <section class="container login">
    <div class="inner">
      <h1 class="name mid-layout">至尊惠葆后台管理系统</h1>
      <div class="banner">
        <div class="row mid-layout h">
          <div class="col v-m t-r">
            <div class="panel">
              <h1 class="title">LOGIN 登录</h1>
              <div class="form">
                <input type="text" name="" value="" placeholder="请输入用户名" v-model="form.user">
                <span class="iconfont icon-user"></span>
              </div>
              <div class="form">
                <input type="password" name="" value="" placeholder="请输入密码！" v-model="form.pwd">
                <span class="iconfont icon-user"></span>
              </div>
              <el-button type="danger" class="w" :loading="loading" @click="_login">登录</el-button>
            </div>
          </div>
        </div>
      </div>
      <p class="mid-layout t-r info">技术支持：深圳市永兴元科技股份有限公司  电话：18827078587</p>
    </div>
  </section>
</template>

<script>
export default {
  head () {
    return {
      title: '用户登录'
    }
  },
  data () {
    return {
      loading: false,
      form: {
        user: '',
        pwd: ''
      }
    }
  },
  components: {
  },
  methods: {
    _login () {
      if (!this.form.user || !this.form.user) {
        this.$message({
          message: '用户名和密码必填哦！',
          type: 'warning'
        })
      } else {
        this.loading = !this.loading
        setTimeout(() => {
          this.$router.replace('/')
        }, 1000)
      }
    }
  }
}
</script>

<style>
.container{width:100vw;height:100vh;}
.login{display:table;background:#fff;}
.login .inner{display:table-cell;vertical-align:middle;}
.login .banner{background:#495060;height:40vh;}
.panel{display:inline-block;padding:20px 20px 40px 20px;background:rgba(255,255,255,0.95);border-radius:10px;width:320px;text-align:left;}
.login .title{font-weight:normal;font-size:1.8rem;color:#3A90BA;margin-bottom:2rem;}
.name{font-weight:normal;font-size:2.4rem;color:#666;padding-bottom:2rem;}
.login .info{font-size:1.2rem;color:#999;padding:2rem 0;}
</style>
