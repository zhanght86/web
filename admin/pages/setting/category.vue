<template>
  <div class="manage">
    <el-tabs v-model="activeName" @tab-click="tabClick" type="card" class="cate-wrap" editable @edit="handleTabsEdit">
      <el-tab-pane :label="item.text" :name="item.tag" :search="item.tag" v-for="(item, index) in parent" :key="index">
        <el-row :gutter="10">
          <el-col :span="4" v-for="(item, index) in child" :key="index">
            <el-card>
              <div class="cate" @click="handleAdd(item)">
                <span :class="'circle iconfont ' + item.icon" :style="'background:' + item.color"></span>
                <h2 class="cate-title">{{item.text}}</h2>
                <div class="btn-area">
                  <el-tooltip content="编辑" placement="top">
                    <span class="iconfont icon-bianji" @click="handleEdit(item)"></span>
                  </el-tooltip>
                  <el-tooltip content="删除" placement="top">
                    <span class="iconfont icon-shanchu" @click="handleDel(item)"></span>
                  </el-tooltip>
                </div>
              </div>
            </el-card>
          </el-col>
        </el-row>
      </el-tab-pane>
    </el-tabs>
    <el-dialog
      :title="'新增二级导航'"
      :visible.sync="addModal"
      :close-on-click-modal="false"
      width="50%">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.text"></el-input>
        </el-form-item>
        <el-form-item label="英文名称">
          <el-input v-model="form.tag" @change="inputChange"></el-input>
        </el-form-item>
        <el-row>
          <el-col :span="12">
            <el-form-item label="英文简写">
              <el-input v-model="form.letter"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="12">
            <el-form-item label="颜色">
              <el-color-picker v-model="form.color"></el-color-picker>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="16">
            <el-form-item label="图标">
              <el-input v-model="form.icon"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="8" class="preview">
            图标预览：<span :class="'iconfont ' + form.icon" :style="'color:' + form.color"></span>
          </el-col>
        </el-row>
        <el-form-item label="链接">
          <el-input v-model="form.url"></el-input>
        </el-form-item>
        <el-form-item label="排序">
          <el-slider
            v-model="form.sort"
            show-input>
          </el-slider>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="addModal = false">取 消</el-button>
        <el-button type="primary" @click="addSubmit">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      :title="'新增一级导航'"
      :visible.sync="addParentModal"
      :close-on-click-modal="false"
      width="50%">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.text"></el-input>
        </el-form-item>
        <el-form-item label="英文名称">
          <el-input v-model="form.tag" @change="inputChange1"></el-input>
        </el-form-item>
        <el-row>
          <el-col :span="12">
            <el-form-item label="英文简写">
              <el-input v-model="form.letter"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="12">
            <el-form-item label="颜色">
              <el-color-picker v-model="form.color"></el-color-picker>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="16">
            <el-form-item label="图标">
              <el-input v-model="form.icon"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="8" class="preview">
            图标预览：<span :class="'iconfont ' + form.icon" :style="'color:' + form.color"></span>
          </el-col>
        </el-row>
        <el-form-item label="链接">
          <el-input v-model="form.url"></el-input>
        </el-form-item>
        <el-form-item label="排序">
          <el-slider
            v-model="form.sort"
            show-input>
          </el-slider>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="addParentModal = false">取 消</el-button>
        <el-button type="primary" @click="addParentSubmit">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      :title="'修改分类'"
      :visible.sync="editModal"
      :close-on-click-modal="false"
      width="50%">
      <el-form ref="form" :model="form" label-width="80px">
        <el-form-item label="名称">
          <el-input v-model="form.text"></el-input>
        </el-form-item>
        <el-form-item label="英文名称">
          <el-input v-model="form.tag" @change="inputChange"></el-input>
        </el-form-item>
        <el-row>
          <el-col :span="12">
            <el-form-item label="英文简写">
              <el-input v-model="form.letter"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="12">
            <el-form-item label="颜色">
              <el-color-picker v-model="form.color"></el-color-picker>
            </el-form-item>
          </el-col>
        </el-row>
        <el-row>
          <el-col :span="16">
            <el-form-item label="图标">
              <el-input v-model="form.icon"></el-input>
            </el-form-item>
          </el-col>
          <el-col :span="8" class="preview">
            图标预览：<span :class="'iconfont ' + form.icon" :style="'color:' + form.color"></span>
          </el-col>
        </el-row>
        <el-form-item label="链接">
          <el-input v-model="form.url"></el-input>
        </el-form-item>
        <el-form-item label="排序">
          <el-slider
            v-model="form.sort"
            show-input>
          </el-slider>
        </el-form-item>
      </el-form>
      <span slot="footer" class="dialog-footer">
        <el-button @click="editModal = false">取 消</el-button>
        <el-button type="primary" @click="editSubmit">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      title="删除"
      :visible.sync="delModal"
      width="30%">
      <span>确认要删除（{{current.text}}）分类，删除操作不可逆，请谨慎！</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="delModal = false">取 消</el-button>
        <el-button type="primary" @click="delCategory(current)">确 定</el-button>
      </span>
    </el-dialog>
    <el-dialog
      title="删除"
      :visible.sync="delParentModal"
      width="30%">
      <span>确认要删除（{{current.text}}）分类，删除操作不可逆，请谨慎！</span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="delParentModal = false">取 消</el-button>
        <el-button type="primary" @click="delParentCategory(current)">确 定</el-button>
      </span>
    </el-dialog>
  </div>
