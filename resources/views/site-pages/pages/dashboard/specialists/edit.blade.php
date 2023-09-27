<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Foydalanuvchini ma'lumotlarini tahrirlash sahifasi") }}
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
       
        <div class="flex  w-full  justify-center items-center">
            <img class="w-[200px] " src="{{ asset('/assets/images/Avatar-Maker.png')}}" alt="">
          </div>
        
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
        {{-- @if($hwo == "spec")

        @else

        @endif --}}
        <form class="mt-5" action="{{ route('dashboard.specialistUpdate')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf 
        @method('post')   
        <input type="text" name="specialist_id" value="{{$old_data->id}}" style="opacity: 0;">
        <input type="text" name="method_info" value="edit" style="opacity: 0;">
        <div class="grid gap-6 mb-6 lg:grid-cols-2">
            <div>
              <label for="fish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mutaxasis Ism Sharifi</label>
              <input type="text" id="fish" name="fish" value="{{ old('fish', ($old_data ? $old_data->fish : null)) }}" placeholder="F.I.SH" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
           
            <div>
                <label for="lavozim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis lavozimi</label>
                <input type="text" id="lavozim" value="{{ old('lavozim', ($old_data ? $old_data->lavozim : null))}}" name="lavozim" placeholder="O'qituvchi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>  
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis Email pochtasi</label>
                <input type="email" id="email" name="email" value="{{ old('email', ($old_data ? $old_data->email : null))}}" placeholder="test@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis telefon manzili</label>
                <input type="text" id="phone" value="{{ old('phone', ($old_data ? $old_data->phone : null))}}" name="phone" placeholder="+9989*000-00-00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
                     
            <div>
                <label for="tg_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis Telegram akkounti</label>
                <input type="text" id="tg_follow" value="{{ old('tg_follow', ($old_data ? $old_data->tg_follow : null))}}" name="tg_follow" placeholder="Instagram akkount bo'lsa agr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>

            <div>
                <label for="insta_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis Instagram akkounti</label>
                <input type="text" id="insta_follow" value="{{ old('insta_follow', ($old_data ? $old_data->insta_follow : null))}}" name="insta_follow" placeholder="Instagram akkount bo'lsa agr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>

            <div>
                <label for="facebook_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxasis Facebook akkounti</label>
                <input type="text" id="facebook_follow" value="{{ old('facebook_follow', ($old_data ? $old_data->facebook_follow : null))}}" name="facebook_follow" placeholder="Facebook akkount bo'lsa agr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>

            <div>
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ro'yxatdan o'tgan foydalanuvchini tanlang</label>
                <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option  selected value="" {{ old('user_id') === '' ? 'selected' : '' }}>Tanlang</option>
                    @if($hwo == "spec")
                      
                            @if ($old_data->user_id)
                                <option value="{{$old_data->user->id}}" {{ old('user_id', ($old_data ? $old_data->user_id : null)) === $old_data->user_id ? 'selected' : '' }}>{{$old_data->fish}}</option>
                            @endif
                     
                    @else
                        @foreach($user as $item)
                            @if (!$item->specialist)
                                <option value="{{$item->id}}" {{ old('user_id', ($old_data ? $old_data->user_id : null)) === $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
          
        </div>

        <div class="mb-6">
            <div>
            <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Proyekt haqida to'liq yozing</label>
            <textarea id="editor" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Proyekt maqsadi va nimalar haqida bo'lishi mumkinligi haqida...." style="height: 350px;" >{{ old('desc', ($old_data ? $old_data->desc : null)) }}</textarea></div>
        </div> 
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ),{    
                  
                    image: {
                                toolbar: [ 'toggleImageCaption', 'imageTextAlternative' ]
                            },              
                    ckfinder: {
                        uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
                    }
                })
                .catch( error => {
                    
                } );
        </script>
        
        <div class="mb-6">
            <label for="image-upload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Proyekt sarlavha suratini yuklash</label>
            <input type="file" name="image" id="image-upload" accept="image/*">
            @if(!$errors->has('image') && $old_data->image)
                <input type="hidden" name="image" value="{{ $old_data->image }}">
            @endif
        </div> 

      
        <div id="image-preview">
            @if ($old_data->image)
              <img src="{{'/storage'}}/{{ $old_data->image }}" alt="Image Preview">
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
            <input id="lvl" type="checkbox"  value="1" {{ (old('lvl') || $old_data ? $old_data->lvl : null) ? 'checked' : '' }} name="lvl" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" >
            </div>
            <label for="lvl" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-400">Ushbu mutaxasisni bosh sahifada birinchilardan ko'rsatish (Ixtiyoriy)</label>
        </div>
        <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
            <input id="status" type="checkbox" name="status" value="1" {{ (old('status') || $old_data ? $old_data->status : null) ? 'checked' : '' }} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" >
            </div>
           
            <label for="status" class="ml-2 text-md font-medium text-gray-900 dark:text-gray-400">Formada barcha ma'lumotlar tog'ri va ma'lumotlar ko'rsatishga tayyor</label>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="text-white transition  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mx-auto mr-2 mb-8">Mutaxasis yaratish</button>
        </div>

    </div>
</x-app-layout>