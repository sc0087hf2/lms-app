<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-last name="目標一覧" />
    </ol>
  </nav>
  <div class="flex sm:justify-between">
    <x-title subtitle="GOALS LIST" title="目標一覧" />
  </div>
  <!-- table -->
  <div class="overflow-x-auto">
    <table class="min-w-max w-full table-auto">
      <thead>
        <tr>
          <th class="p-4 text-left border-b-4 border-blue-900 sm:w-32 hidden sm:table-cell">名前</th>
          <th class="p-4 text-left border-b-4 border-blue-900 sm:w-96">目標</th>
          <th class="p-4 border-b-4 border-blue-900 sm:w-24"></th>
          <th class="p-4 border-b-4 border-blue-900 sm:w-24"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($goals as $goal)
        <tr class="border-b-2 border-dashed border-gray-200">
          <td class="p-4 hidden sm:table-cell">{{ $studentNames[$goal->id] }}</td>
          <td class="p-4 hidden sm:table-cell">{{ truncate($goal->goal, 24) }}</td>
          <td class="p-4 sm:hidden">{{ truncate($goal->goal, 20) }}</td>
          <td class="p-4"><a href="{{ route('teacher.goals.edit', ['goalId' => $goal->id]) }}"><span class="py-2 px-4 bg-blue-900 rounded text-white hover:bg-blue-700">編集</span></a></td>
          <td class="p-4">
            <form
              action="{{ route('teacher.goals.destroy', ['goalId' => $goal->id]) }}"
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
    {{ $goals->links('pagination::default') }}
  </div>
</x-teacher-layout>