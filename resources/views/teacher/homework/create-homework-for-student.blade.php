<x-teacher-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $studentId]) }}" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="宿題追加" />
    </ol>
  </nav>

  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ \Carbon\Carbon::parse($lesson->next_lesson_date)->format('n月j日') }}までの宿題追加</h1>
      </div>
      <div class="w-full sm:w-4/5 mx-auto">
        <form method="POST" action="{{ route('teacher.homework.store') }}" class="flex flex-wrap -m-2">
          @csrf
          <input type="hidden" name="studentId" value="{{ $studentId }}">
          <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
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