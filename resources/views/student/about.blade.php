<x-student-layout>
  <nav class="flex mt-2 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('student.top') }}" />
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
    <x-title subtitle="TEACHING MATERIALS" title="教材について" />
    <p class="sm:ml-8 sm:mb-4 text-base sm:text-lg font-normal">教材はホーム画面の「コンテンツ一覧」にあります。（現在作成中です。教材は単語→単語検索のみ使うことができます。単語検索は中学生レベルの単語のみヒットします。）</p>

  </section>
</x-student-layout>