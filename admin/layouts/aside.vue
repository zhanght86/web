<template>
  <el-row :class="'page ' + isCollapse">
    <el-col class="aside">
      <div class="grid-content bg-dark">
        <div class="user-head">
          <my-face position="right"/>
        </div>
        <div class="scroll">
          <my-menu mode="vertical"  :collapse="isCollapse"/>
        </div>
        <div class="footer" @click="toggleCollapse">
          <i :class="isCollapse?'el-icon-d-arrow-right':'el-icon-d-arrow-left'"></i>
        </div>
      </div>
    </el-col>
    <el-col class="content">
      <div class="grid-content-head">
        <my-headbar/>
      </div>
      <div class="grid-content bg-purple-dark">
        <nuxt/>
      </div>
    </el-col>
  </el-row>
</template>
<script>
import menu from '../components/menu'
import face from '../components/face'
import headbar from '../components/headbar'
import { mapMutations } from 'vuex'
export default {
  components: {
    'my-menu': menu,
    'my-face': face,
    'my-headbar': headbar
  },
  computed: {
    isCollapse () { return this.$store.state.isCollapse }
  },
  methods: {
    ...mapMutations({
      toggleCollapse: 'toggleCollapse'
    })
  }
}
</script>
<style>
.grid-content-head {
  background: #f8f8f8;
  height: 35px;
  margin-top: -35px;
}

.aside {
  width: 10%;
}

.content {
  padding-top: 35px;
  width: 90%;
}

.grid-content.bg-dark {
  padding-top: 12rem;
  padding-bottom: 3rem;
}

.page.true .grid-content.bg-dark {
  padding-top: 8rem;
}

.user-head {
  height: 12rem;
  margin-top: -12rem;
  padding: 2rem;
  text-align: center;
}

.page.true .user-head {
  padding: 2rem 0;
  height: 8rem;
  margin-top: -8rem;
}

.page.true {
  padding-left: 64px;
}

.page.true .aside {
  width: 64px;
  margin-left: -64px;
  transition:0.3s;
}

.page.true .content {
  width: 100%;
}

.aside .scroll {
  height: 100%;
}

.footer {
  height: 3rem;
  line-height: 3rem;
  text-align: center;
  color: #878D99;
  cursor: pointer;
  transition: 0.3s;
}

.footer:hover {
  background: #585F6C;
}
</style>
