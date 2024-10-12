<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="作成中…" />
    </ol>
  </nav>
  <div class="flex justify-center items-center">
    <div class="mt-20">
      <x-icons.sorry />
    </div>
  </div>
  <p class="text-center mt-20">ただいま鋭意制作中です。完成まで、しばしお待ちを。</p>
  </x-teacher-layout>