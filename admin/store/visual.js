export const state = () => ({
  current: {
    name: null
  },
  delModal: false
})

export const mutations = {
  toggleDelModal (state) {
    state.delModal = !state.delModal
  },
  setCurrent (state, params) {
    console.log(params)
    state.current = params
  }
}
