<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>家庭教師LMS 管理者ページ</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  @include('components.admin.header')
  <div class="relative min-h-screen flex">

    <!-- Sidebar -->
    @include('components.admin.sidebar')

    <!-- Page Content -->
    <main class="mx-auto font-semibold">
      {{ $slot }}
    </main>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>
  </div>
  @include('components.admin.footer')
</body>

</html>