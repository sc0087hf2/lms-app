<x-admin-layout>
  <section class="text-gray-600 body-font">
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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">英単語詳細</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full">
        <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">英単語　詳細</h1>
      </div>
      <div class="flex flex-col items-center -m-4">
        <div class="p-4 md:w-4/5 w-full">
          <div class="h-full p-8 relative">
            <table class="w-full">
              <tbody>
                <!-- 品詞 -->
                <tr class="">
                  <td class="w-48 border-b-4 border-blue-900 pl-2 pb-6 pt-6 tracking-widest text-base sm:text-lg font-semibold text-gray-900">品詞</td>
                  <td class="w-144 border-b-4 border-gray-300 pl-4 pb-6 pt-6 text-base sm:text-lg text-gray-900">{{ $word->partOfSpeech->name }}</td>
                </tr>
                <!-- 英単語 -->
                <tr class="">
                  <td class="w-48 border-b-4 border-blue-900 pl-2 pb-6 pt-6 tracking-widest text-base sm:text-lg font-semibold text-gray-900">英単語</td>
                  <td class="w-144 border-b-4 border-gray-300 pl-4 pb-6 pt-6 text-base sm:text-lg text-gray-900">{{ $word->en_word }}</td>
                </tr>
                <!-- 日本語 -->
                <tr class="">
                  <td class="w-48 border-b-4 border-blue-900 pl-2 pb-6 pt-6 tracking-widest text-base sm:text-lg font-semibold text-gray-900">日本語</td>
                  <td class="w-144 border-b-4 border-gray-300 pl-4 pb-6 pt-6 text-base sm:text-lg text-gray-900">{{ $word->ja_word }}</td>
                </tr>
                <!-- 例文 英語 -->
                <tr class="">
                  <td class="w-48 border-b-4 border-blue-900 pl-2 pb-6 pt-6 tracking-widest text-base sm:text-lg font-semibold text-gray-900">例文 英語</td>
                  <td class="w-144 border-b-4 border-gray-300 pl-4 pb-6 pt-6 text-base sm:text-lg text-gray-900">{{ $word->en_example }}</td>
                </tr>
                <!-- 例文 日本語 -->
                <tr class="">
                  <td class="w-48 border-b-4 border-blue-900 pl-2 pb-6 pt-6 tracking-widest text-base sm:text-lg font-semibold text-gray-900">例文 日本語</td>
                  <td class="w-144 border-b-4 border-gray-300 pl-4 pb-6 pt-6 text-base sm:text-lg text-gray-900">{{ $word->ja_example }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="container px-5 py-8 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 md:w-1/2 w-full">
                <div class="h-full flex items-center border-blue-900 border rounded-lg group hover:bg-blue-900 hover:border-white">
                  <button
                    onclick="location.href='{{ route('admin.words.edit', ['wordId' => $word->id]) }}'"
                    class="flex justify-between items-center w-full p-4">
                    <p class="text-blue-900 title-font text-center w-full group-hover:text-white">編集</p>
                    <p class="text-blue-900 title-font ml-auto group-hover:text-white">→</p>
                  </button>
                </div>
              </div>
              <div class="p-2 md:w-1/2 w-full">
                <form
                  action="{{ route('admin.words.destroy', ['wordId' => $word->id]) }}"
                  method="POST"
                  onsubmit="return confirm('本当に削除してもよろしいですか？');"
                  class="h-full flex items-center border-red-500 border rounded-lg group hover:bg-red-500 hover:border-white">
                  @csrf
                  <button class="flex justify-between items-center w-full p-4">
                    <p class="text-red-500 title-font text-center w-full group-hover:text-white">削除</p>
                    <p class="text-red-500 title-font ml-auto group-hover:text-white">→</p>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</x-admin-layout>