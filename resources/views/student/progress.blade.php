<x-student-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="取り組み一覧" />
    </ol>
  </nav>
  <section>
    <x-title subtitle="LIST OF GOALS" title="{{ $studentName }} 取り組み一覧" />
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
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組み状況</div>
              @if($goal->achievement_date)
              @if($goal->goal_deadline > $goal->achievement_date)
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">取り組み達成（テスト待ち）</div>
              @else
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">取り組み達成</div>
              @endif
              @else
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">取り組み中</div>
              @endif
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組み開始日</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ \Carbon\Carbon::parse($goal->created_at)->format('Y月n月j日') }}</div>
              @if($goal->achievement_date)
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組み達成日</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ \Carbon\Carbon::parse($goal->achievement_date)->format('Y月n月j日') }}</div>
              @endif
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">達成済みToDo</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">
                <ul>
                  @foreach($todos[$goal->id] as $todo)
                  @if($todo->is_achievement === 1)
                  <li class="mb-2 flex">
                    <img src="{{ asset('storage/images/checkbox.png') }}" alt="" class="mr-2 mb-1 w-5 h-6">
                    <p class="font-bold text-base">{{ $todo->todo }}</p>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">未達成ToDo</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">
                <ul>
                  @foreach($todos[$goal->id] as $todo)
                  @if($todo->is_achievement !== 1)
                  <li class="mb-2 flex">
                    <img src="{{ asset('storage/images/box.png') }}" alt="" class="mr-2 mt-1 w-4 h-4">
                    <p class="font-bold text-base">{{ $todo->todo }}</p>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組みの振り返り（指導者）</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $goal->teacher_comment }}</div>
              <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">取り組みの振り返り（生徒）</div>
              <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $goal->student_comment }}</div>
            </div>
          </div>
          <!-- button -->
          <div class="container px-5 py-4 mx-auto mb-8">
            <div class="flex flex-wrap justify-center -m-2">
              @if($goal->student_comment)
              <x-page-transition name="振り返りを修正する" href="{{ route('student.comments.editGoalComment', ['goalId' => $goal->id]) }}" />
              @else
              <x-page-transition name="振り返りコメントを残す" href="{{ route('student.comments.addGoalComment', ['goalId' => $goal->id]) }}" />
              @endif
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