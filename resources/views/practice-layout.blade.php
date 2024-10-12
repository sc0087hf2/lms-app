<x-app-layout>
  <div class="bg-white">
    <main class="max-w-4xl mx-auto my-8 px-4">
      <x-title subtitle="SEARCH WORDS" title="英単語を探す" />
      <!-- 検索フォーム -->
      <div class="relative w-72 mx-auto mb-8">
        <form action="" method="GET" class="flex">
          <input
            type="text"
            name="search"
            class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="英単語を入力"
            value="">
          <button
            type="submit"
            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
            </svg>
          </button>
        </form>
      </div>
      <!-- 検索結果 -->
      <div class="mb-16">
        <div class="flex mb-2">
          <x-icons.words />
          <p class="font-bold flex items-center ml-4">検索結果</p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="grid grid-cols-4 gap-0">
            <div class="col-span-4 border-2 border-gray-200 bg-custom-blue2 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="text-xl">one</p>
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">意味</p>
            </div>
            <div class="col-span-3 sm:col-span-1 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">1つ、1人</p>
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">品詞</p>
            </div>
            <div class="col-span-3 sm:col-span-1 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">名詞</p>
            </div>
            <div class="col-span-1 border-2 border-gray-200 bg-custom-blue p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">例文</p>
            </div>
            <div class="col-span-3 border-2 border-gray-200 p-2 font-bold  flex flex-col items-center justify-center">
              <p class="p-1">He's one of the Founding Fathers of America.</p>
              <p class="p-1">彼はアメリカ建国の父の1人です</p>
            </div>
          </div>
        </div>
      </div>
      <!-- 品詞一覧 -->
      <div class="mb-16">
        <div class="flex mb-2">
          <x-icons.tag />
          <p class="font-bold flex items-center ml-4">品詞から探す</p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">目標の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">目標の編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">ToDoの追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">ToDoの編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">授業の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">授業の編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">宿題の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">宿題の編集</p>
            </div>
          </div>
        </div>
      </div>
      <!-- 教科書一覧 -->
      <div class="mb-8">
        <div class="flex mb-2">
          <x-icons.textbook />
          <p class="font-bold flex items-center ml-4">教科書から探す</p>
        </div>
        <div class="max-w-4xl mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">目標の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">目標の編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">ToDoの追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">ToDoの編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">授業の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">授業の編集</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">宿題の追加</p>
            </div>
            <div class="border-2 border-gray-200 p-2 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
              <p class="p-2">宿題の編集</p>
            </div>
          </div>
        </div>
      </div>



    </main>
    <!-- bg-white -->
</x-app-layout>