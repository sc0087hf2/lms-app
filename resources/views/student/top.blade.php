<x-student-layout>
  <section class="mb-24">
    <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">ようこそ {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}さん</span></h1>
    <x-title subtitle="CURRENT EFFORT" title="{{ $studentInfo->last_name }}{{ $studentInfo->first_name }} 現在の取り組み" />
    <!-- 目標 -->
    <div class="sm:p-8">
      <x-heading name="現在取り組んでいる目標" />
      @if(isset($goal))
      <h2 class="text-center text-xl sm:text-2xl mt-8 mb-4 sm:mt-16"><strong class="bg-custom-gradient">{{ $goal->goal }}</strong></h2>
      <p class="text-center mb-8 sm:mb-16">（ 期限：{{ \Carbon\Carbon::parse($goal->goal_deadline)->format('n月j日') }} ）</p>
      @else
      <h2 class="text-center text-xl sm:text-2xl mt-8 mb-16 sm:my-16 ">現在取り組んでいる目標はありません。<br />目標を追加してください。</h2>
      @endif
      <div class="mb-16 sm:mb-8 text-right hidden sm:block">
        <a href="{{ route('student.progress', ['studentId' => $student->id]) }}" class="text-blue-900 font-bold">過去の取り組みを見る　→</a>
      </div>
    </div>
    <div class="flex justify-center items-center mb-16">
      <x-icons.direction />
    </div>
    <!-- ToDo -->
    <div class="relative sm:bg-custom-blue flex flex-col justify-center items-center mb-8 sm:mb-16 text-lg">
      <x-icons.bg-top />
      <div class="w-full pt-12 sm:p-8 text-left">
        <x-heading name="ToDoリスト" />
        @if(isset($todos))
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
        @elseif(isset($goal))
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4 text-center">
          <p class="m-4 text-blue-900 font-bold text-base sm:text-lg">目標を細分化しToDoを追加してください。</p>
        </div>
        @else
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4 text-center">
          <p class="m-4 text-blue-900 font-bold text-base sm:text-lg">目標を追加してください。</p>
        </div>
        @endif
      </div>
      <x-icons.bg-bottom />
    </div>
    <div class="flex justify-center items-center mb-16">
      <x-icons.direction />
    </div>

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
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">現在進行形の問題をすべて正確に解き、その理由を説明できる。</div>
          @else
          <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">次回指導日</div>
          <div class="col-span-5 border border-gray-300 p-4 sm:p-6">指導日を追加してください</div>
          @endif
        </div>
      </div>
      <div class="mt-4 mb-8 text-right hidden sm:block">
        <a href="{{ route('student.lessons', ['studentId' => $student->id]) }}" class="text-blue-900 font-bold">過去の授業を見る　→</a>
      </div>
    </div>

    @if(isset($lesson))
    <div class="flex justify-center items-center mb-16">
      <x-icons.direction />
    </div>
    <!-- フィードバック -->
    <div class="relative sm:bg-custom-blue flex flex-col justify-center items-center text-lg">
      <x-icons.bg-top />
      <div class="w-full pt-12 sm:p-8 text-left">
        <x-heading name="{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}の授業振り返り" />
        <div class="border-2 border-blue-900 bg-white rounded-xl shadow-xl m-4">
          <p class="p-4 py-2 text-base text-blue-900">指導者より</p>
          <p class="px-8 pb-8 text-base">{{ $lesson->teacher_comment }}</p>
        </div>
        @if($lesson->student_comment)
        <div class="border-2 border-yellow-500 bg-white rounded-xl shadow-xl m-4">
          <p class="p-4 py-2 text-base text-yellow-500">{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}授業の振り返り</p>
          <p class="px-8 pb-8 text-base">{{ $lesson->student_comment }}</p>
        </div>
        <!-- button -->
        <div class="container px-5 py-4 mx-auto">
          <div class="flex flex-wrap justify-center -m-2">
            <x-page-transition name="振り返りを修正する" href="{{ route('student.comments.editLessonComment', ['lessonId' => $lesson->id]) }}" />
          </div>
        </div>
        @else
        <!-- button -->
        <div class="container px-5 py-4 mx-auto">
          <div class="flex flex-wrap justify-center -m-2">
            <x-page-transition name="振り返りをする" href="{{ route('student.comments.addLessonComment', ['lessonId' => $lesson->id]) }}" />
          </div>
        </div>
        @endif
      </div>
    </div>
    @endif
  </section>
  <section class="mb-16">
    <x-title subtitle="CONTENTS LIST" title="コンテンツ一覧" />
    <div class="sm:mx-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-2 sm:mx-4">
        <a href="{{ route('student.progress', ['studentId' => $student->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.step />
          <p class="mt-2">取り組み一覧</p>
        </a>
        <a href="{{ route('student.lessons', ['studentId' => $student->id]) }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.lesson2 />
          <p class="mt-2">過去授業一覧</p>
        </a>
        <a href="{{ route('student.words.index') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.wordcard />
          <p class="mt-2">英単語</p>
        </a>
        <a href="{{ route('student.grammars.index') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.book />
          <p class="mt-2">英語文法</p>
        </a>
        <a href="" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.notebook />
          <p class="mt-2">英語長文</p>
        </a>
        <a href="" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.result />
          <p class="mt-2">成績</p>
        </a>
        <a href="{{ route('student.movie') }}" class="block border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center hover:bg-blue-100 hover:border-blue-500 hover:shadow-xl transition duration-300">
          <x-icons.movie />
          <p class="mt-2">動画を見る</p>
        </a>
      </div>
  </section>

</x-student-layout>