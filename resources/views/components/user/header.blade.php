<header class="text-gray-600 body-font bg-blue-900">
  <div class="container mx-auto flex p-2 items-center justify-between relative">
    <a href="{{ route('top') }}" class="flex title-font font-medium items-center">
      <x-icons.logo-blue />
      <x-icons.logo-blue-sm />
    </a>
    @if (Route::has('login'))
    <div class="-mx-3 flex flex-1 justify-end">
      @auth
      @if (Auth::user()->user_type === 'student')
      <a
        href="{{ route('student.top') }}"
        class="mr-4 text-white">
        @elseif(Auth::user()->user_type === 'teacher')
        <a
          href="{{ route('teacher.top') }}"
          class="mr-4 text-white">
          @elseif(Auth::user()->user_type === 'admin')
          <a
            href="{{ route('admin.top') }}"
            class="mr-4 text-white">
            @endif
            マイページに行く
          </a>
          @else
          <a
            href="{{ route('login') }}"
            class="mr-4 p-2 text-white text-center border-b-2 border-white hover:border-none">
            ログイン
          </a>
          @endauth
          </nav>
          @endif

    </div>
</header>