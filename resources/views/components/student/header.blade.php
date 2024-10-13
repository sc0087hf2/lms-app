<header class="text-gray-600 body-font bg-blue-900">
  <div class="container mx-auto flex p-2 items-center justify-between relative">
    <a href="{{ route('student.top') }}" class="flex title-font font-medium items-center">
      <x-icons.logo-blue />
      <x-icons.logo-blue-sm />
    </a>
    <div class="relative flex items-center">
      <div class="mr-4 text-white">
        <a href="{{ route('student.about') }}">家庭教師LMSについて</a>
      </div>
      <button id="hamburger-button" class="ml-2 p-2 sm:p-3 text-blue-900 bg-gray-200 rounded-lg focus:outline-none">
        <svg class="w-5 sm:w-6 h-5 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </div>
</header>