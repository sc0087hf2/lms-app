<x-teacher-layout>
  <section class="text-gray-600 body-font relative">
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
            <a href="{{ route('teacher.homework.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">宿題一覧</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">宿題追加</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">宿題　追加</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('teacher.homework.store') }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- ToDo選択 -->
          <div class="p-2 mb-2 w-full homework-item">
            <label for="lesson_id" class="leading-7 text-sm text-gray-600">授業選択（必須）</label>
            <select id="lesson_id" name="lesson_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option value="" disabled selected>選択してください</option>
              @foreach($lessons as $lesson)
              <option value="{{ $lesson->id }}">{{ $studentNames[$lesson->id] }} / 授業日:{{ $lesson->lesson_date }} / 授業内容:{{ $lesson->lesson }}</option>
              @endforeach
            </select>
            @error('lesson_id')
            <div class="text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <div id="homework-container" class="w-full">
            <!-- ToDo選択 -->
            <div class="p-2 mb-2 w-full homework-item">
              <label for="todo_id" class="leading-7 text-sm text-gray-600">ToDoを選択してください（必須）</label>
              <select id="todo_id" name="todo_id[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="" disabled selected>選択してください</option>
                @foreach($todos as $todo)
                <option value="{{ $todo->id }}">{{ $todo->todo }}</option>
                @endforeach
              </select>
              @error('todo_id')
              <div class="text-red-700">{{ $message }}</div>
              @enderror
            </div>
            <!-- 宿題内容 -->
            <div class="p-2 mb-2 w-full homework-item">
              <label for="homework" class="leading-7 text-sm text-gray-600">宿題（必須）</label>
              <textarea id="homework" name="homework[]" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
              @error('homework.*')
              <div class="text-red-700">{{ $message }}</div>
              @enderror
              <div class="flex justify-center">
                <button type="button" class="remove-homework bg-red-500 text-white py-2 px-4 rounded ml-2">－</button>
              </div>
              <hr class="border border-dashed border-gray-300 mt-4 w-full">
            </div>
          </div>
          <!-- 宿題追加ボタン -->
          <div class="flex mx-auto mb-8">
            <button type="button" id="add-homework" class="bg-blue-500 text-white py-2 px-4 rounded ml-2">＋</button>
          </div>
          <div class="p-2 mb-8 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">追加</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-teacher-layout>