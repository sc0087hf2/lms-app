<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $studentId]) }}" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="過去授業一覧" />
    </ol>
  </nav>

  <section class="w-80 sm:w-176 mx-auto">
    <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">{{ $studentName }} 授業一覧</span></h1>
    @if(isset($lessons))
    @foreach($lessons as $lesson)
    @if(!$loop->last)
    <div class="pb-12 my-12 border-b-2 border-dashed">
      @else
      <div class="pb-12 mb-12">
        @endif
        <x-heading name="授業日  {{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}" />
        <!-- table -->
        <div class="max-w-4xl mx-auto py-4">
          <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">授業日</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}</div>
            <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">授業内容</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $lesson->lesson }}</div>
            <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">宿題</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6">
              <ul>
                @foreach($homework[$lesson->id] as $work)
                <li class="mb-2 font-normal">・ {{ $work->homework }}</li>
                @endforeach
              </ul>
            </div>
            <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">指導者コメント</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $lesson->teacher_comment }}</div>
            <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">生徒コメント</div>
            <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $lesson->student_comment }}</div>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <p class="mt-16 text-center text-2xl">授業が登録されていません。</p>
      @endif
  </section>
</x-teacher-layout>