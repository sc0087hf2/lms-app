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
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">家庭教師LMS（Learning Management System）とは、生徒の<strong class="border-b-2 border-yellow-500">目標管理</strong>や<strong class="border-b-2 border-yellow-500">学習進捗の管理</strong>、さらに<strong class="border-b-2 border-yellow-500">授業や宿題として使えそうな教材</strong>（作成中）を提供するシステムです。生徒の学習効果を高め、授業を円滑に進めるために作成しました。</p>
  </section>
  <section class="mb-24">
    <x-title subtitle="GOAL SETTING AND PROGRESS FLOW" title="目標設定・進捗管理の流れ" />
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">目標の設定から細分化された目標に対する授業や宿題の進捗管理、そして振り返りのサイクルを通じて、学習の定着と成果の向上に貢献します。</p>
    <div class="sm:ml-12 sm:mb-12">
      <x-icons.goal-management />
      <x-icons.goal-management-sm />
    </div>
    <div class="sm:mx-4">
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">①</span><strong class="bg-custom-gradient2">目標の設定</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base font-normal">まず、達成したいテストの点数や目標を具体的に明確化します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">②</span><strong class="bg-custom-gradient2">目標の細分化（ToDoリスト化）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base font-normal">設定した目標を細かく分けて、必要なタスクを洗い出し、ToDoリストに登録します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">③</span><strong class="bg-custom-gradient2">進捗管理（授業・宿題）</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base font-normal">ToDoリストに基づいて立てた授業や宿題の計画と、実際の進捗状況のズレを把握し、管理します。</p>
      <h2 class="mb-2 font-bold text-base sm:text-xl"><span class="mr-2 text-yellow-500">④</span><strong class="bg-custom-gradient2">振り返り</strong></h2>
      <p class="mb-8 mx-8 sm:mx-12 text-base font-normal">テスト後に取り組みを振り返ります。良かった点や問題点を客観的に捉え、その後の学習に活かします。</p>
    </div>
  </section>
  <!-- フロー -->
  <section class="">
    <x-title subtitle="SYSTEM FUNCTIONS" title="目標設定・進捗管理の追加および編集について" />
    <p class="sm:ml-8 sm:mb-4 text-base font-normal">目標設定や進捗管理は「ホーム > 生徒詳細画面」から行うことができます。生徒詳細画面で目標、ToDo、授業、宿題を追加・編集できる条件は以下の通りです。</p>
    <!-- table -->
    <div class="max-w-4xl mx-auto px-4 my-8">
      <div class="grid grid-cols-1 sm:grid-cols-4">
        <div class="sm:col-span-4 border border-gray-300 p-4 bg-custom-blue2 font-bold hidden md:block">目標の設定</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">目標の追加</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">取り組んでいる目標がない場合、新たな目標を追加できます。目標に対する取り組みが終わったら、「目標達成」ボタンを押すことで、新しい目標を追加することができます。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">目標の編集</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">現在進行中の目標を編集できます。また取り組み終了後の「振り返り」は、目標の編集から行います。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">ToDoの追加</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">進行中の目標に対して、ToDoを追加できます。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">ToDoの編集</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">すでに設定されたToDoは、ToDo一覧から編集できます。</div>
        <div class="sm:col-span-4 p-4 font-bold hidden md:block"></div>
        <div class="sm:col-span-4 border border-gray-300 p-4 bg-custom-blue2 font-bold hidden md:block">進捗の管理</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">授業の追加</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">いつでも授業を追加できます。授業や宿題に対するフィードバックもここから追加します。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">授業の編集</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">最新の授業日について編集できます。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">宿題の追加</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal">最新の授業日に対して宿題を追加できます。</div>
        <div class="sm:col-span-1 border border-gray-300 p-4 bg-custom-blue font-bold">宿題の編集</div>
        <div class="sm:col-span-3 border border-gray-300 p-4 font-normal"> 最新の授業日に対する宿題を編集できます。</div>
      </div>
    </div>
    <p class="sm:ml-8 sm:mb-4 text-base font-normal">「目標、ToDo、授業、宿題」の編集は、メニューの各項目を選択して行うこともできます。

    </p>
  </section>
</x-teacher-layout>