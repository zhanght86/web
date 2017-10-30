export const layout = 'grid' // 布局 aside 、 head 、grid
export const server = 'http://192.168.3.214/web/api/' // 服务器地址
export const file = server + 'storage/app/uploads/' // 上传文件保存的路径
export const upfile = server + 'public/upload' // 上传文件
export const visualServer = server + 'public/visual'
export const visualAddServer = server + 'public/visual/add'
export const visualDelServer = server + 'public/visual/del/'
export const delfile = server + 'public/delfile/'
export const parentList = server + 'public/category/parent'
export const childList = server + 'public/category/child/'
export const addChild = server + 'public/category/add'
export const categoryEdit = server + 'public/category/edit/'
export const categoryDel = server + 'public/category/del/'
export const menu = [{
  text: '首页',
  icon: '',
  url: '/',
  children: null
}, {
  text: '用户管理',
  icon: '',
  url: '/user',
  children: null
}, {
  text: '视觉设计',
  icon: '',
  url: '/visual',
  children: [{
    tag: '',
    text: '全部',
    url: '/visual/all',
    color: '#666'
  }, {
    tag: 'ST',
    text: '系统',
    url: '/visual/system',
    color: '#2d8ad9'
  }, {
    tag: 'AP',
    text: '手机app',
    url: '/visual/app',
    color: '#d94447'
  }, {
    tag: 'WB',
    text: '网站',
    url: '/visual/web',
    color: '#f58e00'
  }, {
    tag: 'PA',
    text: '画册',
    url: '/visual/book',
    color: '#76be54'
  }, {
    tag: 'AM',
    text: '动画',
    url: '/visual/swf',
    color: '#7d61e7'
  }]
}, {
  text: '统计',
  icon: '',
  url: '/count',
  children: [{
    text: '客户统计',
    url: '/count/customer'
  }, {
    text: '访问统计',
    url: '/count/visit'
  }, {
    text: '用户统计',
    url: '/count/user'
  }]
}, {
  text: '设置',
  icon: '',
  url: '/setting',
  children: [{
    text: '切换布局',
    url: '/setting/layout'
  }, {
    text: '分类管理',
    url: '/setting/category'
  }]
}]
