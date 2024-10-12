<x-admin-layout>
  <section class="text-black body-font">
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
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">並び替えクイズ一覧</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="mb-8 mx-5 flex flex-col items-center">
        <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900 mb-8">
          <a href="{{ route('admin.sentencePartQuizzes.index') }}">
            並び替えクイズ　一覧
          </a>
        </h1>
        <button
          onclick="location.href='{{ route('admin.sentencePartQuizzes.create') }}'"
          class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
          <span class="hidden md:inline">クイズの</span>追加
        </button>

      </div>
      <form method="GET" action="{{ route('admin.sentencePartQuizzes.index') }}">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 md:justify-start justify-center mb-8">
          <div class="relative mb-2 w-full md:w-auto flex justify-center">
            <label for="grammar_id" class="leading-7 text-sm text-gray-600"></label>
            <select id="grammar_id" name="grammar_id" class="w-2/3 sm:w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option value="">文法を選択</option>
              @foreach($grammars as $grammar)
              <option value="{{ $grammar->id }}" {{ old('grammar_id') == $grammar->id ? 'selected' : '' }}>{{ $grammar->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="relative mb-2 w-full md:w-auto flex justify-center">
            <label for="reference_id" class="leading-7 text-sm text-gray-600"></label>
            <select id="reference_id" name="reference_id" class="w-2/3 sm:w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option value="">参照元を選択</option>
              @foreach($references as $reference)
              <option value="{{ $reference->id }}" {{ old('reference_id') == $reference->id ? 'selected' : '' }}>{{ $reference->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="flex justify-center w-full md:w-auto">
            <button type="submit" class="w-1/2 sm:w-auto text-white bg-blue-500 border-0 py-1 sm:py-2 px-3 sm:px-6 mb-2 focus:outline-none hover:bg-blue-600 rounded">
              絞り込む
            </button>
          </div>
        </div>
      </form>

      <!-- 検索フォーム -->
      <div class="relative w-64 mx-auto hidden">
        <form action="{{ route('admin.words.index') }}" method="GET" class="flex">
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

      @php
      function truncate($string, $length = 10) {
      return mb_strlen($string) > $length ? mb_substr($string, 0, $length) . '...' : $string;
      }
      @endphp

      <!-- 英単語一覧の表示 -->
      <div class="w-full mx-auto">
        <table class="table-auto text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="border-b-4 border-blue-900 px-4 py-3 title-font tracking-wider text-black text-sm">文法</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 title-font tracking-wider text-black text-sm">参照元</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 title-font tracking-wider text-black text-sm">英文</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 title-font tracking-wider text-black text-sm hidden md:table-cell"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($quizzes as $quiz)
            <tr>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $quiz->grammar->name }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $quiz->reference->name }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <span class="block md:hidden">
                  <a href="{{ route('admin.sentencePartQuizzes.show', ['quizId' => $quiz->id]) }}">
                    {{ $quiz->en_sentence }}
                  </a>
                </span>
                <span class="hidden md:block">
                  {{ $quiz->en_sentence }}
                </span>
              </td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <a href="{{ route('admin.sentencePartQuizzes.show', ['quizId' => $quiz->id]) }}">
                  <p class="bg-blue-900 text-white text-center px-2 py-2 hover:bg-blue-700 rounded hidden md:table-cell">詳細</p>
                </a>
              </td>
              @endforeach
          </tbody>
        </table>
      </div>

      <!-- ページネーション -->
      <div class="py-6">
        {{ $quizzes->links('pagination::default') }}
      </div>
    </div>
  </section>
</x-admin-layout>