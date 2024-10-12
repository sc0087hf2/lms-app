<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="動画を見る" />
    </ol>
  </nav>
  <x-title subtitle="MOVIE" title="動画を見る" />
  <div class="mb-8">
    <div class="flex mb-2">
      <x-icons.textbook />
      <p class="font-bold flex items-center ml-4">NEW BASIC</p>
    </div>
    <div class="max-w-4xl mx-auto">
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <a href="https://www.eduplus.website/ba_qr/en/tou-1.html" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">NEW BASIC 英語1</p>
        </a>
        <a href="https://www.eduplus.website/ba_qr/en/tou-2.html" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">NEW BASIC 英語2</p>
        </a>
        <a href="https://www.eduplus.website/ba_qr/en/tou-3.html" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">NEW BASIC 英語3</p>
        </a>
      </div>
    </div>
  </div>
</x-student-layout>