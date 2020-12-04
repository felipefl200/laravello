const mix = require('laravel-mix')

mix.postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])

mix.extend(
  'graphql',
  new (class {
    dependencies() {
      return ['graphql', 'graphql-tag']
    }
    webpackRules() {
      return {
        test: /\.(graphql|gql)$/,
        exclude: /node_modules/,
        loader: 'graphql-tag/loader',
      }
    }
  })()
)
mix.js('resources/js/app.js', 'public/js')
mix.graphql()

mix.browserSync({
  ui: false,
  injectChanges: true,
  notify: false,
  proxy: '127.0.0.1:8000',
})
