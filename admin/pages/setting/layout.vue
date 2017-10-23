<template>
  <div class="layout">
    <my-title title="主题颜色"/>
  </div>
</template>
<script>
import {layout} from '../../config'
import title from '../../components/title'
export default {
  layout: layout,
  components: {
    'my-title': title
  }
}
</script>
