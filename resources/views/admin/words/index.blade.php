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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">英単語一覧</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex items-center justify-between mb-8 mx-5">
        <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900">
          <a href="{{ route('admin.words.index') }}">
            単語一覧
          </a>
        </h1>
        <button
          onclick="location.href='{{ route('admin.words.create') }}'"
          class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">
          <span class="hidden md:inline">英単語の</span>追加
        </button>

      </div>

      <!-- 検索フォーム -->
      <div class="relative w-64 mx-auto mb-8">
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
              <th class="border-b-4 border-blue-900 px-4 py-3 w-32 title-font tracking-wider text-black text-sm rounded-tl rounded-bl">品詞</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-32 title-font tracking-wider text-black text-sm">英語</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-64 title-font tracking-wider text-black text-sm hidden sm:table-cell">日本語</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 title-font tracking-wider text-black text-sm rounded-tr rounded-br"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($words as $word)
            <tr>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $word->partOfSpeech->name }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $word->en_word }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6 hidden sm:table-cell">{{ truncate($word->ja_word) }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <a href="{{ route('admin.words.show', ['wordId' => $word->id]) }}">
                  <p class="bg-blue-900 text-white text-center px-2 py-2 hover:bg-blue-700 rounded">詳細</p>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>

      <!-- ページネーション -->
      <div class="py-6">
        {{ $words->links('pagination::default') }}
      </div>
    </div>
  </section>
</x-admin-layout>