<x-admin-layout>
  <section class="text-gray-600 body-font relative">
    <!-- パンくずリスト -->
    <nav class="flex m-4 sm:m-8" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="{{ route('admin.top') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            ホーム
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <a href="{{ route('admin.students.index') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">生徒一覧</a>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">生徒追加</span>
          </div>
        </li>
      </ol>
    </nav>
    <div class="container px-5 py-8 mx-auto">
      <div class="flex flex-col text-center w-full mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">生徒　追加</h1>
      </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('admin.students.store') }}" class="flex flex-wrap -m-2">
          @csrf
          <!-- ユーザー名選択 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="user_id" class="leading-7 text-sm text-gray-600">ユーザーの選択（必須）</label>
              <select id="user_id" name="user_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="" disabled {{ old('user_id') === null ? 'selected' : '' }}>選択してください</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->last_name }} {{ $user->first_name }}</option>
                @endforeach
              </select>
            </div>
            @error('user_id')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 先生選択 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="teacher_id" class="leading-7 text-sm text-gray-600">先生の選択（必須）</label>
              <select id="teacher_id" name="teacher_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="" disabled {{ old('teacher_id') === null ? 'selected' : '' }}>選択してください</option>
                @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->user->last_name }} {{ $teacher->user->first_name }}</option>
                @endforeach
              </select>
            </div>
            @error('teacher_id')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 保護者名 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="guardian" class="leading-7 text-sm text-gray-600">保護者名（必須）</label>
              <input type="text" id="guardian" name="guardian" value="{{ old('guardian') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('guardian')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 連絡先 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="phone_number" class="leading-7 text-sm text-gray-600">連絡先</label>
              <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('phone_number')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 学校名 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="school" class="leading-7 text-sm text-gray-600">学校名（必須）</label>
              <input type="text" id="school" name="school" value="{{ old('school') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('school')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 学年 -->
          <div class="p-2 mb-2 w-full">
            <div class="relative">
              <label for="school_year" class="leading-7 text-sm text-gray-600">学年（必須）</label>
              <select id="school_year" name="school_year" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <option value="" disabled {{ old('school_year') === null ? 'selected' : '' }}>選択してください</option>
                <option value="中学1年生" {{ old('school_year') == '中学1年生' ? 'selected' : '' }}>中学1年生</option>
                <option value="中学2年生" {{ old('school_year') == '中学2年生' ? 'selected' : '' }}>中学2年生</option>
                <option value="中学3年生" {{ old('school_year') == '中学3年生' ? 'selected' : '' }}>中学3年生</option>
              </select>
            </div>
            @error('school_year')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <!-- 志望校 -->
          <div class="p-2 mb-8 w-full">
            <div class="relative">
              <label for="desired_school" class="leading-7 text-sm text-gray-600">志望校</label>
              <input type="text" id="desired_school" name="desired_school" value="{{ old('desired_school') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            @error('desired_school')
            <div class="alert alert-danger text-red-700">{{ $message }}</div>
            @enderror
          </div>
          <div class="p-4 w-full">
            <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">追加</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</x-admin-layout>