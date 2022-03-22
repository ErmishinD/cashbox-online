<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="user-id" content="{{ Auth::user()->id }}">
      <meta name="company-id" content="{{ Auth::user()->company_id }}">
      <meta name="user_name" content="{{ Auth::user()->name }}">
      <meta name="is_superadmin" content="{{ strval(Auth::user()->hasRole('Super Admin')) }}">

      <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @hasSection('htmlheader_title') @yield('htmlheader_title') @endif
        </title>

        @section('styles')
            @include('app.connect_styles')
        @show
      <script>
        @auth
            window.Permissions = {!! json_encode(Auth::user()->getAllPermissions()->pluck('name'), true) !!}
        @else
            window.Permissions = [];
        @endauth
    </script>
    </head>

    <body>
        <!-- <a style="padding-left: 295px;" class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form> -->
        <div id="app">

            <app></app>

        </div>

        @section('scripts')
            @include('app.connect_scripts')
        @show

    </body>

