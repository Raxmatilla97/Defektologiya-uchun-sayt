@extends('layouts/def');
@section('content')
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>@if (!isset($notFound)){{ $projectsIndex->title }} @else {{ $notFound }} @endif</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="breadcrumb-item"><a href="{{ route('site.projectsIndex')}}">Proyektlar sahifasi</a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa</li>
        </ol>
      </nav>
    </div>
  </div>

  @if (!isset($notFound))
  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <div class="bg-[#F8F8F8] rounded-md">
            <img src="{{'/'}}storage/{{ $projectsIndex->image }}" alt="{{ $projectsIndex->title }}" class="w-full rounded-t-md mb-10">
            <div class="px-10 pb-10">
              <div class="flex  flex-wrap  xl:space-x-10 space-x-5 mt-6 mb-6">
                <a class=" flex items-center space-x-2" href="#">
                  <img src="assets/images/svg/user3.svg" alt="">
                  <span>Admin</span>
                </a>
                <a class=" flex items-center space-x-2" href="#">
                  <img src="assets/images/svg/calender.svg" alt="">
                  <span>{{ $projectsIndex->created_at->diffForHumans() }}</span>
                </a>
                {{-- <a class=" flex items-center space-x-2" href="#">
                  <img src="assets/images/icon/clock.svg" alt="">
                  <span>3 marta ko'rilgan</span>
                </a> --}}
             
              </div>
              <h3>
                {{ $projectsIndex->title }}
              </h3>              

              <div class="img-desc bg-slate-100 lg:my-6 my-4">
                {!! $projectsIndex->desc !!}
              </div>         
              <style>
                .img-desc img {
                    display: initial;
                    max-width: 100%;
                }  
    
                .img-desc table {
                    max-width: 100%;
                }  
            
            </style>
             
             
             <hr class="mt-[60px]">
              
             <!-- related post -->
            <div class="grid xl:grid-cols-2 grid-cols-1 gap-[30px] md:mt-14 mt-8">
                @if (isset($previousProject))
                <a class="flex space-x-4 shadow-box7 rounded p-5 bg-white" href="{{ route('site.projectInfoPage', $previousProject->slug )}}">
                    <div class="flex-none">
                        <div class="h-20 w-20 rounded">
                        <img src="{{'/'}}storage/{{ $previousProject->image }}" alt="{{ $previousProject->title }}" class="w-full h-full object-cover rounded">
                        </div>
                    </div>
                    <div class="flex-1">
                        <span class="text-primary text-base mb-1">Bundan oldingi</span>
                        <div class="mb-1 font-semibold text-black">
                            {{ $previousProject->title }}
                        </div>
                    </div>
                </a>
                @endif
               
                <!-- end single -->
                @if (isset($nextProject))
                <a class="flex flex-row-reverse shadow-box7 bg-white rounded p-5" href="{{ route('site.projectInfoPage', $nextProject->slug )}}">
                    <div class="flex-none">
                        <div class="h-20 w-20 rounded ml-4">
                        <img src="{{'/'}}storage/{{ $nextProject->image }}" alt="{{ $nextProject->title }}" class="w-full h-full object-cover rounded">
                        </div>
                    </div>
                    <div class="flex-1 text-right">
                        <span class="text-primary text-base mb-1">Bundan keyingi</span>
                        <div class="mb-1 font-semibold text-black">
                            {{ $nextProject->title }}
                        </div>
                    </div>
                </a>
                @endif
                <!-- end single -->
            </div>
            </div>
          </div>
          <!-- comments start -->
         
          <!-- Reply start -->
         
        </div>
        <div class="lg:col-span-4 col-span-12">


          <div class="sidebarWrapper space-y-[30px]">         
            
            <div class="wdiget widget-recent-post">
              <h4 class=" widget-title">O'xshash proyektlar</h4>
              <ul class="list">
                @foreach ($oxshashProjectlar as $item)
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                    <div class="flex-none ">
                        <div class="h-20 w-20  rounded">
                            <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded">
                        </div>
                    </div>
                    <div class="flex-1 ">
                        <div class="mb-1 font-semibold text-black">
                            <a href="{{ route('site.projectInfoPage', $item->slug )}}">{{ Str::limit($item->title, 50) }}</a>
                        </div>
                        <a class=" text-secondary font-semibold" href="{{ route('site.projectInfoPage', $item->slug )}}">Sahifaga o'tish</a>
                    </div>
                </li>
                @endforeach
                

               
              </ul>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <img src="{{ asset('/assets/images/astronaut-600x800.gif')}}" alt="Image" class="mx-auto block">
  @endif
  
@endsection