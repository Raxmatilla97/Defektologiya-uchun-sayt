<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Foydalanuvchilar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100">

                <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Foydalanuvchilarni boshqarish paneliga hush kelibsiz!</h3>

                    @include('site-pages.pages.dashboard.info-component')

                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <a href="{{ route('dashboard.registerUsersList', 'register-users')}}">                          
                                <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-blue-500 bg-blue border border-blue-200 rounded-lg cursor-pointer dark:hover:text-blue-300 dark:border-blue-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-blue-600 hover:bg-blue-100 dark:text-blue-400 dark:bg-blue-800 dark:hover:bg-blue-700">                           
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Ro'yxatdan o'tgan foydalanuvchilar soni: {{ $all_users->count() }}</div>
                                        <div class="w-full">Umumiy saytdan ro'yxatdan o'tgan foydalanuvchilar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.registerUsersList', 'mutaxasis-users')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-green-500 bg-green border border-green-200 rounded-lg cursor-pointer dark:hover:text-green-300 dark:border-green-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600 hover:bg-green-100 dark:text-green-400 dark:bg-green-800 dark:hover:bg-green-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Mutaxasis bo'lgan foydalanuvchilar soni: {{$specialistCount}}</div>
                                        <div class="w-full">Mutaxasislik unvonini olgan foydalanuvchilar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard.registerUsersList', 'mutaxasis-ariza-users')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-sky-500 bg-red border border-sky-200 rounded-lg cursor-pointer dark:hover:text-sky-300 dark:border-sky-700 dark:peer-checked:text-sky-500 peer-checked:border-sky-600 peer-checked:text-sky-600 hover:text-sky-600 hover:bg-sky-100 dark:text-sky-400 dark:bg-sky-800 dark:hover:bg-sky-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Mutaxasis bo'lish uchun ariza yuborganlar:  {{$noactiveStatus}}</div>
                                        <div class="w-full">Kurs qo'yishni istagan foydalanuvchilar ariza yuborishadi</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                           <a href="{{ route('dashboard.specialistCreate')}}">
                                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Yangi mutaxasis yaratish va uni Loginga birlashtirish
                                </button>
                            </a>
                        </li>

                       

                        <li>
                            <a href="{{ route('dashboard.registerUsersList', 'ban-users')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-red-500 bg-red border border-red-200 rounded-lg cursor-pointer dark:hover:text-red-300 dark:border-red-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-red-600 hover:bg-red-100 dark:text-red-400 dark:bg-red-800 dark:hover:bg-red-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">No aktiv qilingan foydalanuvchilar soni:  {{$noactiveStatusAllUsers}}</div>
                                        <div class="w-full">Biron sababga ko'ra status aktiv bo'lmagan foydalanuvchilar</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-indigo-500 bg-red border border-indigo-200 rounded-lg cursor-pointer dark:hover:text-indigo-300 dark:border-indigo-700 dark:peer-checked:text-indigo-500 peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-indigo-600 hover:bg-indigo-100 dark:text-indigo-400 dark:bg-indigo-800 dark:hover:bg-indigo-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Kurslarni ko'rish uchun ruxsat so'ragan foydalanuvchilar soni:</div>
                                        <div class="w-full">Yopiq kurslarni ko'rish uchun so'rov jo'natgan foydalanuvchilar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                       
                    </ul>


                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class=" p-6 text-gray-900 dark:text-gray-100">
                        <!-- list -->
                        <section class="container px-4 mx-auto">

                            <div class="flex justify-center">
                                <form action="{{ route('dashboard.specialistSearch')}}" method="GET" class="flex flex-row flex-wrap">
                                  <div class="mb-4 mr-4">
                                    <label for="user_name" class="block mb-2">Ro'yxatdan o'tgan foydalanuvchi F.I.SH:</label>
                                    <input type="text" id="user_name" name="user_name" class="w-full border border-gray-300 p-2" placeholder="F.I.SH...">
                                  </div>
                                  <div class="mb-4 mr-4">
                                    <label for="specialist_name" class="block mb-2">Mutaxasis F.I.SH:</label>
                                    <input type="text" id="specialist_name" name="specialist_name" class="w-full border border-gray-300 p-2" placeholder="F.I.SH...">
                                  </div>
                                
                                  <div class="ml-4 mt-8">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Qidirish</button>
                                  </div>
                                </form>
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
                                                            
                                                                <span>Ro'yxatdan o'tganlar</span>
                                                            </div>
                                                        </th>

                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>User roli</span>
                                                            </button>
                                                        </th>                                                

                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Mutaxasisga bog'langanligi</span>
                                                            </button>
                                                        </th>   

                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Yaratilgan</th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                @if ($users)
                                                
                                                    @foreach ($users as $item)
                                                    <tr>
                                                        {{-- {{dd($arizalar)}} --}}
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            <div class="inline-flex items-center gap-x-3">
                                                                {{-- <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700"> --}}

                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('/assets/images/avatar.png')}}" alt="">
                                                                    <div>
                                                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{$item->name}}</h2>
                                                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                                                        
                                                                            @if($item->specialist !== null)                                                                    
                                                                                {{ $item->specialist->phone }}                                                                     
                                                                            @else
                                                                                <p>Telefon raqam nomalum!</p>
                                                                            @endif

                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    
                                                    
                                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">                                                            
                                                            @if($item->roll == "admin")                                                      
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                                <h2 class="text-sm font-normal text-emerald-500">Admin</b></h2>
                                                            </div>                                                        
                                                            @elseif($item->roll == "teacher")                                                      
                                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-sky-100/60 dark:bg-red-800">
                                                                    <span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span>
                                                                    <h2 class="text-sm font-normal text-sky-500">O'qituvchi</h2>
                                                                </div>
                                                            @else
                                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-indigo-100/60 dark:bg-gray-800">
                                                                    <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
                                                                    <h2 class="text-sm font-normal text-indigo-500">Student</b></h2>
                                                                </div>    
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                            @if($item->specialist)                                                      
                                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                                    <h2 class="text-sm font-normal text-emerald-500">Mutahasis nomi:<br> <b>{{ $item->specialist->fish }}</b></h2>
                                                                </div>
                                                            
                                                            @else                                                       
                                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-red-800">
                                                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                    <h2 class="text-sm font-normal text-red-500">Foydalanuvchi mutaxasis emas!</h2>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-2">
                                                                <p class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">{{  $item->created_at->format('d-M-Y H:i') }} </p>
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-6">                                                                                                                     
                                                                <form action="{{ route('dashboard.userDestroy', $item->id)}}" method="POST"                                                                
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
                                                                            <p class=" text-xl text-center">Foydalanuvchini o'chirishni <br> istaysizmi?</p>
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
                                                                @if($item->specialist)                                                              
                                                                <a href="{{ route('dashboard.specialistEdit', $item->specialist->id)}}" class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                </a>
                                                                @else
                                                                <a href="{{ route('dashboard.specialistCreate', $item->id)}}" class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                    </svg>
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <h1 class="text-center text-xl p-6 text-gray-700">Bu yerda hali ma'lumot yo'q!</h1>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        <div class=" items-center justify-between mt-6">
                            {{ $users->links()}}
                        </div>
                    </section>
                    <!-- /list -->
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>