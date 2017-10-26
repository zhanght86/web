<template>
  <div class="inner">
    <div class="crumb">
      <el-form :inline="true" :model="query" class="demo-form-inline">
        <el-form-item label="名称：" class="g-16">
          <el-input v-model="query.name" placeholder="请输入搜索关键词！" style="width:800px;"></el-input>
        </el-form-item>
        <el-form-item class="g-8 t-r">
          <el-button type="primary" @click="onSubmit">查询</el-button>
          <el-button type="danger" @click="onAdd">新建</el-button>
        </el-form-item>
      </el-form>
    </div>
    <el-row :gutter="20">
      <el-col :span="4" v-for="(item, index) in list" :key="index">
        <visual :data="item"/>
      </el-col>
    </el-row>
    <!-- 新增弹出层 -->
    <el-dialog title="新建" :visible.sync="addPop" :close-on-click-modal="false">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.name"></el-input>
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
            :on-success="onSuccess">
            <el-button size="small" type="primary">点击上传</el-button>
            <div slot="tip" class="el-upload__tip">只能上传zip、rar文件，且不超过10Mb</div>
          </el-upload>
        </el-form-item>
      </el-form>
      {{form}}
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
          category: '',
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
      axios.get(this.visualServer).then(res => {
        this.list = res.data.data
      })
    },
    methods: {
      onSubmit () {
        axios.get(this.visualAddServer, {
          params: this.form
        }).then(res => {
          console.log(res)
          this.addPop = false
        })
      },
      onAdd () {
        this.addPop = true
      },
      onSuccess (res) {
        this.form[res.request.type] = res.data
      }
    }
  }
</script>
<style>
.inner{
  padding-top:60px;
}
.inner .crumb{
  height:60px;
  margin-top:-60px;
  padding:10px;
}
</style>
