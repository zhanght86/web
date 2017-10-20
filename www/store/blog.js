export const state = () => ({
  classify: [{
    tag: '',
    text: '最新推荐',
    url: '/blog/new',
    color: '#666'
  }, {
    tag: 'IR',
    text: '交互设计',
    url: '/blog/app',
    color: '#d94447'
  }, {
    tag: 'VS',
    text: '视觉设计',
    url: '/blog/web',
    color: '#f58e00'
  }, {
    tag: 'FE',
    text: '前端开发',
    url: '/blog/native',
    color: '#76be54'
  }, {
    tag: 'GP',
    text: '团队生活',
    url: '/blog/other',
    color: '#7d61e7'
  }, {
    tag: 'OT',
    text: '其他',
    url: '/blog/system',
    color: '#2d8ad9'
  }]
})

export const mutations = {
  increment (state) {
    state.counter++
  }
}
