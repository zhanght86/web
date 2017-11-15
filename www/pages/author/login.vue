<template>
  <div class="login">
    <el-form :model="form" ref="form" label-width="100px">
      <el-form-item label="用户名">
        <el-input type="text" v-model="form.username" auto-complete="off" placeholder="请输入他用户名或者邮箱！"></el-input>
      </el-form-item>
      <el-form-item label="密码">
        <el-input type="password" v-model="form.password" auto-complete="off" placeholder="请填写密码！"></el-input>
      </el-form-item>
      <!-- <el-form-item label="验证码">
        <el-row>
          <el-col :span="15">
            <el-input type="text" v-model="form.captcha" auto-complete="off" placeholder="请输入6位验证码！" @blur="check" name="captcha"></el-input>
          </el-col>
          <el-col :span="7">
            <el-tooltip content="点击刷新" placement="right">
              <img class="code" :src="code" alt="" @click="refresh">
            </el-tooltip>
          </el-col>
        </el-row>
      </el-form-item> -->
      <el-form-item>
        <el-button type="primary" class="w" @click="login">登录</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
  import {captcha, login, checkCaptcha} from '../../config'
  import axios from 'axios'
  export default {
    layout: 'concise',
    data () {
      return {
        localstorage: null,
        code: captcha,
        form: {
          username: '',
          password: '',
          captcha: ''
        }
      }
    },
    mounted () {
      this.localstorage = window.localStorage
    },
    created () {
      console.log(this.localstorage)
    },
    methods: {
      login () {
        if (!this.form.username || !this.form.password) {
          this.$message({
            message: '请填写用户名和密码！',
            type: 'warning'
          })
        } else {
          axios(login, {
            params: this.form
          }).then((res) => {
            console.log(res.data)
            const type = res.data.status === 1 ? 'success' : 'warning'
            this.$message({
              message: res.data.msg,
              type: type
            })
          })
        }
      },
      refresh () {
        this.code += '?' + Math.random()
      },
      check () {
        axios(checkCaptcha, {
          params: {
            captcha: this.form.captcha
          }
        }).then((res) => {
          console.log(res)
        })
      }
    }
  }
</script>
<style>
.login{
  width:600px;
  margin:100px auto 0 auto;
}
.login .code{
  cursor: pointer;
  margin-left:10px;
  vertical-align: middle;
}
</style>

