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
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">目標・ToDo追加</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">目標・ToDo　追加</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('teacher.goals.storeGoalTodo') }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- ユーザー名選択 -->
          <input type="hidden" name="student_id" value="{{ $studentId }}">
          <!-- 目標 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="goal" class="leading-7 text-sm text-white bg-red-500 ml-2">目標（必須）</label>
              <input type="text" id="goal" name="goal" value="{{ old('goal') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('goal')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 目標背景 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="goal_background" class="leading-7 text-sm text-gray-600">目標背景（必須）</label>
              <textarea id="goal_background" name="goal_background" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('goal_background') }}</textarea>
            </div>
            @error('goal_background')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 目標期限 -->
          <div class="p-2 mb-8 w-full">
            <div class="relative">
              <label for="goal_deadline" class="leading-7 text-sm text-gray-600">目標期限（必須）</label>
              <input type="date" id="goal_deadline" name="goal_deadline" value="{{ old('goal_deadline') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('goal_deadline')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- ToDo -->
          <div class="p-2 mb-2 w-full" id="todo-container">
            <label for="todo" class="leading-7 text-sm text-gray-600">ToDo（必須）</label>
            @foreach(old('todo', ['']) as $index => $value)
            <div class="relative flex todo-item mb-2">
              <input type="text" id="todo" name="todo[]" value="{{ old('todo.' . $index, $value) }}"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <button type="button" class="remove-todo bg-red-500 text-white py-2 px-4 rounded ml-2">−</button>
            </div>
            @error('todo.' . $index)
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
            @endforeach
          </div>
          <div class="flex mx-auto mb-8">
            <button type="button" id="add-todo" class="bg-blue-500 text-white py-2 px-4 rounded">＋</button>
          </div>
          <div class="p-2 mb-8 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">追加</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-teacher-layout>