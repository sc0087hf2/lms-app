<x-teacher-layout>
  <section class="text-black body-font">
    <!-- パンくずリスト -->
    <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
        <x-breadcrumb-list-last name="目標一覧" />
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex items-center justify-between mb-8 mx-5">
        <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900">
          <a href="{{ route('teacher.goals.index') }}">
            目標一覧
          </a>
        </h1>
      </div>
      <!-- 目標一覧の表示 -->
      <div class="overflow-x-auto w-full mx-auto" style="max-height: 400px; overflow-y: auto;">
        <table class="w-full text-left whitespace-no-wrap table-fixed">
          <thead>
            <tr>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-28 md:w-20 title-font tracking-wider text-black text-sm">名前</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-96 md:w-64 title-font tracking-wider text-black text-sm">目標</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-28 md:w-20 title-font tracking-wider text-black text-sm"></th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-28 md:w-20 title-font tracking-wider text-black text-sm"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($goals as $goal)
            <tr>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $studentNames[$goal->id] }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $goal->goal }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <a href="{{ route('teacher.goals.edit', ['goalId' => $goal->id]) }}">
                  <p class="bg-blue-900 text-white text-center px-2 py-2 hover:bg-blue-700 rounded">編集</p>
                </a>
              </td>
              <td class="border-b-2 border-dashed border-gray-200 px-6">
                <form
                  action="{{ route('teacher.goals.destroy', ['goalId' => $goal->id]) }}"
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
        {{ $goals->links('pagination::default') }}
      </div>
    </div>
  </section>
</x-teacher-layout>