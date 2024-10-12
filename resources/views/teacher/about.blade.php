<x-teacher-layout>
  <section class="mb-24">
    <x-title subtitle="ABOUT" title="家庭教師LMSについて" />
    <p class="ml-8 sm:mb-8 text-base sm:text-lg">家庭教師LMS（Learning Management System）とは、生徒の学習進捗を管理するシステムです。</p>
    <div class="sm:ml-12 sm:mb-12">
      <x-icons.goal-management />
      <x-icons.goal-management-sm />
    </div>
    <div class="sm:mx-4">
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">①</span><strong class="bg-custom-gradient">目的の設定</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl">達成したいテストの点数などの具体的な目標を明確に定義します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">②</span><strong class="bg-custom-gradient">目標の細分化（= ToDo）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl">設定した目標を達成するために必要なステップやタスクを細分化します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">③</span><strong class="bg-custom-gradient">具体的な行動（= 宿題）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl">細分化したタスクに対して、具体的な行動（宿題）を立てます。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">④</span><strong class="bg-custom-gradient">取り組みの振り返り</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl">テスト後や宿題などの取り組みに関して、振り返ります。</p>
    </div>
  </section>
  <x-title subtitle="GOAL MANAGEMENT" title="業務プロセス（目標・進捗管理）" />
  <!-- フロー -->
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex flex-wrap">
      <div class="flex relative pt-10 pb-10 sm:items-center">
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
      <div class="flex relative pt-10 pb-10 sm:items-center mx-auto">
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
      <div class="flex relative pt-10 pb-20 sm:items-center mx-auto">
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
      <div class="flex relative pb-20 sm:items-center mx-auto">
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
  <x-title subtitle="TEACHING MATERIALS" title="教材" />
  <!-- フロー -->
</x-teacher-layout>