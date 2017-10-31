<template>
  <div>
    <el-menu default-active="/" class="el-menu-vertical-demo" background-color="#495060" text-color="#fff" active-text-color="#ffd04b" :collapse="collapse" :mode="mode" v-if="!hideSub" @select="jump">
      <el-menu-item :index="item.url" v-for="(item, index) in menu" v-if="!item.children" :key="index">
        <i class="el-icon-menu"></i>
        <span slot="title">{{item.text}}</span>
      </el-menu-item>
      <el-submenu :index="item.url" v-for="(item, index) in menu" v-if="item.children" :key="index">
        <template slot="title">
          <i class="el-icon-message"></i>
          <span>{{item.text}}</span>
        </template>
        <el-menu-item-group>
          <el-menu-item :index="item.url" v-for="(item, index) in item.children" :key="index">{{item.text}}</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
    </el-menu>
    <el-menu :default-active="parent" class="el-menu-horizontal" background-color="#495060" text-color="#fff" active-text-color="#FA5555" :collapse="collapse" :mode="mode" v-if="hideSub" @select="showSub">
      <el-menu-item :index="item.url" v-for="(item, index) in menu" :key="index">
        <i class="el-icon-menu"></i>
        <span slot="title">{{item.text}}</span>
      </el-menu-item>
    </el-menu>
  </div>
</template>
<script>
  import { mapMutations } from 'vuex'
  import {navigation} from '../config'
  import axios from 'axios'
  export default {
    props: {
      mode: {
        type: String,
        default: ''
      },
      collapse: {
        type: Boolean,
        default: false
      },
      hideSub: {
        type: Boolean,
        default: false
      },
      menu: {
        type: Array,
        default: []
      }
    },
    computed: {
      parent () {
        return this.$store.state.currentParent
      }
    },
    data () {
      return {
        navigation: navigation,
        currentRou: null
      }
    },
    beforeCreate () {
    },
    created () {
      this.getNavigation()
      this.currentRou = '/' + this.$route.path.split('/')[1]
      this.$store.commit('setParent', this.currentRou)
      // this.menu.forEach((item, index) => {
      //   console.log(item.url, rou)
      //   if (item.url === rou) {
      //     this.$store.commit('setAside', item.children)
      //   }
      // })
    },
    methods: {
      ...mapMutations({
        setAside: 'setAside'
      }),
      jump (route) {
        this.$router.replace(route)
      },
      showSub (route) {
        this.jump(route)
        this.menu.forEach((item, index) => {
          if (item.url === route) {
            this.$store.commit('setAside', item.children)
            this.$store.commit('setChildren', '/')
          }
        })
      },
      getNavigation () {
        axios.get(this.navigation).then(res => {
          this.$store.commit('setMenu', res.data)
          res.data.forEach((item, index) => {
            if (item.url === this.currentRou) {
              this.$store.commit('setAside', item.children)
            }
          })
        })
      },
      setActive (item) {
        const rou = '/' + this.$route.path.split('/')[1]
        this.$store.commit('setParent', rou)
      }
    }
  }
</script>
