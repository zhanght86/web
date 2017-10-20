export const state = () => ({
  classify: [{
    tag: '',
    text: '最新推荐',
    url: '/front/new',
    color: '#666'
  }, {
    tag: 'ST',
    text: '系统',
    url: '/front/system',
    color: '#2d8ad9'
  }, {
    tag: 'AP',
    text: '手机网页',
    url: '/front/app',
    color: '#d94447'
  }, {
    tag: 'WB',
    text: '网站',
    url: '/front/web',
    color: '#f58e00'
  }, {
    tag: 'NA',
    text: '原生app',
    url: '/front/native',
    color: '#76be54'
  }, {
    tag: 'OT',
    text: '其他',
    url: '/front/other',
    color: '#7d61e7'
  }]
})

export const mutations = {
  increment (state) {
    state.counter++
  }
}
