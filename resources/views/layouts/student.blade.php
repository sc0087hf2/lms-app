<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  @include('components.student.header')
  <div class="relative min-h-screen flex">

    <!-- Sidebar -->
    @include('components.student.sidebar')

    <!-- Page Content -->
    <main class="max-w-4xl mx-auto mb-8 px-4 font-semibold">
      {{ $slot }}
    </main>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-50 z-40 hidden"></div>
  </div>
  @include('components.student.footer')
  <!-- JavaScript -->
  <script>
    // sidebar
    document.getElementById('hamburger-button').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        overlay.classList.remove('hidden');
      } else {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        overlay.classList.add('hidden');
      }
    });

    document.getElementById('overlay').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      sidebar.classList.add('-translate-x-full');
      sidebar.classList.remove('translate-x-0');
      overlay.classList.add('hidden');
    });

    //header
    document.addEventListener('click', function(event) {
      const detailsElement = document.querySelector('details');
      const summaryElement = document.querySelector('summary');

      if (detailsElement.hasAttribute('open') && !detailsElement.contains(event.target)) {
        detailsElement.removeAttribute('open');
      }
    });
  </script>

</body>

</html>