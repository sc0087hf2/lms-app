<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-last name="ToDo進捗編集" />
    </ol>
  </nav>
  <section class="text-gray-600 body-font relative">
    <x-title subtitle="EDIT PROGRESS TODO" title="ToDo 進捗編集" />
    <div class="container px-5 py-8 mx-auto">
      <form action="{{ route('teacher.todos.updateProgress') }}" method="POST" class="text-lg">
        @csrf
        @if(isset($flag))
        <input type="hidden" name="flag" value="flag">
        @endif
        @foreach($todos as $todo)
        <div class="mb-8">
          <p class="mb-4 text-gray-900">● {{ $todo->todo }}</p>
          <div class="flex justify-center">
            <div class="flex items-center me-4">
              <input id="achievement-radio-{{ $todo->id }}"
                type="radio"
                value="1"
                name="is_achievement[{{ $todo->id }}]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                {{ $todo->is_achievement == 1 ? 'checked' : '' }}>
              <label for="achievement-radio-{{ $todo->id }}" class="mr-12 ms-2 text-gray-900 dark:text-gray-300">達成</label>
            </div>
            <div class="flex items-center me-4">
              <input id="non-achievement-radio-{{ $todo->id }}"
                type="radio"
                value="0"
                name="is_achievement[{{ $todo->id }}]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                {{ $todo->is_achievement == 0 ? 'checked' : '' }}>
              <label for="non-achievement-radio-{{ $todo->id }}" class="ms-2 text-gray-900 dark:text-gray-300">未達成</label>
            </div>
          </div>
        </div>
        @endforeach
        <div class="p-2 w-full">
          <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
        </div>
      </form>
    </div>
  </section>
</x-teacher-layout>