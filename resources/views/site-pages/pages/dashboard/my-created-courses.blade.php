<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mening kurslarim sahifasi') }}
        </h2>
    </x-slot>
    @if ($myCourses !== "huquq-yoq")    
    <div class="py-12">       

        <div class="pt-6 pb-12">
            <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" p-6 text-gray-900 dark:text-gray-100">
                        <!-- list -->
                        <section class="container px-4 mx-auto">
                            <div class="flex items-center gap-x-3">
                                {{-- <h2 class="text-lg font-medium text-gray-800 dark:text-white">Tasdiqlash uchun yuborilgan malaka oshirish kurslari soni</h2>
    
                                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{$all_couses_tasdiqlash_kerak }} ta</span> --}}
                               
                            </div>
                            
                        
                            <div class="flex justify-center">
                                <form action="{{ route('dashboard.myCreatedCourses')}}" method="GET" class="flex flex-row flex-wrap">                               
                                  <div class="mb-4 mr-4">
                                    <label for="title" class="block mb-2">Kurs nomi:</label>
                                    <input type="text" id="title"  value="{{ old('title', request()->query('title')) }}" name="title" class="w-full border border-gray-300 p-2" placeholder="Kurs nomi...">
                                  </div>
                                  <div class="mb-4">
                                    <label for="maqullanganlik" class="block mb-2">Holati:</label>
                                    <select id="maqullanganlik" name="maqullanganlik" class="w-full border border-gray-300 p-2">
                                    <option value="" default>Barchasi</option>                                     
                                      <option value="maqullandi" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'maqullandi' ? 'selected' : '' }}>Kurs maqullangan</option>
                                      <option value="rad_etildi" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'rad_etildi' ? 'selected' : '' }}>Kurs rad etilgan</option>
                                      <option value="korilmagan" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'korilmagan' ? 'selected' : '' }}>Kurs tasdiqlanmagan</option>
                                    </select>
                                  </div>
                                  <div class="ml-4 mt-8">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Qidirish</button>
                                  </div>
                                 
                                </form>
                              
                               
                              </div>
                              <div class="flex ml-3 mt-8 justify-end">
                                <a href="{{route('dashboard.createCourses')}}">
                                    <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-xl px-4 py-2 rounded">Yangi kurs qo'shish</button>
                                </a>
                              </div>
                              <style>
                              @media (max-width: 640px) {
                                .flex-wrap {
                                  flex-direction: column;
                                }
                              }
                              </style>

                            <style>
                                .p-2 {
                                    padding: 0.5rem;
                                    width: 300px;
                                }
                            </style>
                            
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
                            
    
                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                           
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <div class="flex items-center gap-x-3">
                                                               
                                                                <span>Kursni tasdiqlagan Admin</span>
                                                            </div>
                                                        </th>
    
                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Kurs holati</span>
                                                            </button>
                                                        </th>
    
                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Video kurs nomi</span>
    
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                </svg>
                                                            </button>
                                                        </th>
    
                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Kurs yaratilgan vaqt</th>
    
                                                   
    
                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                                                                               
                                                    @foreach ($myCourses as $item)
                                                    <tr>
                                                    
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            <div class="inline-flex items-center gap-x-3">  
                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('/assets/images/avatar.png')}}" alt="">
                                                                    <div>
                                                                        <h2 class="font-medium text-gray-800 dark:text-white ">
                                                                            @if ($item->maqullagan)
                                                                            {{ $item->maqullagan->specialist->fish }}
                                                                            @else
                                                                                Hali aniq emas!
                                                                            @endif
                                                                            </h2>
                                                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                            @if ($item->maqullagan)
                                                                            {{ $item->maqullagan->specialist->phone }}
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">          
                                                                                                                                                                  
                                                            @if ($item->maqullanganligi == 'korilmagan')
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-indigo-100/60 dark:bg-indigo-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
                                                                <h2 class="text-sm font-normal text-indigo-500">Kurs ko'rilmagan!</h2>
                                                            </div>
                                                            @elseif ($item->maqullanganligi == "rad_etildi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-red-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                <h2 class="text-sm font-normal text-red-500">Kurs rad etilgan!</h2>
                                                            </div>                                                             
                                                            @elseif ($item->maqullanganligi == "maqullandi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                                <h2 class="text-sm font-normal text-emerald-500">Kurs maqullangan!</h2>
                                                            </div>  
                                                            @endif                                                           
                                                           
                                                        </td>
                                                      
                                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><p class="w-full text-sm font-semibold peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-indigo-600 " >{{ $item->title }}</p></td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-2">
                                                                <p class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">{{ $item->created_at->diffForHumans() }}</p>
                                                              
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-6">
                                                                <form action="{{ route('dashboard.kurslarDeleteDashboard', $item->id)}}" method="POST"                                                                
                                                                    style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button  onclick="event.preventDefault(); openModal()" type="button" class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                        </svg>
                                                                    </button>
    
                                                                    <div id="modal" class="fixed inset-0 flex items-center justify-center  hidden">
                                                                        <!-- Modal backdrop -->
                                                                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>                                                                    
                                                                        <!-- Modal content -->
                                                                        <div class="bg-white p-6 rounded shadow-lg z-0">
                                                                            <p class=" text-xl text-center">Arizani o'chirishni <br> istaysizmi?</p>
                                                                            <div class="flex justify-end mt-4">
                                                                                <button type="submit" class="px-4 py-2 text-white bg-red-700 rounded" >O'chirish</button>
                                                                                <button type="button" class="px-4 py-2 text-gray-500 rounded ml-4" onclick="closeModal()">Yopish</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <script>
                                                                        function openModal() {
                                                                            document.getElementById('modal').classList.remove('hidden');
                                                                        }
                                                                    
                                                                        function closeModal() {
                                                                            document.getElementById('modal').classList.add('hidden');
                                                                        }  
                                                                    </script>
                                                                </form>
    
                                                                <a href="{{ route('dashboard.editCourse', $item->slug)}}" class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class=" items-center justify-between mt-6">
                                {{ $myCourses->links()}}
                            </div>
                        </section>
                        <!-- /list -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    @else

    @if(Auth::user()->specialist && Auth::user()->specialist->status == '0')
    <div class="max-w-5xl mx-auto bg-white p-16 mt-6">
    <h1 class="text-center mt-4 text-4xl p-6 text-gray-700">Arizangiz ko'rib chiqish uchun yuborilgan!</h1>
    <div class="flex w-full justify-center items-center">
        <img class="w-[400px] " src="{{ asset('/assets/images/load.gif')}}">      
      </div>
    </div>
    @else
        <h1 class="text-center mt-4 text-4xl p-6 text-gray-700">Sizda kurslarni yaratish huquqi mavjud emas!</h1>
        <p class="text-center mt-1 text-1xl p-6 text-gray-700">Malaka oshirish kurslarini yaratish uchun, mutaxassis bo‘lish lozim, buning uchun siz ariza yuborishingiz mumkin.</p>

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
            
            <h2 class="text-4xl text-center mt-8 font-extrabold dark:text-white">Formani to‘ldirgin!</h2>
    
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 mb-4 mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-5" action="{{ route('dashboard.specialistStore')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf 
            @method('post')   
            <input type="text" name="method_info" value="create_ozi" style="opacity: 0;">
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                  <label for="fish" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mutaxassis Ism Sharifi</label>
                  <input type="text" id="fish" name="fish" value="{{ old('fish')}}" placeholder="F.I.SH" class="block w-full p-2.5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
               
                <div>
                    <label for="lavozim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis lavozimi</label>
                    <input type="text" id="lavozim" value="{{ old('lavozim')}}" name="lavozim" placeholder="O'qituvchi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>  
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis Email pochtasi</label>
                    <input type="email" id="email" name="email" value="{{ old('email')}}" placeholder="test@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis telefon manzili</label>
                    <input type="text" id="phone" value="{{ old('phone')}}" name="phone" placeholder="+9989*000-00-00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                         
                <div>
                    <label for="tg_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis Telegram akkounti</label>
                    <input type="text" id="tg_follow" value="{{ old('tg_follow')}}" name="tg_follow" placeholder="Instagram akkount agar bo'lsa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
    
                <div>
                    <label for="insta_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis Instagram akkounti</label>
                    <input type="text" id="insta_follow" value="{{ old('insta_follow')}}" name="insta_follow" placeholder="Instagram akkount agar bo'lsa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
    
                <div>
                    <label for="facebook_follow" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mutaxassis Facebook akkounti</label>
                    <input type="text" id="facebook_follow" value="{{ old('facebook_follow')}}" name="facebook_follow" placeholder="Facebook akkount agar bo'lsa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
    
                <div>
                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ro'yxatdan o'tgan foydalanuvchi</label>
                    <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                      @if ($specialists)
                            <option  value="{{$specialists->id}}">{{$specialists->name}}</option>
                        @endif
                      
                    </select>
                </div>
              
            </div>
    
            <div class="mb-6">
                <div>
                <label for="editor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">O'zingiz haqizda to'liq yozing</label>
                <textarea id="editor" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Proyekt maqsadi va nimalar haqida bo'lishi mumkinligi haqida...." style="height: 350px;" >{{ old('desc') }}</textarea></div>
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
                <input type="file" name="image" value="{{ old('image')}}" id="image-upload" accept="image/*">
            </div> 
    
            <div id="image-preview"></div>
    
    
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
            
            <div class="flex justify-center">
                <button type="submit" class="text-white transition  bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mx-auto mr-2 mb-8">Ariza yuborish</button>
            </div>
    
        </div>
        @endif
    @endif
</x-app-layout>