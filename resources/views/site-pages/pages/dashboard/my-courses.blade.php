<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Men ko'rishni istagan kurslarim ro'yxati") }}
        </h2>
    </x-slot>


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
                                <form action="{{ route('dashboard.myCoursesRequestSearch')}}" method="GET" class="flex flex-row flex-wrap">                               
                                  <div class="mb-4 mr-4">
                                    <label for="title" class="block mb-2">Kurs nomi:</label>
                                    <input type="text" id="title" value="{{ old('title', request()->query('title')) }}" name="title" class="w-full border border-gray-300 p-2" placeholder="Kurs nomi...">
                                  </div>
                                  <div class="mb-4">
                                    <label for="maqullanganlik" class="block mb-2">Barchasi:</label>
                                    <select id="maqullanganlik" name="maqullanganlik" class="w-full border border-gray-300 p-2">
                                    <option value="" default>Tanlash</option>                                     
                                      <option value="maqullandi" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'maqullandi' ? 'selected' : '' }}>Ruxsat berilgan kurslarim</option>
                                      <option value="ruxsat_berilmadi" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'ruxsat_berilmadi' ? 'selected' : '' }}>Rad etilgan kurslarim</option>
                                      <option value="tekshirilmoqda" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'tekshirilmoqda' ? 'selected' : '' }}>Tekshiruvdagi kurslarim</option>
                                      <option value="qilingan" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'qilingan' ? 'selected' : '' }}>Tolov qilingan kurslarim</option>
                                      <option value="qilinmagan" {{ old('maqullanganlik', request()->query('maqullanganlik')) === 'qilinmagan' ? 'selected' : '' }}>Tolov qilinmagan kurslarim</option>
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
                                        <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div class="text-xl">
                                              <span class="font-medium">Kurslarga yozilish uchun:</span>
                                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                                  <li>1. Assotsiatsiyasi malaka oshirish kurslari sahifasiga o'tishiz. <a href="{{route('site.coursesIndex')}}"><b>Bu yerga bosing</b></a> </li>
                                                  <li>2. Biron sizni qiziqtirgan kursni tanlashingiz va kurs sahifasiga o'tib u yerdan "<b>Kursga yozilish</b>" tugmasini bosishingiz kerak bo'ladi.</li>
                                                  <li>3. Siz yuborgan arizani sayt ma'muriyati ko'rib chiqib, siz bilan bog'lanishadi va kurs siz uchun ochiq holatga o'tishi mumkin.</li>
                                              </ul>
                                            </div>
                                          </div>
                                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                           
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50 dark:bg-gray-800">
                                                    <tr>
                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Video kurs nomi</span>
    
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                </svg>
                                                            </button>
                                                        </th>

                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <div class="flex items-center gap-x-3">
                                                               
                                                                <span>Kurs yaratuvchisi</span>
                                                            </div>
                                                        </th>
    
                                                        <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <button class="flex items-center gap-x-2">
                                                                <span>Arizangiz holati</span>
                                                            </button>
                                                        </th>
                                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Kurs narxi</th>
    
                                                   
                                                        <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                            <div class="flex items-center gap-x-3">
                                                               
                                                                <span>To'lov qilinganligi</span>
                                                            </div>
                                                        </th>
    
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                                  
                                                    <tr>
                                                    @foreach ($myCourses as $item)
                                                   
                                                       
                                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                        <p class="w-full text-sm font-semibold peer-checked:border-indigo-600 peer-checked:text-indigo-600 hover:text-indigo-600 " >
                                                            <a href="{{route('site.courseSingle', $item->course->slug)}}">{{ $item->course->title}}</a>
                                                        </p>
                                                    </td>
                                                    
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                            <div class="inline-flex items-center gap-x-3">  
                                                                <div class="flex items-center gap-x-2">
                                                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ asset('/assets/images/avatar.png')}}" alt="">
                                                                    <div>
                                                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{ $item->course->specialist->fish }}</h2>
                                                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{ $item->course->specialist->phone }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">          
                                                                                                                                                                  
                                                            @if ($item->sorov_holati == 'tekshirilmoqda')
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-indigo-100/60 dark:bg-indigo-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
                                                                <h2 class="text-sm font-normal text-indigo-500">Arizangiz tekshirilmoqda!</h2>
                                                            </div>
                                                            @elseif ($item->sorov_holati == "ruxsat_berilmadi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-red-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                <h2 class="text-sm font-normal text-red-500">Arizangiz rad etilgan!</h2>
                                                            </div>                                                             
                                                            @elseif ($item->sorov_holati == "maqullandi")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                                <h2 class="text-sm font-normal text-emerald-500">Kursni ko'rishingiz mumkin!</h2>
                                                            </div>  
                                                            @endif                                            
                                                           
                                                        </td>

                                                      
                                                       
                                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                            <div class="flex items-center gap-x-2">
                                                                <p class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">{{ $item->course->narxi }}</p>
                                                              
                                                            </div>
                                                        </td>
                                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">          
                                                                                                                                                                  
                                                            @if ($item->tolov_qilgani == 'qilingan')
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-indigo-100/60 dark:bg-indigo-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
                                                                <h2 class="text-sm font-normal text-indigo-500">To'lov qilingan!</h2>
                                                            </div>
                                                            @elseif ($item->tolov_qilgani == "qilinmagan")
                                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-red-800">
                                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                                <h2 class="text-sm font-normal text-red-500">To'lov qilinmagan!</h2>
                                                            </div>                                                            
                                                          
                                                            @endif                                            
                                                           
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                  
                                             {{--    @else
                                                    <h1 class="text-center text-xl p-6 text-gray-700">Bu yerda hali ma'lumot yo'q yoki sizda kurslarni yaratish xuquqi mavjud emas!</h1>
                                                @endif --}}
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
</x-app-layout>