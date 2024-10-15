<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>家庭教師LMS 指導者ページ</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  @include('components.user.header')
  <div class="relative min-h-screen flex">

    <!-- Page Content -->
    <main class="max-w-4xl mx-auto mb-8 px-4 font-semibold">
      {{ $slot }}
    </main>

  </div>
  @include('components.teacher.footer')

</body>

</html>