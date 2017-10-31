export const state = () => ({
  classify: [],
  list: []
})

export const mutations = {
  increment (state) {
    state.counter++
  },
  setclassify (state, params) {
    state.classify = params
  },
  setList (state, params) {
    state.list = params
  }
}
