<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.lessons.index') }}" name="授業一覧" />
      <x-breadcrumb-list-last name="授業編集" />
    </ol>
  </nav>
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-4 mx-auto">
      <div class="flex flex-col text-center w-full mb-8">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">授業　編集</h1>
      </div>
      <div class="w-full sm:w-4/5 mx-auto">
        <form method="POST" action="{{ route('teacher.lessons.store') }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- 授業日 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="lesson_date" class="leading-7 text-sm text-gray-600">授業日（必須）</label>
              <input type="date" id="lesson_date" name="lesson_date" value="{{ is_null(old('lesson_date')) ? $lesson->lesson_date : old('lesson_date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('lesson_date')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 授業内容 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="lesson" class="leading-7 text-sm text-gray-600">授業内容（必須）</label>
              <textarea id="lesson" name="lesson" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('lesson')) ? $lesson->lesson : old('lesson') }}</textarea>
            </div>
          </div>
          @error('lesson')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
          <!-- 次回授業日 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="next_lesson_date" class="leading-7 text-sm text-gray-600">次回授業日（必須）</label>
              <input type="date" id="next_lesson_date" name="next_lesson_date" value="{{ is_null(old('next_lesson_date')) ? $lesson->next_lesson_date : old('next_lesson_date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('next_lesson_date')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 次回授業内容 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="next_lesson" class="leading-7 text-sm text-gray-600">次回授業内容（必須）</label>
              <textarea id="next_lesson" name="next_lesson" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('next_lesson')) ? $lesson->next_lesson : old('next_lesson') }}</textarea>
            </div>
          </div>
          @error('next_lesson')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
          <!-- 備考 -->
          <div class="p-2 mb-8 w-full">
            <div class="relative">
              <label for="teacher_comment" class="leading-7 text-sm text-gray-600">備考</label>
              <textarea id="teacher_comment" name="teacher_comment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('teacher_comment')) ? $lesson->teacher_comment : old('teacher_comment') }}</textarea>
            </div>
          </div>
          @error('teacher_comment')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
          <div class="p-2 mb-8 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-teacher-layout>