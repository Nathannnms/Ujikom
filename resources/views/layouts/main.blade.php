<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    {{-- <link rel="icon" type="image/png" href="./assets/img/favicon.png" /> --}}
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">

    <title>Soft UI Dashboard Tailwind</title>
    @include('layouts.partial.link')
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
  @include('layouts.partial.header')

  <div class="relative min-h-screen">

    <main class="pl-64 pt-6 px-6"> <!-- Disini main content -->
      @yield('content')
    </main>
  </div>

  @include('layouts.partial.footer')
</body>
  @include('layouts.partial.script')
</html>
