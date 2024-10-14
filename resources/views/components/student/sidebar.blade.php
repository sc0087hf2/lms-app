<aside id="sidebar" class="z-50 fixed inset-y-0 left-0 w-56 sm:w-80 bg-gray-100 transform -translate-x-full transition-transform ">
  <div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
      <li>
        <a href="{{ route('student.top') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.home size="20px" />
          <span class="ml-3">ホーム</span>
        </a>
      <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.goal size="20px" />
          <span class="ml-3">目標取り組み一覧</span>
        </a>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
            <x-icons.todo size="20px" />
            <span class="ms-3">ToDo</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">ToDo一覧</a></li>
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">ToDo追加</a></li>
          </ul>
        </details>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.lesson size="20px" />
          <span class="ml-3">授業</span>
        </a>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none list-none">
            <x-icons.homework size="20px" />
            <span class="ms-3">宿題</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">宿題一覧</a></li>
            <li><a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">宿題追加</a></li>
          </ul>
        </details>
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