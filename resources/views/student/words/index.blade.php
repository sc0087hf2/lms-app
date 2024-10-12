<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="英単語" />
    </ol>
  </nav>

  <section class="sm:w-192">
    <a href="{{ route('student.words.index') }}">
      <x-title subtitle="WORDS" title="英単語" />
    </a>
    <!-- 検索ロゴ -->
    <div class="mt-8">
      <div class="flex mb-2">
        <x-icons.words />
        <p class="font-bold flex items-center ml-4">単語を探す</p>
      </div>
    </div>
    <!-- 検索フォーム -->
    <div class="relative w-72 mx-auto mb-16">
      <form action="{{ route('student.words.index') }}" method="GET" class="flex">
        <input
          type="text"
          name="search"
          class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          placeholder="英単語を入力"
          value="{{ request('search') }}">
        <button
          type="submit"
          class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
          </svg>
        </button>
      </form>
    </div>
    <!-- 検索結果 -->
    @if(isset($words))
    <div class="mb-16">
      <div class="flex mb-2">
        <p class="font-bold flex items-center ml-4">検索結果</p>
      </div>
      @if(isset($noResults) && $noResults)
      <p class="mt-4 mb-8 text-center">見つかりませんでした。</p>
      @else
      @foreach($words as $word)
      <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-4 gap-0">
          @if($loop->first)
          <div class="col-span-4 border-2 border-gray-200 bg-custom-blue2 p-2 font-bold  flex flex-col items-center justify-center">
            <p class="text-xl">{{ $word->en_word }}</p>
            @else
            <div class="col-span-4 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              @endif
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">意味</p>
            </div>
            <div class="col-span-3 sm:col-span-1 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">{{ $word->ja_word }}</p>
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">品詞</p>
            </div>
            <div class="col-span-3 sm:col-span-1 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">{{ $word->partOfSpeech->name }}</p>
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">例文</p>
            </div>
            <div class="col-span-3 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">{{ $word->en_example }}</p>
              <p class="p-1">{{ $word->ja_example }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endif
      @endif
      <!-- 品詞一覧 -->
      <div class="mb-16">
        <div class="flex mb-2">
          <x-icons.tag />
          <p class="font-bold flex items-center ml-4">品詞</p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($partOfSpeeches as $partOfSpeech)
            <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">{{ $partOfSpeech->name }}</p>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <!-- 教科書一覧 -->
      <div class="mb-8">
        <div class="flex mb-2">
          <x-icons.textbook />
          <p class="font-bold flex items-center ml-4">教科書</p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">NEW HORIZON 1</p>
            </a>
            <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">NEW HORIZON 2</p>
            </a>
            <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">NEW HORIZON 3</p>
            </a>
          </div>
        </div>
      </div>
  </section>
  </x-teacher-layout>