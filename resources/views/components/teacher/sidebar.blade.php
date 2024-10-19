<aside id="sidebar" class="z-50 fixed inset-y-0 left-0 w-56 sm:w-80 bg-gray-100 transform -translate-x-full transition-transform ">
  <div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
      <li>
        <a href="{{ route('teacher.top') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.home size="20px" />
          <span class="ml-3">ホーム</span>
        </a>
      <li>
        <a href="{{ route('teacher.goals.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.goal size="20px" />
          <span class="ml-3">目標一覧</span>
        </a>
      </li>
      <li>
        <a href="{{ route('teacher.todos.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.todo size="20px" />
          <span class="ml-3">ToDo一覧</span>
        </a>
      </li>
      <li>
        <a href="{{ route('teacher.lessons.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.lesson size="20px" />
          <span class="ml-3">授業一覧</span>
        </a>
      </li>
      <li>
        <a href="{{ route('teacher.homework.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.homework size="20px" />
          <span class="ml-3">宿題一覧</span>
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