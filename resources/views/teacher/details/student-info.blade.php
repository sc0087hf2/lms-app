<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $student->id]) }}" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="情報詳細" />
    </ol>
  </nav>
  <section class="w-96 sm:w-192 mx-auto">
    <x-title subtitle="STUDENT DETAILS" title="{{ $studentName }} 詳細" />
    <div class="">
      <!-- table -->
      <div class="max-w-4xl mx-auto px-4 my-8">
        <div class="grid grid-cols-1 md:grid-cols-3">
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">氏名</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $studentName }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">担当指導者</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $teacherName }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">学校名</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $student->school }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">学年</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $student->school_year }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">志望校</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $student->desired_school }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">連絡先</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $student->phone_number }}</div>
          <div class="col-span-1 border border-gray-300 p-4 sm:p-8 bg-custom-blue font-bold">保護者</div>
          <div class="col-span-2 border border-gray-300 p-4 sm:p-8">{{ $student->guardian }}</div>
        </div>
      </div>
      <div class="container px-5 py-4 mx-auto mb-8">
        <div class="flex flex-wrap justify-center -m-2">
          <x-page-transition name="生徒編集" href="{{ route('teacher.editStudentInfo', ['studentId' => $student->id]) }}" />
        </div>
      </div>
    </div>
  </section>
</x-teacher-layout>