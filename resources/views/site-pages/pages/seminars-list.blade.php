@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Seminarlar</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <div class="grid md:grid-cols-2 grid-cols-1 gap-[30px]">

            @foreach ($allSeminar as $item)  
            <div class=" bg-white shadow-box12 rounded-[8px] transition duration-100 hover:shadow-box13">
              <div class="course-thumb h-[260px] rounded-t-[8px]  relative">
                <img src="/{{ $item->image}}" alt="{{ $item->title}}" class=" w-full h-full object-cover rounded-t-[8px]">
                @if ($item->boladigan_kun->isPast())
                <span  class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6" style="background-color: #ff0000ad; color: #FFF">
                  Tugagan
                </span>
                @else
                <span  class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6">
                  Rejalashtirilgan
                </span>
                @endif  
              </div>
              <div class="course-content p-8">
                <div class="flex   lg:space-x-10 space-x-5 mb-5">
                  <a class=" flex items-center space-x-2" href="blog-single.html">
                    <img src="{{ asset('/assets/images/svg/admin.svg')}}" alt="">
                    <span>Admin</span>
                  </a>
                  <a class=" flex items-center space-x-2" href="blog-single.html">
                    <img src="{{ asset('/assets/images/svg/calender.svg')}}" alt="">
                    <span>{{ $item->boladigan_kun->diffForHumans()}}</span>
                  </a>
                </div>
                <h4 class=" text-xl mb-5 font-bold">
                  <a href="{{ route('site.seminarSingle', $item->slug)}}" class=" hover:text-primary transition duration-150">
                    {{ Str::limit($item->title, 50) }}
                  </a>
                </h4>
                <a href="{{ route('site.seminarSingle', $item->slug)}}" class=" text-black font-semibold hover:underline transition duration-150">Ko'proq o'qish</a>
              </div>
            </div>
            @endforeach

          </div>
          {{ $allSeminar->links('vendor.pagination.custom') }}
        </div>
        <div class="lg:col-span-4 col-span-12">

          <form action="{{ route('site.seminarSearch')}}" method="get">
            @csrf  
          <div class="sidebarWrapper space-y-[30px]">
            <div class="wdiget widget_search">
              <div class="bg-[#F8F8F8] flex  rounded-md shadow-e1 items-center  py-[4px] pl-3  relative">                               
                  <div class="flex-1">
                    <input type="text" name="text" placeholder="Qidirish..." class="border-none focus:ring-0 bg-transparent">
                  </div>
                  <div class="flex-none">
                    <button type="submit" class="btn btn-primary">
                    
                      <img src="assets/images/icon/search.svg" alt=""></button>
                  </div>
                
              </div>
            </div>
          </form>
            <div class="wdiget widget-recent-post">
              <h4 class=" widget-title">Tafsiya etilgan seminarlar</h4>
              <ul class="list">
                @foreach ($tafsiya_etilgan as $item)
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                  <div class="flex-none ">
                    <div class="h-20 w-20  rounded">
                      <img src="/{{ $item->image}}" alt="" class=" w-full h-full object-cover rounded">
                    </div>
                  </div>
                  <div class="flex-1 ">
                    <div class="mb-1 font-semibold text-black">
                      {{ Str::limit($item->title, 40) }}
                    </div>
                    <a class=" text-secondary font-semibold" href="{{ route('site.seminarSingle', $item->slug)}}">O'qish</a>
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

  @endsection