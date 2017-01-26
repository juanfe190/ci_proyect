const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    
    //Convert bootstrap.scss to bootstrap.css
    mix.sass('bootstrap.scss', 'resources/assets/css/globalMandatory/bootstrap/bootstrap.css');

    //Global Mandatory Styles
    mix.styles([
    		'globalMandatory/font-awesome/css/font-awesome.css',
    		'globalMandatory/simple-line-icons/simple-line-icons.css',
    		'globalMandatory/bootstrap/bootstrap.css',
    		'globalMandatory/uniform/css/uniform.default.css',
    		'globalMandatory/bootstrap-switch/css/bootstrap-switch.css'
    	], 'public/css/gmstyles.css');

    //Theme Global Styles
    mix.styles([
    		'themeGlobal/components-rounded.css',
    		'themeGlobal/plugins.css'
    	], 'public/css/tgstyles.css');

    //Pages Style
    mix.sass('pages/login.scss', 'public/css/login.css');

    //Page Level Plugins
    mix.styles([
            'pageLevelPlugins/datatables.css',
            'pageLevelPlugins/datatables.bootstrap.css',
        ], 'public/css/datatables.css');

    mix.styles([
            'pageLevelPlugins/bootstrap-select.css'
        ], 'public/css/bootstrap-select.css');

    mix.styles([
            'pageLevelPlugins/colorpicker.css',
            'pageLevelPlugins/jquery.minicolors.css'
        ], 'public/css/colorpicker.css');

    mix.styles([
            'pageLevelPlugins/summernote.css'
        ], 'public/css/summernote.css');

    mix.sass([
            'ci-styles/cinnova.scss'
        ], 'public/css/cinnova.css');

    //Theme Layout
    mix.styles([
            'themeLayout/layout.css',
            'themeLayout/blue.css',
            'themeLayout/custom.css'
        ], 'public/css/tlstyles.css');

    //Core Plugins Scripts
    mix.scripts([
            'corePlugins/jquery.min.js',
            'corePlugins/bootstrap.js',
            'corePlugins/js.cookie.min.js',
            'corePlugins/bootstrap-hover-dropdown.js',
            'corePlugins/jquery.slimscroll.js',
            'corePlugins/jquery.blockui.min.js',
            'corePlugins/jquery.uniform.js',
            'corePlugins/bootstrap-switch.js'
        ], 'public/js/cpscripts.js');

    //Page Level Plugins Scripts
    mix.scripts([
            'pageLevelPlugins/jquery.validate.js',
            'pageLevelPlugins/additional-methods.js'
        ], 'public/js/plpscripts.js');

    mix.scripts([
            'pageLevelPlugins/bootstrap-select.js'
        ], 'public/js/bootstrap-select.js');

    mix.scripts([
            'pageLevelPlugins/summernote.js'
        ], 'public/js/summernote.js');

    //Theme Global Scripts
    mix.scripts([
            'themeLevel/app.js'
        ], 'public/js/tgscripts.js');

    //Page Level
    mix.scripts(['pageLevel/login.js'], 'public/js/login.js');
    mix.scripts(['pageLevel/table-datatables-buttons.js'], 'public/js/table-datatables-buttons.js');
    mix.scripts(['pageLevel/ui-confirmations.js'], 'public/js/ui-confirmations.js');
    mix.scripts(['pageLevel/components-bootstrap-select.js'], 'public/js/components-bootstrap-select.js');
    mix.scripts(['pageLevel/components-color-pickers.js'], 'public/js/components-color-pickers.js');
    mix.scripts(['pageLevel/components-summernote.js'], 'public/js/components-summernote.js');

    //Page Level Plugins
    mix.scripts([
            'pageLevelPlugins/datatable.js',
            'pageLevelPlugins/datatables.js',
            'pageLevelPlugins/datatables.bootstrap.js',
        ], 'public/js/datatables.js');

    mix.scripts(['pageLevelPlugins/bootstrap-confirmation.js'], 'public/js/bootstrap-confirmation.js');

    mix.scripts([
            'pageLevelPlugins/bootstrap-colorpicker.js',
            'pageLevelPlugins/jquery.minicolors.js',
        ], 'public/js/colorpicker.js');

    //Theme Layout
    mix.scripts([
            'themeLayout/layout.js',
            'themeLayout/demo.js',
            'themeLayout/quick-sidebar.js',
        ], 'public/js/tlscripts.js');

    //Se aplica versión de archivos
    mix.version([
            //Styles
            'public/css/gmstyles.css',
            'public/css/tgstyles.css',
            'public/css/login.css',
            'public/css/datatables.css',
            'public/css/bootstrap-select.css',
            'public/css/colorpicker.css',
            'public/css/summernote.css',
            'public/css/cinnova.css',
            'public/css/tlstyles.css',
            //Scripts
            'public/js/cpscripts.js',
            'public/js/plpscripts.js',
            'public/js/bootstrap-select.js',
            'public/js/summernote.js',
            'public/js/tgscripts.js',
            'public/js/login.js',
            'public/js/table-datatables-buttons.js',
            'public/js/ui-confirmations.js',
            'public/js/colorpicker.js',
            'public/js/components-bootstrap-select.js',
            'public/js/components-color-pickers.js',
            'public/js/components-summernote.js',
            'public/js/datatables.js',
            'public/js/bootstrap-confirmation.js',
            'public/js/tlscripts.js'
        ]);
        
});
