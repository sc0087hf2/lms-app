<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $studentId]) }}" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="取り組み一覧" />
    </ol>
  </nav>
  <section>
    <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">{{ $studentName }} 取り組み一覧</span></h1>
    <div>
      @foreach($goals as $goal)
      <h2 class="mt-16 mb-4 text-center text-xl sm:text-2xl"><strong class="bg-custom-gradient">{{ $goal->goal }}</strong></h2>
      @if (!$loop->last)
      <div class="border-b-2 border-gray-300">
        @else
        <div>
          @endif
          <div class="max-w-4xl mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-3">
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">取り組み状況</div>
              @if($goal->achievement_date)
              @if($goal->goal_deadline > $goal->achievement_date)
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">取り組み達成（テスト待ち）</div>
              @else
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">取り組み達成</div>
              @endif
              @else
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">取り組み中</div>
              @endif
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">目標背景</div>
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $goal->goal_background }}</div>
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">取り組み開始日</div>
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ \Carbon\Carbon::parse($goal->created_at)->format('Y月n月j日') }}</div>
              @if($goal->achievement_date)
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">取り組み達成日</div>
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ \Carbon\Carbon::parse($goal->achievement_date)->format('Y月n月j日') }}</div>
              @endif
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">達成済みToDo</div>
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">
                <ul>
                  @foreach($todos[$goal->id] as $todo)
                  @if($todo->is_achievement === 1)
                  <li class="mb-4 flex">
                    <div>
                      <x-icons.checkbox />
                    </div>
                    <p class="text-base font-normal">{{ $todo->todo }}</p>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">未達成ToDo</div>
              <div class="col-span-2 border border-gray-300 p-2 sm:p-6">
                <ul>
                  @foreach($todos[$goal->id] as $todo)
                  @if($todo->is_achievement !== 1)
                  <li class="mb-4 flex">
                    <div>
                      <x-icons.box />
                    </div>
                    <p class="text-base font-normal">{{ $todo->todo }}</p>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組みの振り返り（指導者）</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8 font-normal">{{ $goal->teacher_comment }}</div>
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組みの振り返り（生徒）</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8 font-normal">{{ $goal->student_comment }}</div>
            </div>
          </div>
          <!-- button -->
          <div class="container px-5 py-4 mx-auto mb-8">
            <div class="flex flex-wrap justify-center -m-2">
              @if($goal->achievement_date)
              <x-page-transition name="目標の編集" href="{{ route('teacher.goals.edit', ['goalId' => $goal->id]) }}" />
              @else
              <x-page-transition-achievement-goal :goal="$goal" />
              @endif
              <x-page-transition name="ToDoの進捗編集" href="{{ route('teacher.todos.editTodoProgress', ['goalId' => $goal->id]) }}" />
            </div>
          </div>
        </div>
        <!-- ページネーション -->
        <div class="py-6">
          {{ $goals->links('pagination::default') }}
        </div>
        @endforeach
      </div>
  </section>
</x-teacher-layout>