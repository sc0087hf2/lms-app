<x-admin-layout>
  <section class="text-gray-600 body-font relative">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{ route('admin.top') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            ホーム
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <a href="{{ route('admin.words.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">英単語一覧</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">英単語編集</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">英単語　編集</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('admin.words.update', ['wordId' => $word->id]) }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- 品詞選択 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="part_of_speech_id" class="leading-7 text-sm text-gray-600">品詞を選択してください（必須）</label>
              <select id="part_of_speech_id" name="part_of_speech_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="" disabled {{ old('part_of_speech_id', $word->part_of_speech_id) === null ? 'selected' : '' }}>選択してください</option>
                @foreach($partOfSpeeches as $partOfSpeech)
                <option value="{{ $partOfSpeech->id }}" {{ old('part_of_speech_id', $word->part_of_speech_id) == $partOfSpeech->id ? 'selected' : '' }}>{{ $partOfSpeech->name }}</option>
                @endforeach
              </select>
            </div>
            @error('part_of_speech_id')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 英単語 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="en_word" class="leading-7 text-sm text-gray-600">英単語名（必須）</label>
              <input type="text" id="en_word" name="en_word" value="{{ is_null(old('en_word')) ? $word->en_word : old('en_word') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('en_word')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 日本語 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="ja_word" class="leading-7 text-sm text-gray-600">日本語（必須）</label>
              <input type="text" id="ja_word" name="ja_word" value="{{ is_null(old('ja_word')) ? $word->ja_word : old('ja_word') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('ja_word')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 例文英語 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="en_example" class="leading-7 text-sm text-gray-600">例文英語</label>
              <textarea id="en_example" name="en_example" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('en_example')) ? $word->en_example : old('en_example') }}</textarea>
            </div>
          </div>
          <!-- 例文日本語 -->
          <div class="p-2 mb-8 w-full">
            <div class="relative">
              <label for="ja_example" class="leading-7 text-sm text-gray-600">例文日本語</label>
              <textarea id="ja_example" name="ja_example" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ is_null(old('ja_example')) ? $word->ja_example : old('ja_example') }}</textarea>
            </div>
          </div>
          <div class="p-2 mb-8 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-admin-layout>