</template>
<script>
import {layout, parentList, childList, addChild, categoryEdit, categoryDel} from '../../config'
import axios from 'axios'
export default {
  layout: layout,
  data () {
    return {
      activeName: null,
      addModal: false,
      editModal: false,
      delModal: false,
      addParentModal: false,
      delParentModal: false,
      addChild: addChild,
      categoryEdit: categoryEdit,
      categoryDel: categoryDel,
      currentParent: {},
      current: {},
      parent: [],
      child: [],
      form: {
        parent: '',
        text: '',
        letter: '',
        tag: '',
        icon: 'icon-',
        color: '#409EFF',
        url: '',
        sort: 0
      }
    }
  },
  created () {
    this.getParent()
  },
  methods: {
    tabClick (item) {
      this.getChild(item.name)
      this.currentParent = item
      console.log(this.currentParent)
    },
    getParent () {
      axios.get(parentList, {
      }).then(res => {
        this.parent = res.data
        this.activeName = res.data[0].tag
        this.currentParent = res.data[0]
        console.log(res.data)
        this.getChild(res.data[0].tag)
      })
    },
    getChild (tag) {
      axios.get(childList + tag, {
      }).then(res => {
        console.log(res.data)
        this.child = res.data
        this.child.unshift({
          text: '添加',
          icon: 'icon-add'
        })
      })
    },
    handleAdd (item) {
      if (!item.id) {
        this.addModal = true
        this.reset()
      }
    },
    addSubmit () {
      this.form.parent = this.activeName
      if (!this.form.parent || !this.form.letter || !this.form.text) {
        this.$message({
          message: '以上为必填项！',
          type: 'warning'
        })
      } else {
        axios.get(this.addChild, {
          params: this.form
        }).then(res => {
          this.addModal = false
          this.getChild(this.activeName)
          this.$message({
            message: '恭喜，添加成功！',
            type: 'success'
          })
        })
      }
    },
    addParentSubmit () {
      if (!this.form.parent || !this.form.letter || !this.form.text) {
        this.$message({
          message: '以上为必填项！',
          type: 'warning'
        })
      } else {
        axios.get(this.addChild, {
          params: this.form
        }).then(res => {
          this.addParentModal = false
          this.getParent()
          this.$message({
            message: '恭喜，添加成功！',
            type: 'success'
          })
        })
      }
    },
    inputChange (value) {
      console.log(value)
      this.form.icon = 'icon-' + value
      this.form.url = '/' + this.activeName + '/' + value
    },
    inputChange1 (value) {
      this.form.icon = 'icon-' + value
      this.form.url = '/' + value
    },
    handleEdit (item) {
      this.form = item
      this.editModal = true
    },
    editSubmit () {
      axios.get(this.categoryEdit + this.form.uId, {
        params: this.form
      }).then(res => {
        this.editModal = false
        this.getChild(this.activeName)
        this.$message({
          message: '恭喜，修改成功！',
          type: 'success'
        })
      })
    },
    handleDel (item) {
      this.delModal = true
      this.current = item
    },
    delCategory (item) {
      axios.get(categoryDel + item.uId, {
      }).then(res => {
        this.delModal = false
        this.getChild(this.activeName)
        this.$message({
          message: '删除成功！',
          type: 'success'
        })
      })
    },
    reset () {
      this.form = {
        parent: '',
        text: '',
        letter: '',
        tag: '',
        icon: 'icon-',
        color: '#409EFF',
        url: '',
        sort: 0
      }
    },
    handleTabsEdit (targetName, action) {
      if (action === 'add') {
        this.addParentModal = true
        this.reset()
      } else {
        this.parent.forEach((item, index) => {
          if (targetName === item.tag) {
            this.delParentModal = true
            this.current = item
          }
        })
      }
    },
    delParentCategory () {
      this.delParentModal = false
      this.delCategory(this.current)
      this.getParent()
    }
  }
}
</script>
<style>
.manage{
  padding:1rem;
  height:100%;
}
.cate-title{
  font-size:1.4rem;
  text-align:center;
  font-weight:normal;
}
.cate .circle{
  width:6rem;
  height:6rem;
  display: block;
  margin:1rem auto;
  border-radius:50%;
  line-height:6rem;
  text-align:center;
  font-size:3rem;
  color:#fff;
}
.cate{
  padding:2rem;
  cursor: pointer;
  color:#999;
  position: relative;
}
.cate-wrap .el-col:first-child .circle{
  font-size:4rem;
  color:#999;
}
.cate-wrap .el-col:first-child .cate-title{
  margin-top:-1rem;
  padding-bottom:1rem;
}
.cate-wrap .el-col:first-child:hover{
  color:#409EFF;
}
.preview{
  font-size:1.4rem;
  color:#666;
  padding:0.7rem 1rem;
}
.preview .iconfont{
  font-size:3rem;
  display:inline-block;
  vertical-align: middle;
}
.cate-wrap .btn-area .iconfont{
  font-size:1.8rem;
  color:#666;
  display:inline-block;
  margin:0 0.5rem;
}
.cate-wrap .btn-area{
  position: absolute;
  bottom:-5rem;
  left:0;
  width:100%;
  transition:0.3s;
  text-align:center;
}
.cate-wrap .el-col:hover .btn-area{
  bottom:0;
}
.cate-wrap .el-col:first-child:hover .btn-area{
  bottom:-5rem;
}
/* 系统
手机app
网站
画册 */
</style>
