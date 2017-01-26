@extends('layouts.app')

<!-- STYLES -->
@section('theme-layout-styles')
  <link rel="stylesheet" href="{{ elixir('css/tlstyles.css') }}">
@stop

<!-- BODY CLASS -->
@section('body-class')
  page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed
@stop

<!-- CONTENT -->
@section('content')
  <!-- HEADER -->
  @include('partials.header')
  <!-- END HEADER -->
  <!-- BEGIN HEADER & CONTENT DIVIDER -->
  <div class="clearfix"></div>
  <!-- END HEADER & CONTENT DIVIDER -->
  <!-- BEGIN CONTAINER -->
  <div class="page-container">
    <!-- BEGIN SIDEBAR -->
    @include('partials.sidebar')
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <!-- BEGIN CONTENT BODY -->
      <div class="page-content">
        @yield('error-content')
        @yield('action-button')
        @yield('page-content')
      </div>
    </div>
    <!-- END CONTENT -->
  </div>
  <!-- END CONTAINER -->
  <!-- BEGIN FOOTER -->
  <div class="page-footer">
      <div class="page-footer-inner"> {{ date('Y') }} &copy; ClubInnova Inc.</div>
      <div class="scroll-to-top">
          <i class="icon-arrow-up"></i>
      </div>
  </div>
  <!-- END FOOTER -->
@stop

<!-- THEME LAYOUT SCRIPTS -->
@section('theme-layout-scripts')
  <script src="{{ elixir('js/tlscripts.js') }}" type="text/javascript"></script>
@stop