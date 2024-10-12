<aside id="sidebar" class="z-50 fixed inset-y-0 left-0 w-56 sm:w-80 bg-gray-100 transform -translate-x-full transition-transform ">
  <div class="h-full px-3 py-4 overflow-y-auto">
    <ul class="space-y-2 font-medium">
      <li>
        <a href="{{ route('admin.top') }}" class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
          <x-icons.home size="20px" />
          <span class="ml-3">ホーム</span>
        </a>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
            <x-icons.teacher />
            <span class="ms-3">先生</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="{{ route('admin.teachers.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">先生一覧</a></li>
            <li><a href="{{ route('admin.teachers.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">先生追加</a></li>
          </ul>
        </details>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
            <x-icons.student />
            <span class="ms-3">生徒</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="{{ route('admin.students.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">生徒一覧</a></li>
            <li><a href="{{ route('admin.students.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">生徒追加</a></li>
          </ul>
        </details>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
            <x-icons.study />
            <span class="ms-3">英文法</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="{{ route('admin.grammars.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">英文法一覧</a></li>
            <li><a href="{{ route('admin.grammars.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">英文法追加</a></li>
            <li><a href="{{ route('admin.sentencePartQuizzes.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">並び替えクイズ一覧</a></li>
            <li><a href="{{ route('admin.sentencePartQuizzes.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">並び替えクイズ追加</a></li>
          </ul>
        </details>
      </li>
      <li>
        <details class="group">
          <summary class="flex items-center p-2 text-gray-900 rounded-lg cursor-pointer hover:bg-gray-300 group-focus:outline-none">
            <x-icons.study />
            <span class="ms-3">英単語</span>
            <svg class="w-3 h-3 ml-auto transition-transform duration-300 group-open:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </summary>
          <ul class="space-y-2 mt-2 pl-6">
            <li><a href="{{ route('admin.words.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">英単語一覧</a></li>
            <li><a href="{{ route('admin.words.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">英単語追加</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</aside>