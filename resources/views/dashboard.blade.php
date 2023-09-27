<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Malaka oshirish kurslari') }}
        </h2>
    </x-slot>
    {{-- 
    <div id="toast-top-right" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
        <div class="text-sm font-normal">Top right positioning.</div>
    </div> 
    --}}

   

    <div class="py-12">
        <div class="max-w-[1568px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100">

                <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Kichik kurslarni boshqarish paneliga hush kelibsiz!</h3>

                @include('site-pages.pages.dashboard.info-component')
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <a href="{{ route('dashboard.kurslarDashboardList', 'barcha-kurslar')}}">                          
                                <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-blue-500 bg-blue border border-blue-200 rounded-lg cursor-pointer dark:hover:text-blue-300 dark:border-blue-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-blue-600 hover:bg-blue-100 dark:text-blue-400 dark:bg-blue-800 dark:hover:bg-blue-700">                           
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Barcha yaratilgan kurslar soni: {{$all_couses}}</div>
                                        <div class="w-full">Mutaxasislar tomonidan yaratilgan kurslar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.kurslarDashboardList', 'maqullangan-kurslar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-green-500 bg-green border border-green-200 rounded-lg cursor-pointer dark:hover:text-green-300 dark:border-green-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-green-600 hover:bg-green-100 dark:text-green-400 dark:bg-green-800 dark:hover:bg-green-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Maqullangan barcha uchun ko'rinarli kurslar soni: {{ $all_couses_maqullangan}} </div>
                                        <div class="w-full">Adminlar tomonidan maqullangan kurslar ro'yxati</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard.kurslarDashboardList', 'rad-etilgan-kurslar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-red-500 bg-red border border-red-200 rounded-lg cursor-pointer dark:hover:text-red-300 dark:border-red-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-red-600 hover:bg-red-100 dark:text-red-400 dark:bg-red-800 dark:hover:bg-red-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Rad etilgan kurslari soni: {{ $all_couses_rad_etilgan}}</div>
                                        <div class="w-full">Rad etilgan malaka oshirish kurslarini ro'yxatini ko'rish</div>
                                    </div>
                                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </label>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('dashboard.kurslarDashboardList', 'tasdiqlash-lozim-kurslar')}}">
                                <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-indigo-500 bg-red border border-indigo-200 rounded-lg cursor-pointer dark:hover:text-indigo-300 dark:border-indigo-700 dark:peer-checked:text-indigo-500 peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-indigo-600 hover:bg-indigo-100 dark:text-indigo-400 dark:bg-indigo-800 dark:hover:bg-indigo-700">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Tasdiqlash lozim bo'lgan video kurslar soni: {{$all_couses_tasdiqlash_kerak}}</div>
                                        <div class="w-full">Mutaxasislar tomonidan adminga tasdiqlash uchun yuborilgan kurslar ro'yxati</div>
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
                                <form action="{{ route('dashboard.kurslarSearch')}}" method="GET" class="flex flex-row flex-wrap">
                                  <div class="mb-4 mr-4">
                                    <label for="fish" class="block mb-2">Mutaxasis ism familyasi:</label>
                                    <input type="text" id="fish" name="fish" class="w-full border border-gray-300 p-2" placeholder="Familya Ism Sharif...">
                                  </div>
                                  <div class="mb-4 mr-4">
                                    <label for="title" class="block mb-2">Kurs nomi:</label>
                                    <input type="text" id="title" name="title" class="w-full border border-gray-300 p-2" placeholder="Kurs nomi...">
                                  </div>
                                  <div class="mb-4">
                                    <label for="maqullanganlik" class="block mb-2">Holati:</label>
                                    <select id="maqullanganlik" name="maqullanganlik" class="w-full border border-gray-300 p-2">
                                    <option value="" default>Tanlash</option>                                     
                                      <option value="maqullandi">Kurs maqullangan</option>
                                      <option value="rad_etildi">Kurs rad etilgan</option>
                                      <option value="korilmagan">Kurs tasdiqlanmagan</option>
                                    </select>
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
                                                               
                                                                <span>F.I.SH</span>
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
    
                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Kafedra nomi</th>
    
                                                   
    
                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                                    @if ($all_couses_tasdiqlash_kerak_paginate)                                                
                                                    @foreach ($all_couses_tasdiqlash_kerak_paginate as $item)
                                                    <tr>
                                                    
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            <div class="inline-flex items-center gap-x-3">  
                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('/assets/images/avatar.png')}}" alt="">
                                                                    <div>
                                                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->specialist->fish }}</h2>
                                                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">+998975476797</p>
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
                                                                            <p class=" text-xl text-center">Kursni o'chirishni <br> istaysizmi?</p>
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
                                {{ $all_couses_tasdiqlash_kerak_paginate->links()}}
                            </div>
                        </section>
                        <!-- /list -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>