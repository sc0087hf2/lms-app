<main class="max-w-4xl mx-auto mb-8 px-4 font-semibold">
  <section class="text-black body-font">
    <div class="container px-5 py-8 mx-auto">
      <!-- ToDo一覧の表示 -->
      <div class="w-full mx-auto">
        <table class="table-auto text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-28 sm:w-28 title-font tracking-wider text-black text-sm">名前</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-64 sm:w-96 title-font tracking-wider text-black text-sm">ToDo</th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 sm:w-28 title-font tracking-wider text-black text-sm"></th>
              <th class="border-b-4 border-blue-900 px-4 py-3 w-24 sm:w-28 title-font tracking-wider text-black text-sm"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($todos as $todo)
            <tr>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $studentNames[$todo->id] }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">{{ $todo->todo }}</td>
              <td class="border-b-2 border-dashed border-gray-200 px-4 py-6">
                <a href="{{ route('teacher.todos.edit', ['todoId' => $todo->id]) }}">
                  <p class="bg-blue-900 text-white text-center px-2 py-2 hover:bg-blue-700 rounded">編集</p>
                </a>
              </td>
              <td class="border-b-2 border-dashed border-gray-200 px-6">
                <form
                  action="{{ route('teacher.todos.destroy', ['todoId' => $todo->id]) }}"
                  method="POST"
                  onsubmit="return confirm('本当に削除してもよろしいですか？');">
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
        {{ $todos->links('pagination::default') }}
      </div>
    </div>
  </section>
</main>