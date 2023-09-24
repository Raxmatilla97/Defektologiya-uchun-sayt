<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kurs yaratish sahifasi') }}
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
        <img src="{{ asset('/assets/images/vid-cm.gif')}}" alt="">
        
        <h2 class="text-4xl text-center mt-8 font-extrabold dark:text-white">Ma'lumotlarni tahrirlang!</h2>
      
        @if ($errors->any())
          <div class="bg-red-500 text-white p-4 mb-4 mt-4">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
          <form class="mt-5" action="{{ route('dashboard.coursesStoreEdit')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
          @csrf 
          @method('post')
          <input type="text" name="id" value="{{$editCourse->id}}" style="opacity: 0;">
          <input type="text" name="image_old" value="{{$editCourse->image}}" style="opacity: 0;">
          <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurs nomlanishi</label>
            <input type="text" id="title" name="title" value="{{ old('title', $editCourse->title) }}" placeholder="Kurs nomini yozing.." class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div> 
          <div class="grid gap-6 mb-6 lg:grid-cols-2">
              <div>
                <label for="narxi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurs narxi</label>
                <input type="text" id="narxi" name="narxi" value="{{ old('narxi', $editCourse->narxi) }}" placeholder="Bepul, 120000 so'm" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              </div>
              <div>
                <label for="kurs_tili" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kurs tili</label>
                <select id="kurs_tili" name="kurs_tili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option  selected value="uzbek_tilida" {{ old('kurs_tili', $editCourse->kurs_tili) === 'uzbek_tilida' ? 'selected' : '' }}>O'zbek tilida</option>
                    <option value="rus_tilida" {{ old('kurs_tili' , $editCourse->kurs_tili) === 'rus_tilida' ? 'selected' : '' }}>Rus tilida</option>
                </select>
            </div>
              <div>
                  <label for="davomiylik_vaqti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Davomiylik vaqti</label>
                  <input type="text" id="davomiylik_vaqti" value="{{ old('davomiylik_vaqti', $editCourse->davomiylik_vaqti) }}" name="davomiylik_vaqti" placeholder="12 soat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              </div>  
              <div>
                  <label for="youtube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Youtubedan asosiy video</label>
                  <input type="text" id="youtube" name="youtube" value="https://www.youtube.com/watch?v={{ old('youtube', $editCourse->youtube) }}" placeholder="https://www.youtube.com/" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
              </div>
            
          </div>
          <div class="mb-6">
            <div>
              <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kurs haqida to'liqroq yozing</label>
              <textarea id="desc" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kurs maqsadi va nimalarni o'rgatishi mumkinligi haqida...." style="height: 350px;" required>{{ old('desc', $editCourse->desc) }}</textarea></div>
          </div> 
          
          <div class="mb-6">
            <label for="image-upload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kursni sarlavha suratini yuklash</label>
            <input type="file" name="image" value="{{ $editCourse->image }}" id="image-upload" accept="image/*">
          </div> 
      
          <div id="image-preview">
            @if ($editCourse->image)
              <img src="{{'/storage'}}/{{ $editCourse->image }}" alt="Image Preview">
            @endif
          </div>
      
      
          <script>
            const imageUpload = document.getElementById('image-upload');
            const imagePreview = document.getElementById('image-preview');
          
            imageUpload.addEventListener('change', function() {
              const file = imageUpload.files[0];
              const reader = new FileReader();
          
              reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                imagePreview.innerHTML = '';
                imagePreview.appendChild(img);
              }
          
              reader.readAsDataURL(file);
            });
          </script>
      
      
          <style>
            #image-preview {
              display: flex;
              justify-content: center;
              align-items: center;
              max-height: 30%;
            }
            
            #image-preview img {
              max-height: 200px;
              width: auto;
            }
          </style>    
          <hr class="mt-3 mb-5">
          <div class="flex items-start mb-6">
              <div class="flex items-center h-5">
                <input id="status" type="checkbox" name="status" value="1" {{ (old('status') || $editCourse->status) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">              </div>
              <label for="status" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-400">Formada barcha ma'lumotlar tog'ri va kurs ko'rsatishga tayyor</label>
          </div>
          <div class="flex justify-center">
            <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mx-auto mr-2 mb-8">Kurs yaratish</button>
          </div>
        
      
        <div class="flex p-4 mb-6 text-sm  rounded-lg " role="alert" style="background-color: #2d80fb; color: #fff">
          <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-medium">Kursni yaratganingizdan keyin shu sahifaga qaytishiz mumkin!</span>
              <ul class="mt-1.5 ml-4 list-disc list-inside">
                <li>Sizga video darslarni yuklash sahifasiga o'tish uchun tugma paydo bo'ladi.</li>        
                <li>Sahifaga o'tganizdan so'ng video darslarni yarata boshlaysiz.</li>
            </ul>
            <div class="mt-4">
                <a href="{{ route('dashboard.addVideoDarslar', $editCourse->slug)}}"><button type="button" class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                    <svg class="w-4 h-4 mr-2 -ml-1 text-[#626890]" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="ethereum" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M311.9 260.8L160 353.6 8 260.8 160 0l151.9 260.8zM160 383.4L8 290.6 160 512l152-221.4-152 92.8z"></path></svg>
                    Video Darslarni Qo'shishingiz Mumkin
                  </button>  
                </a>   
            </div>
              
            
            </div>
        
      
      </div>
</x-app-layout>