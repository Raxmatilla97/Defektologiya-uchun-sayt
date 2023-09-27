<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Xabar (Yangilik va E'lon) tahrirlash sahifasi") }}
        </h2>
    </x-slot>

    @push('styles')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
    </style>
    @endpush

      <!-- This is an example component -->
    <div class="max-w-5xl mx-auto bg-white p-16 mt-6">
       
        {{-- <div class="flex  w-full bg-blue-400 justify-center items-center">
            <img class="" src="{{ asset('/assets/images/news2.gif')}}" alt="">
          </div> --}}
        
        <h2 class="text-4xl text-center mt-8 font-extrabold dark:text-white">Formani tahrirlang!</h2>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
        <form class="mt-5" action="{{ route('dashboard.newsAndEventsEditStore')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf 
        @method('post')   

        <input type="text" name="id" value="{{$edit_info->id}}" style="opacity: 0;">
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Xabar sarlavhasi nomlanishi</label>
            <input type="text" id="title" name="title" value="{{ old('title', $edit_info->title )}}" placeholder="Yangilik yoki e'lon nomini yozing.." class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div> 
        <div class=" mb-6 lg:grid-cols-2">
           
            <div>
                <label for="news_or_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Xabar turini tanlang</label>
                <select id="news_or_event" name="news_or_event" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option  selected value="news" {{ old('news_or_event',  $edit_info->news_or_event) === 'news' ? 'selected' : '' }}>Yangilik</option>
                    <option value="event" {{ old('news_or_event',  $edit_info->news_or_event) === 'event' ? 'selected' : '' }}>E'lon</option>
                </select>
            </div>
          
            
        </div>
        <div class="mb-6">
            <div>
            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Yangilik haqida to'liq yozing (CTRL + SHIFT + F)</label>
            <div id="toolbar-container"></div>
         
            <textarea id="content" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kurs maqsadi va nimalarni o'rgatishi mumkinligi haqida...." style="min-height: 600px;" >{{ old('desc', $edit_info->desc) }}</textarea></div>
                  
        </div> 
  
        @include('site-pages.pages.dashboard.tinyeditor')
        
         
        <div class="mb-6">
            <label for="image-upload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Xabar sarlavha suratini yuklash</label>
            <input type="file" name="image" value="{{ $edit_info->image }}" id="image-upload" accept="image/*">
          </div> 
      
          <div id="image-preview">
            @if ($edit_info->image)
              <img src="{{'/storage'}}/{{ $edit_info->image }}" alt="Image Preview">
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
                <input id="status" type="checkbox" name="status" value="1" {{ (old('status') || $edit_info->status) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">              </div>
              <label for="status" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-400">Formada barcha ma'lumotlar tog'ri va xabarni ko'rsatishga tayyor</label>
          </div>
        <div class="flex justify-center">
            <button type="submit" class="text-white transition  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mx-auto mr-2 mb-8">Xabarni yaratish</button>
        </div>

    </div>
</x-app-layout>