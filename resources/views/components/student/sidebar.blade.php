<aside id="sidebar" class="z-50 fixed inset-y-0 left-0 w-56 sm:w-80 bg-gray-100 transform -translate-x-full transition-transform ">
  <div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
      <li>
        <a href="{{ route('student.top') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.home size="20px" />
          <span class="ml-3">ホーム</span>
        </a>
      </li>
      <li>
        <a href="{{ route('student.words.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <span class="ml-3">英単語</span>
        </a>
      </li>
      <li>
        <a href="{{ route('student.movie') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <span class="ml-3">動画を見る</span>
        </a>
      </li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full text-left flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">
            ログアウト
          </button>
        </form>
      </li>
    </ul>
  </div>
</aside>