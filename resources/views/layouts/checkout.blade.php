<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  @stack('prepent-style')
  <!-- Membuat sintaks css -->
  @include('includes.style')
</head>

<body>
  <!-- Navbar -->
  @include('includes.navbar-alternate')

  @yield('content')

  <!-- Footer -->
  @include('includes.footer')
  @stack('prepent-script')
  @include('includes.script')
  @stack('addon-script')
</body>

</html>