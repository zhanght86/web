module.exports = {
  /*
  ** Headers of the page
  */
  head: {
    title: 'app',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Nuxt.js project' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
  ** Customize the progress bar color
  */
  router: {
    // base: '/nuxtApp/dist/'
  },
  loading: {
    color: '#FA5555',
    height: '2px'
  },
  /*
  ** Build configuration
  */
  css: [
    '~assets/css/main.css',
    '~assets/fonts/Capsuula.css',
    'element-ui/lib/theme-chalk/index.css',
    '~assets/fonts/iconfont.css'
  ],
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
  plugins: [
    { src: '~plugins/element-ui', ssr: true }
  ]
}
