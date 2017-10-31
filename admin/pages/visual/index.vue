<template>
  <div>项目管理</div>
</template>
<script>
import {layout} from '../../config'
export default {
  layout: layout,
  created () {
    setTimeout(() => {
      this.$router.replace('/visual/all')
    }, 200)
  }
}
</script>
