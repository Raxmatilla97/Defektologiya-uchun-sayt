<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Kursni ko'rish uchun yuborilgan so'rov haqida") }}
        </h2>
    </x-slot>

    
    @if(session('name'))
    <div class="bg-green-500 mt-4 text-white font-bold px-4 py-2 rounded-md">                               
        <p>{{ session('name') }}ning arizasi o'zgartirildi!</p>
    </div>
    @endif  

    @if (session()->has('status'))
    <div id="alert-border-3" class="flex items-center p-4 mt-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ml-3 text-sm font-medium">
            {{ session()->get('status') }}
        </div>
    
    </div>
@endif


    <div class="max-w-3xl mx-auto bg-white p-16 mt-6">
        {{-- <img src="{{ asset('/assets/images/vid-cm.gif')}}" alt=""> --}}
        
        {{-- <h2 class="text-4xl text-center mt-8 font-extrabold dark:text-white">Ma'lumotlarni tahrirlang!</h2> --}}
      
        @if ($errors->any())
          <div class="bg-red-500 text-white p-4 mb-4 mt-4">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
          <form class="mt-5" action="{{ route('dashboard.requestCourseStore')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
          @csrf 
          @method('post')
         
          <input type="text" name="course_id" value="{{$sorov->course_id}}" style="opacity: 0;">
          <input type="text" name="student_id" value="{{$sorov->student_id}}" style="opacity: 0;">
          <input type="text" name="request_id" value="{{$sorov->id}}" style="opacity: 0;">
          <div class="mb-6">
            <h2 class="text-2xl text-center mt-3 mb-4 font-extrabold dark:text-white">Foydalanuvchi o'rganishni istagan kurs haqida:</h2>
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div style="width: 100%">
                    <a href="{{ route('site.courseSingle', $sorov->course->slug)}}"><p class="font-bold" style="font-size: 18px">Kurs nomi: {{$sorov->course->title}}</p></a>
                    <hr style="width: 100%; border: 1px solid rgb(85, 81, 81);">
                    <p class="text-sm mt-2 mb-2">Muallif haqida: {{$sorov->course->specialist->fish}}</p>                  
                    <hr>
                    <p class="text-sm mt-2 mb-2">Kurs narxi: {{$sorov->course->narxi}}</p>
                    <hr>
                    <p class="text-sm mt-2 mb-2">Video darslar soni: {{$sorov->course->videolar->count()}} ta</p>
                  </div>
                </div>
              </div>
          </div> 
          <div class="mb-6" >
            <h2 class="text-2xl text-center mt-3 mb-4 font-extrabold ">Foydalanuvchi haqida:</h2>
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div style="width: 100%">
                    <p class="font-bold" style="font-size: 18px">{{$sorov->user->name}}</p>
                    <hr style="width: 100%; border: 1px solid rgb(85, 81, 81);">
                    <p class="text-sm mt-2 mb-2">Telefon raqami: {{$sorov->user->phone}}</p>                  
                    <hr>
                    <p class="text-sm mt-2 mb-2">Email pochtasi: {{$sorov->user->email}}</p>
                   
                  </div>
                </div>
              </div>
          </div> 
          <div class="mb-8" style="margin-bottom: 100px">
            <div>
                <label for="sorov_holati" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Arizani holati</label>
                <select id="sorov_holati" name="sorov_holati" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option  selected value="tekshirilmoqda" {{ old('sorov_holati', $sorov->sorov_holati) === 'tekshirilmoqda' ? 'selected' : '' }}>Ariza tekshiruv holatida</option>
                    <option value="maqullandi" {{ old('sorov_holati' , $sorov->sorov_holati) === 'maqullandi' ? 'selected' : '' }}>Arizani maqullash</option>
                </select>
              </div>
            </div>

          <div class="flex justify-center mt-6">
            <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mx-auto mr-2 mb-8">Arizani o'zgartirish</button>
          </div>
        
      
     
</x-app-layout>