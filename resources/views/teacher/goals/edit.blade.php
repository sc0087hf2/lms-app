<x-teacher-layout>
  <section class="text-gray-600 body-font relative">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
        <x-breadcrumb-list-middle href="{{ route('teacher.goals.index') }}" name="目標一覧" />
        <x-breadcrumb-list-last name="目標編集" />
      </ol>
    </nav>
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">目標　編集</h1>
    </div>
    <div class="container px-5 pb-8 mx-auto">
      <div class="w-full md:w-4/5 mx-auto">
        <form method="POST" action="{{ route('teacher.goals.update', ['goalId' => $goal->id]) }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- ユーザー名選択 -->
          <input type="hidden" name="student_id" value="{{ $goal->student_id }}">
          <!-- 目標 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="goal" class="leading-7 text-sm text-gray-600">目標（必須）</label>
              <input type="text" id="goal" name="goal" value="{{ is_null(old('goal')) ? $goal->goal : old('goal') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('goal')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 目標背景 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="goal_background" class="leading-7 text-sm text-gray-600">目標背景（必須）</label>
              <textarea id="goal_background" name="goal_background" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('goal_background')) ? $goal->goal_background : old('goal_background') }}</textarea>
            </div>
            @error('goal_background')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 目標期限 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="goal_deadline" class="leading-7 text-sm text-gray-600">目標期限（必須）</label>
              <input type="date" id="goal_deadline" name="goal_deadline" value="{{ is_null(old('goal_deadline')) ? $goal->goal_deadline : old('goal_deadline') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('goal_deadline')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- フィードバック -->
          <div class="p-2 mb-8 w-full">
            <div class="relative">
              <label for="teacher_comment" class="leading-7 text-sm text-gray-600">テストや取り組みに関するフィードバック</label>
              <textarea id="teacher_comment" name="teacher_comment" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('teacher_comment')) ? $goal->teacher_comment : old('teacher_comment') }}</textarea>
            </div>
            @error('teacher_comment')
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
</x-teacher-layout>