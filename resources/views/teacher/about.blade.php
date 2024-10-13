<x-teacher-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-last name="家庭教師LMS" />
    </ol>
  </nav>
  <h1 class="my-16 p-4 text-center text-blue-500 text-2xl sm:text-4xl font-bold"><span class="border-b-4 border-gray-200">家庭教師LMS</span></h1>
  <section class="mb-24">
    <x-title subtitle="ABOUT" title="家庭教師LMSについて" />
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">家庭教師LMS（Learning Management System）とは、生徒の目標管理や学習進捗を管理するシステムです。生徒の学習効果を高め、授業を円滑に進めるために作成しました。</p>
  </section>
  <section class="mb-24">
    <x-title subtitle="GOAL AND PROGRESS MANAGEMENT" title="目標・進捗管理の流れ" />
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">目標の設定から目標の細分化、具体的な行動、そして振り返りのサイクルをすることで、学習の定着と成果向上に貢献します。</p>
    <div class="sm:ml-12 sm:mb-12">
      <x-icons.goal-management />
      <x-icons.goal-management-sm />
    </div>
    <div class="sm:mx-4">
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">①</span><strong class="bg-custom-gradient">目的の設定</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl font-normal">達成したいテストの点数などの具体的な目標を明確に定義します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">②</span><strong class="bg-custom-gradient">目標の細分化（= ToDoリスト化）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl font-normal">設定した目標を達成するために必要なステップやタスクを細分化します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">③</span><strong class="bg-custom-gradient">具体的な行動（= 授業・宿題）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl font-normal">ToDoに対して、授業や宿題の計画を立てます。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">④</span><strong class="bg-custom-gradient">取り組みの振り返り</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base sm:text-xl font-normal">授業後や宿題の取り組みに関する振り返り、及びテスト後に全体の取り組みを振り返ります。</p>
    </div>
  </section>
  <!-- フロー -->
  <section class="">
    <x-title subtitle="SYSTEM FUNCTIONS" title="目標・進捗管理の追加・編集について" />
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">目標や進捗の管理は、生徒の詳細画面から行えます。生徒詳細画面で目標、ToDo、授業、宿題の追加、編集ができる条件は以下の通りです。</p>
    <!-- table -->
    <div class="max-w-4xl mx-auto px-4 my-8">
      <div class="grid grid-cols-1 md:grid-cols-4">
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">目標の追加</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">取り組んでいる目標がないときに目標を追加することができます。目標に対しての取り組みが終わったら、「目標達成」ボタンを押すことで、新たに目標を追加することができます。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">目標の編集</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">現在進行中の目標を編集できます。また取り組み終了後の振り返りは、目標の編集から行います。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">ToDoの追加</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">進行中の目標に対して、ToDoを追加できます。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">ToDoの編集</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">すでに設定されたToDoは、ToDo一覧から編集できます。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">授業の追加</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">いつでも授業を追加できます。授業・宿題のフィードバックはここから追加します。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">授業の編集</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">最新の授業日に関して編集することができます。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">宿題の追加</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">最新の授業日に対して宿題を追加することができます。</div>
        <div class="col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">宿題の編集</div>
        <div class="col-span-3 border border-gray-300 p-4 font-normal">最新の授業日の宿題に対しての宿題を編集することができます。</div>
      </div>
    </div>
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">目標、ToDo、授業、宿題の編集は、サイドバーから各項目を選択して行うこともできます。

    </p>
  </section>
</x-teacher-layout>