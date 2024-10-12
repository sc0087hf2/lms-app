<div class="p-2 md:w-1/3 w-3/4">
  <form
    action="{{ route('teacher.goals.achieve', ['goalId' => $goal->id]) }}"
    method="POST"
    onsubmit="return confirm('一度登録すると変更できませんが、よろしいですか？');">
    @csrf
    <div class="h-full flex items-center bg-yellow-500 rounded-lg group hover:bg-white hover:border border-yellow-500">
      <button
        type="submit"
        class="flex justify-between items-center w-full p-4">
        <p class="text-white title-font text-center w-full group-hover:text-yellow-500">取り組み終了</p>
      </button>
    </div>
  </form>
</div>