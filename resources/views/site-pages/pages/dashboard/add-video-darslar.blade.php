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

	
    <div class="max-w-4xl mx-auto bg-white p-16 pt-5 mt-3">
	
		<h3 class="text-2xl mb-8 text-center mt-8 font-extrabold dark:text-white">Kursga qaytish: <a class="text-blue-600" href="{{ route('dashboard.editCourse', $editCourse->slug)}}">{{$editCourse->title}}</a></h3>
        <div id="alert-additional-content-1" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <div class="flex items-center">
              <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <h3 class="text-lg font-medium">Bu yerga video darslarni qo'shing!</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
              Xar-bir kurs yaratilgandan so'ng unga video darslarni biriktirib chiqishingiz mumkin shunda asosiy sahifada video kurslar paydo bo'ladi.
            </div>
           
          </div>
        
        <h2 class="text-4xl text-center mt-8 font-extrabold dark:text-white">Kursga video darslarni qo'shing!</h2>
      
        @if ($errors->any())
          <div class="bg-red-500 text-white p-4 mb-4 mt-4">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      
        <!-- 
    FAQ - Frequently Asked Questions TailwindCSS Component
    with <details> and <summary> tag with custom [open] animation.
    Created by Surjith S M (@surjithctly)
    See more components: https://web3components.dev 
-->


