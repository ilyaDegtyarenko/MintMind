module.exports = {
  outputDir: '../public',
  indexPath: process.env.NODE_ENV === 'production' ? '../resources/views/app.blade.php' : 'index.html',
  transpileDependencies: [/node_modules[/\\\\]vuetify[/\\\\]/],

  devServer: {
    proxy: 'http://mint-mind.dv' /* TODO check. */
  },

  pages: {
    index: {
      entry: 'src/index.js',
      template: 'public/index.html',
      title: 'MintMind'
    }
  },

  pluginOptions: {
    i18n: {
      locale: 'ru',
      fallbackLocale: 'en',
      localeDir: 'locales',
      enableInSFC: true
    }
  }
}
