let mix = require('laravel-mix')

mix.setPublicPath('dist')

   .js('resources/js/components/fields/text/js/bootvue.js',
       'components/fields/text/js/bootvue.js')

   .js('resources/js/components/fields/belongs-to/js/bootvue.js',
       'components/fields/belongs-to/js/bootvue.js')

   .js('resources/js/components/fields/topic/js/bootvue.js',
       'components/fields/topic/js/bootvue.js')

   .js('resources/js/components/fields/map/js/bootvue.js',
       'components/fields/map/js/bootvue.js')

   .js('resources/js/components/fields/place/js/bootvue.js',
       'components/fields/place/js/bootvue.js')

   .js('resources/js/components/fields/textarea/js/bootvue.js',
       'components/fields/textarea/js/bootvue.js')

   .js('resources/js/components/fields/select/js/bootvue.js',
       'components/fields/select/js/bootvue.js')

   .js('resources/js/components/cards/resource-header/js/bootvue.js',
       'components/cards/resource-header/js/bootvue.js')

   .babel('resources/js/common/affects.js', 'dist/js/common/affects.js')