<div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
	<div class="flex flex-col items-center">
		<div class="mt-5">
			<div x-data="{ isOpen: false }" class="relative flex justify-center">
				<button @click="isOpen = true" class="px-6 py-2 mx-auto tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
					Video dars qo'shish
				</button>

				<style>
					.modal-overlay {
					position: fixed;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
					z-index: 50;
				}
				</style>
			
				<div x-show="isOpen" 
					x-transition:enter="transition duration-300 ease-out"
					x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
					x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
					x-transition:leave="transition duration-150 ease-in"
					x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
					x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
					class="fixed inset-0 z-10  modal-overlay overflow-y-auto" 
					aria-labelledby="modal-title" role="dialog" aria-modal="true"
				>
					<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
						<span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
			
							<div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-900 sm:my-8 sm:w-full sm:max-w-xl sm:p-6 sm:align-middle">
								<h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
									Video dars qo'shish
								</h3>
								<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
									Formani to'ldiring, va video darslarni ketmaket tog'ri joylashtiring!
								</p>
			
								<form class="mt-4" action="{{ route('dashboard.addVideoDarslarStore')}}" method="POST" autocomplete="off">									
									@csrf 
									@method('post')   

									<label class="block mt-3" for="title">Formani to'ldiring
										<input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Video darsni sarlavhasi..."  class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
									</label>
			
									<label class="block mt-3" for="desc">
										<textarea name="desc"  rows="10"  id="desc" placeholder="Video dars haqida qisqacha yozing..." class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">{{ old('desc') }}</textarea>
									</label>
			
									<label class="block mt-3" for="youtube">
										<input type="text" name="youtube" value="{{ old('youtube') }}" id="youtube" placeholder="Youtube manzilini kiriting" class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
									</label>

									<div class="flex items-center mt-3 mb-4">
										<input id="default-checkbox" type="checkbox" name="status" value="1" {{ (old('status')) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
										<label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Video dars aktiv va uni ko'rsatishga tayyor!</label>
									</div>
								
									<input type="text" name="kurs_id" value="{{ $editCourse->id}}" style="opacity: 0;">
			
			
									<div class="mt-4 sm:flex sm:items-center sm:-mx-2">
										<button type="button" @click="isOpen = false" class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
											Yopish
										</button>
			
										<button type="submit" class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
											Saqlash
										</button>
									</div>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div>
		<p class="text-neutral-500 text-xl mt-3">
			Videolarni birin ketin qo'shing!
		</p>
		
	</div>
	@if(session('success'))			
		<div id="alert-border-3" class="flex items-center p-4 mt-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
			<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
			<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
			</svg>
			<div class="ml-3 text-md font-medium">
				{{ session('success') }}
			</div>
		
		</div>
	@endif

</div>
<div class="grid divide-y divide-neutral-200 border border-neutral-200 max-w-4xl mx-auto mt-8 ">
	@php
	$i = 1;
	@endphp
	@foreach($videoDarslar as $item)
	<div class="py-5 px-3 border border-neutral-200">
		<details class="group ">
			<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
				<span>#{{$i++}} - {{$item->title}}
					@if ($item->status == true)
					<span class="bg-green-100 ml-3 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Ko'rinarli</span>
					@else
					<span class="bg-red-100 ml-3 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Ko'rinmas</span>
					@endif
				</span> 
				
				<span class="transition group-open:rotate-180">
				<svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
				</svg>
				</span>
			</summary>
			
			<div class="py-3 px-2 mt-4 mb-4 rounded-md border border-blue-200">
				<details class="group ">
					<summary class="flex justify-between items-center font-medium cursor-pointer list-none">
						<span>Informatsiyasini ko'rish uchun bosing</span>
						<span class="transition group-open:rotate-180">
						<svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path>
						</svg>
						</span>
					</summary>
					<div class="flex items-center mt-4 p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
						<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
						  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
						</svg>
						<span class="sr-only">Info</span>
						<div>
						  <span class="font-medium">Informatsiya:</span> <br> {{$item->desc}}
						</div>
					</div>
				</details>
				
			</div>
			<hr>
			<div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
				<iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $item->youtube}}" title="{{$item->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>
			<div class="flex justify-end">
				{{-- <button type="button" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
				  <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
					<path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
				  </svg>
				 Tahrirlash
				</button> --}}



				<div x-data="{ isOpen: false }" class="relative flex justify-center">
					<button @click="isOpen = true" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
						Tahrirlash
					</button>
	
					<style>
						.modal-overlay {
						position: fixed;
						top: 0;
						left: 0;
						right: 0;
						bottom: 0;
						background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
						z-index: 50;
					}
					</style>
				
					<div x-show="isOpen" 
						x-transition:enter="transition duration-300 ease-out"
						x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
						x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
						x-transition:leave="transition duration-150 ease-in"
						x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
						x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
						class="fixed inset-0 z-10  modal-overlay overflow-y-auto" 
						aria-labelledby="modal-title" role="dialog" aria-modal="true"
					>
						<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
							<span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
				
								<div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-900 sm:my-8 sm:w-full sm:max-w-xl sm:p-6 sm:align-middle">
									<h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">
										Video darsni tahrirlash
									</h3>
									<p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
										Formani ma'lumotlarni o'zgartirishingiz mumkin.
									</p>
				
									<form class="mt-4" action="{{ route('dashboard.editVideoDarslar')}}" method="POST" autocomplete="off">									
										@csrf 
										@method('post')   
	
										<label class="block mt-3" for="title">Formani tahrirlang
											<input type="text" name="title" value="{{ old('title', $item->title) }}" id="title" placeholder="Video darsni sarlavhasi..."  class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
										</label>
				
										<label class="block mt-3" for="desc">
											<textarea name="desc"  rows="10"  id="desc" placeholder="Video dars haqida qisqacha yozing..." class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">{{ old('desc', $item->desc) }}</textarea>
										</label>
				
										<label class="block mt-3" for="youtube">
											<input type="text" name="youtube" value="@if(old('youtube') == null)https://www.youtube.com/watch?v={{ $item->youtube }} @else {{ old('youtube') }} @endif" id="youtube" placeholder="Youtube manzilini kiriting" class="block w-full px-4 py-3 text-sm text-gray-700 bg-white border border-gray-200 rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
										</label>
	
										<div class="flex items-center mt-3 mb-4">
											<input id="default-checkbox" type="checkbox" name="status" value="1" {{ (old('status', $item->status)) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
											<label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Video dars aktiv va uni ko'rsatishga tayyor!</label>
										</div>
									
										<input type="text" name="video_id" value="{{ $item->id}}" style="opacity: 0;">
				
				
										<div class="mt-4 sm:flex sm:items-center sm:-mx-2">
											<button type="button" @click="isOpen = false" class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
												Yopish
											</button>
				
											<button type="submit" class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
												Saqlash
											</button>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
		
				<button type="button" class="text-red-800 bg-transparent border border-red-900 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-blue-600 dark:border-blue-600 dark:text-blue-400 dark:hover:text-white dark:focus:ring-blue-800" data-dismiss-target="#alert-additional-content-1" aria-label="Close">
				  O'chirish
				</button>
			  </div>
		</details>
		
	</div>
	@endforeach
</div>


<script>
	// ...
	// extend: {
    //   keyframes: {
    //     fadeIn: {
    //       "0%": { opacity: 0 },
    //       "100%": { opacity: 100 },
    //     },
    //   },
    //   animation: {
    //     fadeIn: "fadeIn 0.2s ease-in-out forwards",
    //   },
    // },
    // ...
</script>
      
      </div>

</x-app-layout>