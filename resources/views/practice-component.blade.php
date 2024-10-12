<x-app-layout>
  <div class="bg-white">
    <!-- title button -->
    <section class="pb-10">
      <div class="relative h-16">
        <div class="absolute w-56 h-16 bg-white border-2 border-blue-500 rounded-full z-10 flex justify-center items-center">
          <p class="font-bold text-xl text-gray-900">ジョン万次郎</p>
        </div>
        <div class="absolute w-56 h-16 top-2 left-2 bg-blue-900 rounded-full z-0"></div>
      </div>
    </section>

    <!-- table -->
    <div class="max-w-4xl mx-auto p-4">
      <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="col-span-1 border border-gray-300 p-8 bg-custom-blue font-bold">次回指導日</div>
        <div class="col-span-2 border border-gray-300 p-8">10月10日</div>
        <div class="col-span-1 border border-gray-300 p-8 bg-custom-blue font-bold">次回授業内容</div>
        <div class="col-span-2 border border-gray-300 p-8">高校入試の英語長文解説</div>
        <div class="col-span-1 border border-gray-300 p-8 bg-custom-blue font-bold">宿題</div>
        <div class="col-span-2 border border-gray-300 p-8">次回解説する英語長文の内容を解く。</div>
        <div class="col-span-1 border border-gray-300 p-8 bg-custom-blue font-bold">宿題背景</div>
        <div class="col-span-2 border border-gray-300 p-8">現在進行形の問題をすべて正確に解き、その理由を説明できる。</div>
      </div>
    </div>

    <!-- font strong -->
    <div class="text-2xl">
      <p>テストまで残り<strong class="bg-custom-gradient">10日</strong>です</p>
    </div>

    <!-- add/edit -->
    <div class="max-w-4xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.goal-add />
          <p class="mt-4">目標の追加</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.goal-edit />
          <p class="mt-4">目標の編集</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.todo-add />
          <p class="mt-4">ToDoの追加</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.todo-edit />
          <p class="mt-4">ToDoの編集</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.lesson-add />
          <p class="mt-4">授業の追加</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.lesson-edit />
          <p class="mt-4">授業の編集</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.homework-add />
          <p class="mt-4">宿題の追加</p>
        </div>
        <div class="border-2 border-gray-200 p-8 font-bold rounded-lg shadow-lg flex flex-col items-center justify-center">
          <x-icons.homework-edit />
          <p class="mt-4">宿題の編集</p>
        </div>
      </div>
    </div>
    <!-- title -->
    <x-title subtitle="ABOUT" title="家庭教師LMSについて" />
    <!-- パンくずリスト -->
    <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
        <x-breadcrumb-list-middle href="#" name="宿題だよ～" />
        <x-breadcrumb-list-last name="宿題" />
      </ol>
    </nav>


    <!-- table -->
    <div class="overflow-x-auto">
      <table class="min-w-max w-full table-auto">
        <thead>
          <tr>
            <th>名前</th>
            <th>出身地</th>
            <th>好きな言葉</th>
            <th>好きな食べ物</th>
            <th>好きなブランド</th>
            <th>誕生日</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">田中圭</td>
            <td class="text-center">千葉県船橋市</td>
            <td class="text-center">替え玉無料</td>
            <td class="text-center">餃子定食</td>
            <td class="text-center">Nike</td>
            <td class="text-center">10月3日</td>
          </tr>
          <tr>
            <td class="text-center">田中圭</td>
            <td class="text-center">千葉県船橋市</td>
            <td class="text-center">替え玉無料</td>
            <td class="text-center">餃子定食</td>
            <td class="text-center">Nike</td>
            <td class="text-center">10月3日</td>
          </tr>
        </tbody>
      </table>
    </div>

    <hr class="w-full m-16">
    <!-- 検索フォーム -->
    <div class="relative w-64 mx-auto mb-8">
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

    <x-title subtitle="GOAL MANAGEMENT" title="業務プロセス（目標管理）" />
    <!-- フロー -->
    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex relative pt-10 pb-10 sm:items-center md:w-2/3 mx-auto">
          <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-yellow-500 text-white relative z-10 title-font font-medium text-sm">1</div>
          <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
            <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
              <h2 class="font-medium title-font text-gray-900 mb-1 text-xl"><span class="bg-custom-gradient">目標設定</span></h2>
              <p class="leading-relaxed">最初に、どのテストで何点を目指すかを設定し、具体的な目標を決定します。</p>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>目標の追加</h2>
                <p class="leading-relaxed">最初に、どのテストで何点を目指すかを設定し、具体的な目標を決定します。</p>
              </div>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>目標の編集</h2>
                <p class="leading-relaxed">目標の編集は、各生徒の詳細画面またはサイドバーの「目標」メニューから「編集」を選択して行います。</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex relative pt-10 pb-10 sm:items-center md:w-2/3 mx-auto">
          <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-yellow-500 text-white relative z-10 title-font font-medium text-sm">2</div>
          <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
            <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
              <h2 class="font-medium title-font text-gray-900 mb-1 text-xl"><span class="bg-custom-gradient">ToDoのリスト化</span></h2>
              <p class="leading-relaxed">設定した目標を達成するために必要なステップやタスクを細分化して、ToDoリストを作成します。</p>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>ToDoの追加</h2>
                <p class="leading-relaxed">ToDoの追加は、各生徒の詳細画面か、サイドバーの「ToDo一覧」から「ToDoの追加」を選択して行います。一度に最大4つのToDoを登録できます。さらにToDoを追加する場合は、同じ手順で追加してください。
                </p>
              </div>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>ToDoの編集</h2>
                <p class="leading-relaxed">ToDoの進捗管理は、各生徒の詳細画面や取り組み一覧から行います。ToDoが達成されたら、進捗を随時更新してください。内容の編集は、詳細画面またはサイドバーの「ToDo一覧」から「編集」を選択して行えます。
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex relative pt-10 pb-20 sm:items-center md:w-2/3 mx-auto">
          <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-yellow-500 text-white relative z-10 title-font font-medium text-sm">3</div>
          <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
            <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
              <h2 class="font-medium title-font text-gray-900 mb-1 text-xl"><span class="bg-custom-gradient">具体的な行動</span></h2>
              <p class="leading-relaxed">設定したToDoに基づいて授業や宿題を進めます。授業後には、授業内容や宿題に関するフィードバックコメントを登録します。
              </p>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>授業の登録</h2>
                <p class="leading-relaxed">授業の内容や宿題に関するフィードバックは、各生徒の詳細画面の「授業追加」から登録します。また、サイドバーの「授業一覧」からも登録可能です。</p>
              </div>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>授業の編集</h2>
                <p class="leading-relaxed">授業の編集は、各生徒の詳細画面またはサイドバーの「授業一覧」から行います。</p>
              </div>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>宿題の登録</h2>
                <p class="leading-relaxed">宿題の登録は、授業の登録後に行います。各生徒の詳細画面の「宿題追加」から追加してください。
                </p>
              </div>
              <div class="m-4">
                <h2 class="font-medium title-font text-gray-900 mb-1 text-base"><span class="mr-2 text-yellow-500">*</span>宿題の編集</h2>
                <p class="leading-relaxed">宿題の編集は、各生徒の詳細画面またはサイドバーの「宿題一覧」から行えます。
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex relative pb-20 sm:items-center md:w-2/3 mx-auto">
          <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-yellow-500 text-white relative z-10 title-font font-medium text-sm">4</div>
          <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
            <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
              <h2 class="font-medium title-font text-gray-900 mb-1 text-xl"><span class="bg-custom-gradient">フィードバック</span></h2>
              <p class="leading-relaxed">授業やテストの後にフィードバックを行い、進捗状況や改善点についてコメントを提供します。授業後は、目標に向けた進捗を確認し、必要に応じたフィードバックを行います。テスト後は、全体の学習状況を振り返り、さらなる改善に向けたフィードバックを行います。</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- bg-white -->
</x-app-layout>