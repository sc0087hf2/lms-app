<x-teacher-layout>
  <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">ようこそ {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}さん</span></h1>
  <section class="sm:w-192">
    <x-title subtitle="STUDENT LIST" title="担当生徒一覧" />
    @foreach($students as $student)
    @if (!$loop->last)
    <div class="border-b-2 border-dashed w-80 sm:w-full sm:px-8 pb-16">
      @else
      <div class="w-80 sm:w-full sm:px-8 py-16">
        @endif
        <x-heading name="{{ $studentNames[$student->id] }}" />
        <!-- table -->
        <div class="max-w-4xl mx-auto p-4">
          <div class="grid grid-cols-1 md:grid-cols-7">
            @if($lessons[$student->id])
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">次回指導日</div>
            <div class="col-span-5 border border-gray-300 p-2 sm:p-6">{{ \Carbon\Carbon::parse($lessons[$student->id]->next_lesson_date)->format('n月j日') }}</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">次回授業内容</div>
            <div class="col-span-5 border border-gray-300 p-2 sm:p-6">{{ $lessons[$student->id]->next_lesson }}</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">宿題</div>
            <div class="col-span-5 border border-gray-300 p-2 sm:p-6">
              <ul>
                @foreach($homework[$student->id] as $work)
                <li class="mb-2">
                  {{ $work->homework }}
                </li>
                @endforeach
              </ul>
            </div>
            @else
            <div class="col-span-2 border border-gray-300 p-4 sm:p-6 bg-custom-blue font-bold">次回指導日</div>
            <div class="col-span-5 border border-gray-300 p-4 sm:p-6">指導日を追加してください</div>
            @endif
          </div>
        </div>
        <!-- /table -->
        <!-- button -->
        <div class="container px-5 py-4 mx-auto">
          <div class="flex flex-wrap justify-center -m-2">
            <x-page-transition name="詳細" href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $student->id]) }}" />
          </div>
        </div>
        <!-- /button -->
      </div>
      @endforeach
  </section>
</x-teacher-layout>