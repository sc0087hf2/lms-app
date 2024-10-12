<x-student-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="過去授業一覧" />
    </ol>
  </nav>

  <section class="w-96 sm:w-176 mx-auto">
    <x-title subtitle="LIST OF LESSONS" title="{{ $studentName }} 授業一覧" />
    @if(isset($lessons))
    @foreach($lessons as $lesson)
    @if(!$loop->last)
    <div class="pb-12 my-12 border-b-2 border-dashed">
      @else
      <div class="mb-4">
        @endif
        <x-heading name="授業日  {{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}" />
        <!-- table -->
        <div class="max-w-4xl mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">授業日</div>
            <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ \Carbon\Carbon::parse($lesson->lesson_date)->format('n月j日') }}</div>
            <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">授業内容</div>
            <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $lesson->lesson }}</div>
            <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">宿題</div>
            <div class="col-span-2 border border-gray-300 p-4 sm:p-8">
              <ul>
                @if(isset($homework))
                @foreach($homework as $work)
                <li></li>
                @endforeach
                @endif
              </ul>
            </div>
            <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">指導者より</div>
            <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $lesson->teacher_comment }}</div>
            <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">自己フィードバック</div>
            <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $lesson->student_comment }}</div>
          </div>
        </div>
        <div class="container mt-2 px-5 py-4 mx-auto">
          <div class="flex flex-wrap justify-center -m-2">
            @if($lesson->student_comment)
            <x-page-transition name="フィードバックを編集する" href="{{ route('student.comments.editLessonComment', ['lessonId' => $lesson->id]) }}" />
            @else
            <x-page-transition name="フィードバックする" href="{{ route('student.comments.addLessonComment', ['lessonId' => $lesson->id]) }}" />
            @endif
          </div>
        </div>
      </div>
      <!-- ページネーション -->
      <div class="py-6">
        {{ $lessons->links('pagination::default') }}
      </div>

      @endforeach
      @else
      <p class="mt-16 text-center text-2xl">授業が登録されていません。</p>
      @endif
  </section>
  </x-teacher-layout>