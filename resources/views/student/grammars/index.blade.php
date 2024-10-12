<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
      <x-breadcrumb-list-last name="文法一覧" />
    </ol>
  </nav>
  <x-title subtitle="GRAMMAR" title="文法" />
  <div class="mb-8">
    <div class="flex mb-2">
      <x-icons.textbook />
      <p class="font-bold flex items-center ml-4">中学1年</p>
    </div>
    <div class="max-w-4xl mx-auto mb-8">
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">be動詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">一般動詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">疑問詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">命令文</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">三人称単数現在形のs</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">現在進行形</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">can</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">一般動詞の過去</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">名詞の複数形</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">代名詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">be動詞の過去</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">過去進行形</p>
        </a>
      </div>
    </div>
    <div class="flex mb-2">
      <x-icons.textbook />
      <p class="font-bold flex items-center ml-4">中学2年</p>
    </div>
    <div class="max-w-4xl mx-auto mb-8">
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">未来</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">動名詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">不定詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">助動詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">比較</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">there is</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">接続詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">受け身</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">現在完了形（継続）</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">現在完了形（経験）</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">現在完了形（完了）</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">現在完了進行形</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">不定詞2</p>
        </a>
      </div>
    </div>
    <div class="flex mb-2">
      <x-icons.textbook />
      <p class="font-bold flex items-center ml-4">中学3年</p>
    </div>
    <div class="max-w-4xl mx-auto mb-8">
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">原形不定詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">分詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">間接疑問</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">関係代名詞1</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">関係代名詞2</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">仮定法</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">形容詞</p>
        </a>
        <a href="{{ route('student.sorry') }}" class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <p class="p-2">不定詞</p>
        </a>
      </div>
    </div>
  </div>
</x-student-layout>