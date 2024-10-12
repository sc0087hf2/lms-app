<x-teacher-layout>
  <div class="text-gray-600 body-font w-full sm:w-208">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{ route('teacher.top') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            ホーム
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">生徒詳細</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">ToDoの進捗状況</span>
          </div>
        </li>
      </ol>
    </nav>
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-8 mx-auto">
        <div class="flex flex-col text-center w-full">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-16 text-gray-900">{{ $studentName }} 取り組み状況詳細</h1>
        </div>
        <!-- 現在ページのUI -->
        <div class="flex items-center justify-center space-x-4 mb-8">
          <div class="border border-gray-300 rounded-lg bg-blue-900 px-4 py-8 md:w-1/3 w-full">
            <p class="text-white text-center">ToDoの進捗<span class="hidden md:inline">状況</span></p>
          </div>
          <img src="{{ asset('storage/images/triangle.png') }}" alt="Logo" class="px-2 sm:px-8">
          <div class="border border-blue-900 rounded-lg px-4 py-8 md:w-1/3 w-full">
            <p class="text-center text-blue-900">宿題の追加</p>
          </div>
        </div>
        <!-- 取り組んでいる目標 -->
        <div class="w-full py-4 mb-12">
          <p class="mb-8 text-gray-900">現在取り組んでいるToDo</p>
          <div class="flex justify-center">
            @if(isset($todo->todo))
            <h1 class="border-b-4 border-yellow-500 px-4 py-2 text-xl text-gray-900 inline-block">{{ $todo->todo }}</h1>
            @else
            <h1 class="border-b-4 border-yellow-500 px-4 py-2 text-xl text-gray-900 inline-block">ToDoはありません。</h1>
            @endif
          </div>
        </div>
        <!-- ボタン -->
        <div class="container px-5 py-4 mx-auto mb-8">
          <div class="flex flex-wrap justify-center -m-2">
            @if(isset($todo->getRecentHomework->homework))
            <div class="p-2 md:w-1/3 w-full">
              <form
                method="POST" action="{{ route('teacher.changeProgress', ['todoId' => $todo->id, 'studentId' => $studentId]) }}"
                class="h-full flex items-center border-blue-900 border rounded-lg group hover:bg-blue-900 hover:border-white"
                onsubmit="return confirm('一度登録すると変更できませんが、よろしいですか？');">
                @csrf
                <input type="hidden" name="is_achievement" value="1">
                <button
                  type="submit"
                  class="flex justify-between items-center w-full p-4">
                  <p class="text-blue-900 title-font text-center w-full group-hover:text-white">取り組み達成</p>
                  <p class="text-blue-900 title-font ml-auto group-hover:text-white">→</p>
                </button>
              </form>
            </div>
            <div class="p-2 md:w-1/3 w-full">
              <form
                method="" action=""
                class="h-full flex items-center border-blue-900 border rounded-lg group hover:bg-blue-900 hover:border-white">
                @csrf
                <input type="hidden" name="" value="">
                <button
                  type="submit"
                  class="flex justify-between items-center w-full p-4">
                  <p class="text-blue-900 title-font text-center w-full group-hover:text-white">取り組み続ける</p>
                  <p class="text-blue-900 title-font ml-auto group-hover:text-white">→</p>
                </button>
              </form>
            </div>
            <div class="p-2 md:w-1/3 w-full">
              <form
                method="" action=""
                class="h-full flex items-center border-blue-900 border rounded-lg group hover:bg-blue-900 hover:border-white">
                @csrf
                <input type="hidden" name="" value="">
                <button
                  type="submit"
                  class="flex justify-between items-center w-full p-4">
                  <p class="text-blue-900 title-font text-center w-full group-hover:text-white">取り組み変える</p>
                  <p class="text-blue-900 title-font ml-auto group-hover:text-white">→</p>
                </button>
              </form>
            </div>
            @else
            <div class="p-2 md:w-1/3 w-full">
              <form
                method="" action=""
                class="h-full flex items-center border-blue-900 border rounded-lg group hover:bg-blue-900 hover:border-white">
                @csrf
                <input type="hidden" name="" value="">
                <button
                  type="submit"
                  class="flex justify-between items-center w-full p-4">
                  <p class="text-blue-900 title-font text-center w-full group-hover:text-white">宿題を追加する</p>
                  <p class="text-blue-900 title-font ml-auto group-hover:text-white">→</p>
                </button>
              </form>
            </div>
            @endif
          </div>
        </div>

      </div>
    </section>
  </div>

</x-teacher-layout>