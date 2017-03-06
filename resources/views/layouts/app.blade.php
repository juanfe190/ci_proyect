<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>&Aacute;rea de Administraci&oacute;n Club Innova</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ elixir('css/gmstyles.css') }}">
  <link rel="stylesheet" href="{{ elixir('css/cinnova.css') }}">
  <!-- PAGE LEVEL PLUGINS CSS -->
  @yield('page-level-plugins-css')
  <!-- THEME GLOBAL STYLES -->
  <link rel="stylesheet" href="{{ elixir('css/tgstyles.css') }}">
  <!-- PAGE LEVEL STYLES -->
  @yield('page-level-styles')
  <!-- THEME LAYOUT STYLES -->
  @yield('theme-layout-styles')
</head>
<body class="@yield('body-class')">

  @yield('content')

  <!-- CORE PLUGINS -->
  <script src="{{ elixir('js/cpscripts.js') }}" type="text/javascript"></script>
  <!-- PAGE LEVEL PLUGINS JS -->
  @yield('page-level-plugins-js')
  <!-- THEME GLOBAL SCRIPTS -->
  <script src="{{ elixir('js/tgscripts.js') }}" type="text/javascript"></script>
  <!-- PAGE LEVEL SCRIPTS -->
  @yield('page-level-scripts')
  <!-- THEME LAYOUT SCRIPTS -->
  @yield('theme-layout-scripts')
</body>
</html>
