<x-teacher-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-last name="{{ $studentName }} " />
    </ol>
  </nav>

  <section class="mb-24">
    <x-title subtitle="CURRENT EFFORT" title="{{ $studentName }} 現在の取り組み" />
    <!-- 目標 -->
    <div class="sm:p-8">
      <x-heading name="現在取り組んでいる目標" />
      @if(isset($goal))
      <h2 class="text-center text-xl sm:text-2xl mt-8 mb-4 sm:mt-16"><strong class="bg-custom-gradient">{{ $goal->goal }}</strong></h2>
      <p class="text-center mb-16">（ 期限：{{ \Carbon\Carbon::parse($goal->goal_deadline)->format('n月j日') }} ）</p>
      @else
      <h2 class="text-center text-xl sm:text-2xl mt-8 mb-16 sm:my-16 ">現在取り組んでいる目標はありません。<br />目標を追加してください。</h2>
      @endif
      <div class="mb-16 sm:mb-8 text-right hidden sm:block">
        <a href="{{ route('teacher.progress', ['studentId' => $studentId]) }}" class="text-blue-900 font-bold">過去の取り組みを見る　→</a>
      </div>
    </div>
    <!-- ToDo -->
    @if(isset($todos))
    <div class="relative bg-custom-blue flex flex-col justify-center items-center mb-16 text-lg">
      <x-icons.bg-top />
      <div class="w-full pt-12 sm:p-8 text-left">
        <x-heading name="ToDoリスト" />
        @if($todos->isEmpty())
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4 text-center">
          <p class="m-4 text-blue-900 font-bold text-base sm:text-lg">目標を細分化しToDoを追加してください。</p>
        </div>
        @else
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4">
          <p class="m-4 text-blue-900 font-bold text-base sm:text-lg">達成リスト</p>
          <div class="mx-2 my-4 sm:m-4 sm:px-4">
            <ul class="list-disc pl-5">
              @foreach($todos as $todo)
              @if($todo->is_achievement === 1)
              <li class="mb-2 flex">
                <img src="{{ asset('storage/images/checkbox.png') }}" alt="" class="mr-2 mb-2 w-4 h-5">
                <p class="font-bold text-base">{{ $todo->todo }}</p>
              </li>
              @endif
              @endforeach
            </ul>
          </div>
        </div>
        <div class="border-2 border-yellow-500 bg-white rounded-xl shadow-xl m-4">
          <p class="m-4 text-yellow-500 font-bold text-base sm:text-lg">未達成リスト</p>
          <div class="mx-2 my-4 sm:m-4 sm:px-4">
            <ul class="list-disc pl-5">
              @foreach($todos as $todo)
              @if($todo->is_achievement === 0)
              <li class="mb-2 flex">
                <img src="{{ asset('storage/images/box.png') }}" alt="" class="mr-3 mt-2 w-3 h-3">
                <p class="font-bold text-base">{{ $todo->todo }}</p>
              </li>
              @endif
              @endforeach
            </ul>
          </div>
        </div>
        @endif
      </div>
      <x-icons.bg-bottom />
    </div>
    @endif
    <!-- 宿題 -->
    <div class="py-8 sm:p-8">
      <x-heading name="次の宿題" />
      <div class="max-w-4xl mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-7">
          @if(isset($lesson))
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">次回指導日</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">{{ \Carbon\Carbon::parse($lesson->next_lesson_date)->format('n月j日') }}</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">次回授業内容</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">{{ $lesson->next_lesson }}</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">宿題</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">
            <ul>
              @if(isset($homework))
              @foreach($homework as $work)
              <li class="mb-2">
                {{ $work->homework }}
              </li>
              @endforeach
              @else
              <li class="text-red-500">宿題を追加してください。</li>
              @endif
            </ul>
          </div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">宿題背景</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">
            <ul>
              @if(isset($homework))
              @foreach($homework as $work)
              <li class="mb-2">
                {{ $work->todo->todo }}
              </li>
              @endforeach
              @endif
            </ul>
          </div>
          @else
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">次回指導日</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">指導日を追加してください</div>
          @endif
        </div>
      </div>
      <div class="mt-4 mb-8 text-right hidden sm:block">
        <a href="{{ route('teacher.showLessonsForStudent', ['studentId' => $studentId]) }}" class="text-blue-900 font-bold">過去の授業を見る　→</a>
      </div>
    </div>

    @if(isset($lesson))
    <!-- フィードバック -->
    <div class="relative bg-custom-blue flex flex-col justify-center items-center text-lg">
      <x-icons.bg-top />
      <div class="w-full pt-12 sm:p-8 text-left">
        <x-heading name="{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}の授業フィードバック" />
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4">
          <p class="p-4 py-2 text-base text-blue-900">指導者より</p>
          <p class="px-8 pb-8 text-base">{{ $lesson->teacher_comment }}</p>
        </div>
        @if($lesson->student_comment)
        <div class="border-2 border-yellow-500 bg-white rounded-xl shadow-xl m-4">
          <p class="p-4 py-2 text-base text-yellow-500">生徒より</p>
          <p class="px-8 pb-8 text-base">{{ $lesson->student_comment }}</p>
        </div>
        @endif
      </div>
    </div>
    @endif
  </section>
  <section class="mb-16">
    <x-title subtitle="ADD/EDIT/SHOW" title="追加・編集・閲覧" />
    <div class="sm:mx-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-2 sm:mx-4">
        <!-- 目標の分岐-->
        @if(!isset($goal))
        <a href="{{ route('teacher.goals.create', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.goal-add />
          <p class="mt-2">目標の追加</p>
        </a>
        <a href="" onclick="alert('取り組んでいる目標がありません。目標を編集することはできません。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.goal-edit />
          <p class="mt-2">目標の編集</p>
        </a>
        <a href="#" onclick="alert('現在取り組んでいる目標がありません。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.achieve-goal />
          <p class="mt-2">目標達成</p>
        </a>
        <a href="" onclick="alert('先に目標を追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-add />
          <p class="mt-2">ToDoの追加</p>
        </a>
        <a href="{{ route('teacher.todos.index') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-edit />
          <p class="mt-2">ToDoの編集</p>
        </a>
        <a href="" onclick="alert('編集できるToDoがありません。目標を設定後ToDoを追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-progress />
          <p class="mt-2">ToDo進捗編集</p>
        </a>
        @else
        <a href="" onclick="alert('現在取り組んでいる目標があるため、新たに目標を追加することはできません。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.goal-add />
          <p class="mt-2">目標の追加</p>
        </a>
        <a href="{{ route('teacher.goals.edit', ['goalId' => $goal->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.goal-edit />
          <p class="mt-2">目標の編集</p>
        </a>
        <form
          action="{{ route('teacher.goals.achieve', ['goalId' => $goal->id]) }}"
          method="POST"
          onsubmit="return confirm('一度登録すると変更できませんが、よろしいですか？');"
          class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300 relative">
          @csrf
          <button type="submit" class="absolute inset-0 w-full h-full">
            <span class="sr-only">目標達成</span>
          </button>
          <x-icons.achieve-goal />
          <p class="mt-2">目標達成</p>
        </form>
        <a href="{{ route('teacher.todos.createTodoForGoal', ['goalId' => $goal->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-add />
          <p class="mt-2">ToDoの追加</p>
        </a>
        <a href="{{ route('teacher.todos.index') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-edit />
          <p class="mt-2">ToDoの編集</p>
        </a>
        <!-- ToDoの分岐 -->
        @if(!isset($todos))
        <a href="" onclick="alert('編集できるToDoがありません。ToDoを追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-progress />
          <p class="mt-2">ToDo進捗編集</p>
        </a>
        @else
        <a href="{{ route('teacher.todos.editTodoProgressFlag', ['goalId' => $goal->id, 'flag' => 'flag']) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.todo-progress />
          <p class="mt-2">ToDo進捗編集</p>
        </a>
        @endif
        @endif
        <a href="{{ route('teacher.lessons.create', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.lesson-add />
          <p class="mt-2">授業の追加</p>
        </a>
        <!-- 授業分岐 -->
        @if(!isset($lesson))
        <a href="" onclick="alert('編集できる授業がありません。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.lesson-edit />
          <p class="mt-2">授業の編集</p>
        </a>
        <a href="{{ route('teacher.showLessonsForStudent', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.class />
          <p class="mt-2">過去の授業を見る</p>
        </a>
        <a href="" onclick="alert('先に授業を追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.homework-add />
          <p class="mt-2">宿題の追加</p>
        </a>
        <a href="" onclick="alert('授業を追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.homework-edit />
          <p class="mt-2">宿題の編集</p>
        </a>
        @else
        <a href="{{ route('teacher.lessons.edit', ['lessonId' => $lesson->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.lesson-edit />
          <p class="mt-2 text-center text-sm">授業の編集<br>（授業日{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}）</p>
        </a>
        <a href="{{ route('teacher.showLessonsForStudent', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.class />
          <p class="mt-2">過去の授業を見る</p>
        </a>
        <a href="{{ route('teacher.homework.createHomeworkForLesson', ['lessonId' => $lesson->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.homework-add />
          <p class="mt-2 text-center text-sm">宿題の追加<br>（次回授業日{{ \Carbon\Carbon::parse($lesson->next_lesson_date)->format('n月j日') }}）</p>
        </a>
        @if(!isset($homework))
        <a href="" onclick="alert('宿題を追加してください。'); return false;" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.homework-edit />
          <p class="mt-2">宿題の編集</p>
        </a>
        @else
        <a href="{{ route('teacher.homework.index') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.homework-edit />
          <p class="mt-2">宿題の編集</p>
        </a>
        @endif
        @endif
        <a href="{{ route('teacher.progress', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.step />
          <p class="mt-2">過去の取り組みを見る</p>
        </a>
        <a href="{{ route('teacher.showStudentInfo', ['studentId' => $studentId]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.boy />
          <p class="mt-2">生徒詳細</p>
        </a>
      </div>
  </section>
  </x-admin-layout>