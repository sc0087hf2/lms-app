<x-teacher-layout>
  <!-- パンくずリスト -->
  <nav class="flex mt-2 sm:ml-32 mb-4 sm:mb-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <x-breadcrumb-list-home href="{{ route('teacher.top') }}" />
      <x-breadcrumb-list-middle href="{{ route('teacher.showGoalProgressForStudent', ['studentId' => $student->id] }]" name="{{ $studentName }}" />
      <x-breadcrumb-list-last name="宿題" />
    </ol>
  </nav>
  <div class="container px-5 py-8 mx-auto">
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $studentName }}　編集</h1>
    </div>
    <div class=" w-full sm:w-3/5 mx-auto">
      <form method="POST" action="{{ route('teacher.updateStudentInfo', ['studentId' => $student->id]) }}" class="flex flex-wrap -m-2">
        @csrf
        <!-- 保護者名 -->
        <div class="p-2 mb-2 w-full">
          <div class="relative">
            <label for="guardian" class="leading-7 text-sm text-gray-600">保護者名（必須）</label>
            <input type="text" id="guardian" name="guardian" value="{{ is_null(old('guardian')) ? $student->guardian : old('guardian') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          @error('guardian')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
        </div>
        <!-- 連絡先 -->
        <div class="p-2 mb-2 w-full">
          <div class="relative">
            <label for="phone_number" class="leading-7 text-sm text-gray-600">連絡先</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ is_null(old('phone_number')) ? $student->phone_number : old('phone_number') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          @error('phone_number')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
        </div>
        <!-- 学校名 -->
        <div class="p-2 mb-2 w-full">
          <div class="relative">
            <label for="school" class="leading-7 text-sm text-gray-600">学校名（必須）</label>
            <input type="text" id="school" name="school" value="{{ is_null(old('school')) ? $student->school : old('school') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          @error('school')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
        </div>
        <!-- 学年 -->
        <div class="p-2 mb-2 w-full">
          <div class="relative">
            <label for="school_year" class="leading-7 text-sm text-gray-600">学年（ドロップダウン）</label>
            <select id="school_year" name="school_year" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <option value="" disabled {{ is_null(old('school_year', $student->school_year)) ? 'selected' : '' }}>選択してください</option>
              <option value="中学1年生" {{ old('school_year', $student->school_year) == '中学1年生' ? 'selected' : '' }}>中学1年生</option>
              <option value="中学2年生" {{ old('school_year', $student->school_year) == '中学2年生' ? 'selected' : '' }}>中学2年生</option>
              <option value="中学3年生" {{ old('school_year', $student->school_year) == '中学3年生' ? 'selected' : '' }}>中学3年生</option>
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
            <input type="text" id="desired_school" name="desired_school" value="{{ is_null(old('desired_school')) ? $student->desired_school : old('desired_school') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
          @error('desired_school')
          <div class="alert alert-danger text-red-700">{{ $message }}</div>
          @enderror
        </div>
        <div class="p-4 w-full">
          <button type="submit" class="flex mx-auto text-white bg-blue-900 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">更新</button>
        </div>
      </form>
    </div>
  </div>
</x-teacher-layout>