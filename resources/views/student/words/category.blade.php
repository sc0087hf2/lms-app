<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('student.words.index') }}" name="英単語" />
      <x-breadcrumb-list-last name="{{ $category->name }} 一覧" />
    </ol>
  </nav>
  <h1 class="my-16 text-center text-2xl">中学で覚えておきたい{{ $category->name }} 一覧</h1>
  <div class="max-w-4xl sm:w-192 mb-16">
    <!-- 表示/非表示ボタン -->
    <button id="toggleButton" onclick="toggleJaWords()" class="bg-blue-500 text-white px-4 py-2 mb-4 rounded">全ての日本語を非表示</button>
    <div class="grid grid-cols-9 sm:grid-cols-18 gap-1">
      @foreach($words as $word)
      <div class="col-span-1 border-2 border-blue-900 bg-blue-900 rounded p-4 font-bold flex items-center justify-center">
        <p class="text-white text-sm font-normal">{{ $loop->iteration }}</p>
      </div>
      <div class="col-span-4 border-2 border-blue-900 rounded p-4 font-bold flex items-center justify-center">
        <p class="text-sm font-normal">{{ $word->en_word }}</p>
      </div>
      <div class="col-span-4 border-2 border-blue-900 rounded p-4 font-bold flex items-center justify-center">
        <p class="text-sm font-normal ja-word">{{ $word->ja_word }}</p>
      </div>
      @endforeach
    </div>
  </div>
  <script>
  </script>
</x-student-layout>