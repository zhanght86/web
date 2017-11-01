module.exports = {
  /*
  ** Headers of the page
  */
  head: {
    title: 'lcdc',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  css: [
    '~/assets/style/global.css',
    'element-ui/lib/theme-chalk/index.css',
    '~/assets/fonts/iconfont.css'
  ],
  /*
  ** Customize the progress bar color
  */
  loading: { color: '#D94447' },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** Run ESLint on save
    */
    vendor: ['element-ui'],
    extend (config, ctx) {
      if (ctx.dev && ctx.isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/
        })
      }
    }
  },
  vender: [
    'element-ui'
  ],
  babel: {
    'plugins': [['component', [
      {
        'libraryName': 'element-ui',
        'styleLibraryName': 'theme-chalk'
      },
      'transform-async-to-generator',
      'transform-runtime'
    ]]],
    comments: true
  },
  plugins: ['~plugins/element-ui']
}
