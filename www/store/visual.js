export const state = () => ({
  classify: [{
    tag: '',
    text: '最新推荐',
    url: '/visual/new',
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
  }],
  list: [{
    name: '电子政务教育云产品解决方案',
    pic: 'http://www.aliued.com/wp-content/uploads/2017/02/TB1A.SYPpXXXXXvapXXXXXXXXXX-1024-768.jpg',
    type: '例如',
    time: '1分钟前',
    thumb: 45,
    view: 0
  }, {
    name: '教育领域信息惠民工程',
    pic: 'http://www.aliued.com/wp-content/uploads/2017/02/A03454D8-47E1-44BD-827B-6B9BD8C4276D.jpg',
    type: '例如',
    time: '1天前',
    thumb: '45',
    view: 0
  }, {
    name: '全国汽车电子健康档案系统',
    pic: 'http://www.aliued.com/wp-content/uploads/2014/12/2520.jpg',
    type: '例如',
    time: '24天前',
    thumb: '45',
    view: 0
  }, {
    name: '坪山手机app系统',
    pic: 'http://www.aliued.com/wp-content/uploads/2014/12/2237.jpg',
    type: '例如',
    time: '2个月前',
    thumb: '45',
    view: 0
  }, {
    name: '十张图看懂信息惠民',
    pic: 'http://www.aliued.com/wp-content/uploads/2017/02/TB1A.SYPpXXXXXvapXXXXXXXXXX-1024-768.jpg',
    type: '例如',
    time: '11个月前',
    thumb: '45',
    view: 0
  }, {
    name: '智慧城市理论与大数据应用报告会（下）',
    pic: 'http://www.aliued.com/wp-content/uploads/2014/12/2237.jpg',
    type: '例如',
    time: '1年前',
    thumb: '45',
    view: 0
  }, {
    name: '智慧城市理论与大数据应用报告会（上）',
    pic: 'http://www.aliued.com/wp-content/uploads/2017/02/TB1A.SYPpXXXXXvapXXXXXXXXXX-1024-768.jpg',
    type: '例如',
    time: '4年前',
    thumb: '45',
    view: 0
  }]
})

export const mutations = {
  increment (state) {
    state.counter++
  }
}
