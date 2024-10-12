<x-admin-layout>
  <!-- プロフィール -->
  <div class="container mx-auto flex justify-center items-center">
    <div class="w-96 sm:w-128 p-8 text-center">
      <h1 class="text-2xl sm:text-3xl font-medium text-gray-900 py-8">{{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</h1>
    </div>
  </div>
  <!-- 遷移ボタン -->
  <div class="container px-16 pb-8 mx-auto">
    <div class="flex flex-wrap -m-2">
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.teachers.index') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">先生一覧</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.students.index') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">生徒一覧</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.grammars.index') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">英文法一覧</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.grammars.create') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">英文法追加</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.sentencePartQuizzes.index') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">並び替えクイズ一覧</p>
            <img src="{{ asset('storage/images/button-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.sentencePartQuizzes.create') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">並び替えクイズ追加</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.words.index') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">英単語一覧</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
      <div class="p-2 md:w-1/3 w-full">
        <div class="h-full flex items-center bg-gray-300 border-l-16 border-blue-900 group">
          <a
            href="{{ route('admin.words.create') }}"
            class="flex justify-between items-center w-full p-4">
            <p class="text-gray-900 title-font text-center w-full">英単語追加</p>
            <img src="{{ asset('storage/images/button-right-logo.png') }}" alt="Logo" class="" style="width: 24px;">
          </a>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>