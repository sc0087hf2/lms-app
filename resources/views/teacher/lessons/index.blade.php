<x-teacher-layout>
  <section class="text-black body-font">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{ route('teacher.top') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">授業一覧</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex items-center justify-between mb-8 mx-5">
        <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900">
          <a href="{{ route('teacher.lessons.index') }}">
            授業一覧
          </a>
        </h1>
      </div>
      <!-- 授業一覧の表示 -->
      <div class="w-full mx-auto">
        <table class="table-auto text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 sm:w-28 title-font tracking-wider text-black text-sm">授業日</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-28 sm:w-28 title-font tracking-wider text-black text-sm">名前</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-64 sm:w-96 title-font tracking-wider text-black text-sm">目標</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 sm:w-28 title-font tracking-wider text-black text-sm"></th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 sm:w-28 title-font tracking-wider text-black text-sm"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($lessons as $lesson)
            <tr>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $studentNames[$lesson->id] }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $lesson->lesson }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <a href="{{ route('teacher.lessons.edit', ['lessonId' => $lesson->id]) }}">
                  <p class="bg-blue-900 text-white text-center px-2 py-2 hover:bg-blue-700 rounded">編集</p>
                </a>
              </td>
              <td class="border-b-2 border-dashed border-gray-200 px-6">
                <form
                  action="{{ route('teacher.lessons.destroy', ['lessonId' => $lesson->id]) }}"
                  method="POST"
                  onsubmit="return confirm('削除するともとに戻せません。本当に削除してもよろしいですか？');">
                  @csrf
                  <button type="submit" class="border-b-2 border-blue-900 text-center md:px-2 hover:border-b-0">削除</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- ページネーション -->
      <div class="py-6">
        {{ $lessons->links('pagination::default') }}
      </div>
    </div>
  </section>
</x-teacher-layout>