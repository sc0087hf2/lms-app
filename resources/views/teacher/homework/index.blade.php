<x-teacher-layout>
  <section class="text-black body-font">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
        <x-breadcrumb-list-last name="宿題一覧" />

      </ol>
    </nav>
    <div class="flex sm:justify-between">
      <x-title subtitle="LIST OF HOMEWORK" title="宿題一覧" />
      <x-add-button href="{{ route('teacher.homework.create') }}" name="宿題" />
    </div>
    <!-- table -->
    <div class="overflow-x-auto">
      <table class="min-w-max w-full table-auto">
        <thead>
          <tr>
            <th class="p-4 text-left border-b-4 border-blue-900 sm:w-32 hidden sm:table-cell">確認日</th>
            <th class="p-4 text-left border-b-4 border-blue-900 sm:w-32 hidden sm:table-cell">名前</th>
            <th class="p-4 text-left border-b-4 border-blue-900 sm:w-96">宿題内容</th>
            <th class="p-4 border-b-4 border-blue-900 sm:w-24"></th>
            <th class="p-4 border-b-4 border-blue-900 sm:w-24"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($homework as $work)
          <tr class="border-b-2 border-dashed border-gray-200">
            <td class="p-4 hidden sm:table-cell">{{ \Carbon\Carbon::parse($next_lesson_dates[$work->id])->format('n月j日') }}</td>
            <td class="p-4 hidden sm:table-cell">{{ $studentNames[$work->id] }}</td>
            <td class="p-4 hidden sm:table-cell">{{ truncate($work->homework, 24) }}</td>
            <td class="p-4 sm:hidden">{{ truncate($work->homework, 20) }}</td>
            <td class="p-4"><a href="{{ route('teacher.homework.edit', ['homeworkId' => $work->id]) }}"><span class="py-2 px-4 bg-blue-900 rounded text-white hover:bg-blue-700">編集</span></a></td>
            <td class="p-4">
              <form
                action="{{ route('teacher.homework.destroy', ['homeworkId' => $work->id]) }}"
                method="POST"
                onsubmit="return confirm('本当に削除してもよろしいですか？');">
                @csrf
                <button class="px-1 border-b-2 border-blue-900 hover:pb-0 hover:pt-0.5 hover:border-b-0">
                  削除
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- ページネーション -->
    <div class="py-6">
      {{ $homework->links('pagination::default') }}
    </div>
  </section>
</x-teacher-layout>