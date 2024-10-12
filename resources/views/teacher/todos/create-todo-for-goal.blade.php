<x-teacher-layout>
  <section class="text-gray-600 body-font relative">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
        <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $studentId]) }}" name="{{ $studentName }}" />
        <x-breadcrumb-list-last name="ToDo追加" />

      </ol>
    </nav>
    <x-title subtitle="CREATE TODO" title="ToDo 追加" />
    <div class="container px-5 py-8 mx-auto">
      <div class="w-full mx-auto">
        <form method="POST" action="{{ route('teacher.todos.store') }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- フラグ -->
          <input type="hidden" name="flag" value="flag">
          <!-- 目標 -->
          <input type="hidden" name="goal_id" value="{{ $goalId }}">
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
          <div class="p-2 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">追加</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-teacher-layout>