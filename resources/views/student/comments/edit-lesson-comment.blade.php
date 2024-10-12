<x-student-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="授業振り返り編集" />
    </ol>
  </nav>
  <section class="text-gray-600 body-font relative sm:w-192">
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">授業振り返り　編集</h1>
      </div>
      <div class="w-full md:w-4/5 mx-auto">
        <form method="POST" action="{{ route('student.comments.updateLessonComment', ['lessonId' => $lesson->id]) }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- 取り組みフィードバック -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="student_comment" class="leading-7 text-sm text-gray-600">授業振り返り</label>
              <textarea id="student_comment" name="student_comment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('student_comment')) ? $lesson->student_comment : old('student_comment') }}</textarea>
            </div>
            @error('student_comment')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <div class="p-2 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-student-layout>