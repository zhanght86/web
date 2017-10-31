export const state = () => ({
  isCollapse: true,
  aside: null,
  currentParent: '/',
  currentChildren: '/',
  grid: 'aside',
  menu: []
})

export const mutations = {
  toggleCollapse (state) {
    state.isCollapse = !state.isCollapse
  },
  setAside (state, props) {
    state.aside = props
    console.log(state.aside)
  },
  setParent (state, props) {
    state.currentParent = props
  },
  setChildren (state, props) {
    state.currentChildren = props
  },
  setMenu (state, props) {
    state.menu = props
    console.log(state.menu, props)
  }
}
