<header class="text-gray-600 body-font bg-blue-900">
  <div class="container mx-auto flex p-2 items-center justify-between relative">
    <a href="{{ route('teacher.top') }}" class="flex title-font font-medium items-center">
      <x-icons.logo-blue />
      <x-icons.logo-blue-sm />
    </a>
    <div class="relative flex items-center">
      <div class="ml-4 text-white">
        <a href="{{ route('teacher.about') }}"><span class="hidden md:inline">家庭教師</span>LMSとは</a>
      </div>
      <p class="mx-4 text-white">|</p>
      <details class="group">
        <summary class="flex items-center p-2 text-white cursor-pointer group-focus:outline-none list-none">
          <p class="mr-2"><span class="hidden md:inline">ようこそ </span>{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}さん</p>
          <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
          </svg>
        </summary>
        <ul class="absolute left-1 top-full mt-2 w-48 bg-white rounded-lg shadow-lg space-y-2 z-10">
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">
                ログアウト
              </button>
            </form>
          </li>
        </ul>
      </details>
      <button id="hamburger-button" class="ml-2 p-2 sm:p-3 text-blue-900 bg-gray-200 rounded-lg focus:outline-none">
        <svg class="w-5 sm:w-6 h-5 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
  </div>
</header>