<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProcessForStudent', ['studentId' => $student->id]) }}" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="詳細情報" />
    </ol>
  </nav>
  <section class="w-80 sm:w-192 mx-auto">
    <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">{{ $studentName }} 情報</span></h1>
    <div class="">
      <!-- table -->
      <div class="max-w-4xl mx-auto py-4 my-8">
        <div class="grid grid-cols-1 md:grid-cols-3">
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">氏名</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $studentName }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">担当指導者</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $teacherName }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">保護者</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $student->guardian }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">学校名</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $student->school }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">学年</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $student->school_year }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">志望校</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $student->desired_school }}</div>
          <div class="col-span-1 border border-gray-300 p-2 sm:p-6 bg-custom-blue font-bold">連絡先</div>
          <div class="col-span-2 border border-gray-300 p-2 sm:p-6 font-normal">{{ $student->phone_number }}</div>
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