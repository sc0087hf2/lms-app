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

    // ToDo
    document.addEventListener('DOMContentLoaded', function() {
      const maxTodos = 4;
      const todoContainer = document.getElementById('todo-container');
      const addTodoButton = document.getElementById('add-todo');

      addTodoButton.addEventListener('click', function() {
        const todoItems = todoContainer.getElementsByClassName('todo-item');
        if (todoItems.length < maxTodos) {
          const newTodo = todoItems[0].cloneNode(true);
          newTodo.querySelector('input').value = '';
          todoContainer.appendChild(newTodo);
          updateRemoveButtons();
        } else {
          alert('ToDoは最大4つまで追加できます。');
        }
      });

      function updateRemoveButtons() {
        const removeButtons = todoContainer.getElementsByClassName('remove-todo');
        Array.from(removeButtons).forEach(button => {
          button.addEventListener('click', function() {
            if (todoContainer.getElementsByClassName('todo-item').length > 1) {
              button.parentElement.remove();
            } else {
              // alert('少なくとも1つのToDoを残してください。');
            }
          });
        });
      }

      updateRemoveButtons();
    });
  </script>

</body>

</html>