<template>
  <div class="inner">
    <div class="crumb">
      <el-form :inline="true" :model="query" class="demo-form-inline">
        <el-form-item label="名称：" class="g-16">
          <el-input v-model="query.name" placeholder="请输入搜索关键词！" style="width:800px;"></el-input>
        </el-form-item>
        <el-form-item class="g-8 t-r">
          <el-button type="danger" @click="onReset">重置</el-button>
          <el-button type="primary" @click="onQuery">查询</el-button>
          <el-button type="success" @click="onAdd">新增</el-button>
        </el-form-item>
      </el-form>
    </div>
    <ul class="grid" style="padding:5px;">
      <li class="item g-4" v-for="(item, index) in list" :key="index" style="padding:5px;">
        <visual :data="item"/>
      </li>
    </ul>
    <!-- 新增弹出层 -->
    <el-dialog title="新增视觉设计" :visible.sync="addPop" :close-on-click-modal="false">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.name" placeholder="请输入项目名称！"></el-input>
        </el-form-item>
        <el-form-item label="分类">
          <el-radio-group v-model="form.category">
            <el-radio-button label="系统"></el-radio-button>
            <el-radio-button label="手机App"></el-radio-button>
            <el-radio-button label="网站"></el-radio-button>
            <el-radio-button label="画册"></el-radio-button>
            <el-radio-button label="动画"></el-radio-button>
          </el-radio-group>
        </el-form-item>
        <el-form-item label="关键字">
          <el-input v-model="form.tag" placeholder="关键词不超过3个，每个不超过10个字，不同关键词用分号隔开！"></el-input>
        </el-form-item>
        <el-form-item label="封面：">
          <el-upload
            class="upload-demo"
            name="upFile"
            :data="{type: 'pic', file: this.file}"
            :action="upfile"
            :on-success="onSuccess">
            <el-button size="small" type="primary">点击上传</el-button>
            <div slot="tip" class="el-upload__tip">只能上传一张jpg/png文件，且不超过500kb</div>
          </el-upload>
        </el-form-item>
        <el-form-item label="内容：">
          <el-upload
            class="upload-demo"
            drag
            name="upFile"
            :data="{type: 'content', file: this.file}"
            :action="upfile"
            :on-success="onSuccess"
            multiple>
            <i class="el-icon-upload"></i>
            <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
            <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
          </el-upload>
        </el-form-item>
        <el-form-item label="附件：">
          <el-upload
            class="upload-demo"
            name="upFile"
            :data="{type: 'package', file: this.file}"
            :action="upfile"
            accept="zip"
            :on-success="onSuccess">
            <el-button size="small" type="primary">点击上传</el-button>
            <div slot="tip" class="el-upload__tip">只能上传zip、rar文件，且不超过100Mb</div>
          </el-upload>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="addPop = false">取 消</el-button>
        <el-button type="primary" @click="onSubmit">确 定</el-button>
      </div>
    </el-dialog>
  </div>
</template>
<script>
  import {
    layout,
    upfile,
    file,
    visualServer,
    visualAddServer
  } from '../../config'
  import visual from '~/components/visual'
  import axios from 'axios'
  export default {
    layout: layout,
    data () {
      return {
        addPop: false,
        visualServer: visualServer,
        visualAddServer: visualAddServer,
        file: file,
        upfile: upfile,
        list: [],
        query: {
          name: ''
        },
        form: {
          name: '',
          category: '系统',
          tag: '',
          pic: '',
          content: '',
          package: ''
        }
      }
    },
    components: {
      visual
    },
    created () {
      this.getList()
    },
    methods: {
      getList () {
        const category = this.$route.params.category
        let param = null
        switch (category) {
          case 'all':
            param = ''
            break
          case 'system':
            param = '系统'
            break
          case 'app':
            param = '手机App'
            break
          case 'web':
            param = '网站'
            break
          case 'book':
            param = '画册'
            break
          case 'swf':
            param = '动画'
            break
        }
        this.queryList(this.visualServer + '?category=' + param)
        console.log(category)
      },
      queryList (url) {
        axios.get(url, {
        }).then(res => {
          this.list = res.data.data
        })
      },
      onSubmit () {
        if (!this.form.name) {
          this.$message({
            message: '名称必须填写哦！',
            type: 'warning'
          })
        } else if (!this.form.tag) {
          this.$message({
            message: '请填写相关的标签！',
            type: 'warning'
          })
        } else if (!this.form.pic) {
          this.$message({
            message: '你还没有上传封面图片哦！',
            type: 'warning'
          })
        } else if (!this.form.content) {
          this.$message({
            message: '你确定不上传详情的图片？',
            type: 'warning'
          })
        } else if (!this.form.package) {
          this.$message({
            message: '给上传个附件咯！',
            type: 'warning'
          })
        } else {
          axios.get(this.visualAddServer, {
            params: this.form
          }).then(res => {
            this.addPop = false
            this.getList()
            this.$message({
              message: '恭喜，添加成功！',
              type: 'success'
            })
          })
        }
      },
      onAdd () {
        this.addPop = true
      },
      onSuccess (res) {
        this.form[res.request.type] = res.data
      },
      onQuery () {
        if (!this.query.name) {
          this.$message({
            message: '巧妇难为无米之炊，不给关键字，查个毛线！',
            type: 'warning'
          })
        } else {
          this.queryList(this.visualServer + '?name=' + this.query.name)
        }
      },
      onReset () {
        this.query.name = ''
        this.queryList(this.visualServer)
      }
    }
  }
</script>
<style>
.inner{
  padding-top:60px;
  height:100%;
}
.inner .crumb{
  height:60px;
  margin-top:-60px;
  padding:10px;
}
</style>
