@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Malaka oshirish kurslari</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa </li>
        </ol>
      </nav>
    </div>
  </div>
  
  <div class="nav-tab-wrapper tabs pt-10 section-padding-bottom">
    <div class="container">
      <div class="flex  items-center mb-14">
        <div class="flex-1 flex space-x-6  items-center">
          <ul id="tabs-nav" class=" flex space-x-4 cata-Tbas">
            <li>
              <a href="#tab1" class=" h-[60px] w-[60px]  flex flex-col justify-center items-center">
                <iconify-icon icon="clarity:grid-view-line"></iconify-icon>
              </a>
            </li>
            <li>
              <a href="#tab2" class="h-[60px] w-[60px]  flex flex-col justify-center items-center">
                <iconify-icon icon="ant-design:unordered-list-outlined"></iconify-icon>
              </a>
            </li>
          </ul>
        
        </div>
    
      </div>
      <div id="tabs-content">
        <div id="tab1" class="tab-content">
          <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
            @if ($coursesIndex->isNotEmpty())
              @foreach ($coursesIndex as $item)            
              <a href="{{ route('site.courseSingle', $item->slug)}}" class=" bg-white shadow-box2 rounded-[8px] transition duration-100 hover:shadow-sm" href="single-course.html">
                <div class="course-thumb h-[248px] rounded-t-[8px]  relative">
                  <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
                  <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6">
                    @if($item->category == "logo")
                    Logopediya
                    @elseif($item->category == "oligo")
                      Oligofrenopedagogika
                    @elseif($item->category == "surdo")
                      Surdopedagogika
                    @endif
                  </span>
                </div>
                <div class="course-content p-8">
                  <div class="text-secondary font-bold text-2xl mb-3">{{ $item->narxi }}</div>
                  <h4 class=" text-xl mb-3 font-bold">{{ $item->title }}</h4>
                  <div class="flex justify-between  flex-wrap space-y-1 xl:space-y-0">
                    <span class=" flex items-center space-x-2 mr-3">
                          <img src="assets/images/svg/file.svg" alt="">
                              <span>{{ $item->videolar->count()}} darslar</span>
                    </span>
                    <span class=" flex items-center space-x-2 mr-3">
                              <img src="assets/images/svg/clock.svg" alt="">
                                  <span>{{ $item->davomiylik_vaqti }}</span>
                    </span>
                  
                  </div>
                </div>
              </a>
              @endforeach
            @else
              <img src="https://cdn.dribbble.com/users/550484/screenshots/2128340/404-gif.gif" alt="Image" class="mx-auto block">
              <h3 class="text-center">Malaka oshirish kurslari hali joylanmagan!</h3>
            @endif


          </div>
          <div class="text-center pt-14">
            {{ $coursesIndex->links('vendor.pagination.custom') }}
          </div>
        </div>
        <div id="tab2" class="tab-content">
          <div class="grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 gap-[30px]">
            @if ($coursesIndex->isNotEmpty())
              @foreach ($coursesIndex as $item)      
              <a href="{{ route('site.courseSingle', $item->slug)}}" class=" bg-white rounded-[8px] transition shadow-box7 duration-150 border-b-4 hover:border-primary border-transparent
              hover:shadow-box6 flex p-8 space-x-6" href="single-course.html">
                <div class="flex-none">
                  <div class="w-[159px] h-[159px]  rounded  relative">
                    <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded">
                  </div>
                </div>
                <div class="course-content flex-1">
                
                  <h4 class=" text-2xl leading-[36px] mb-4 font-bold">{{ $item->title }}</h4>
                  <div class="flex   space-x-6">
                    <span class=" flex items-center space-x-2">
                                          <img src="assets/images/svg/file2.svg" alt="">
                                              <span>{{ $item->videolar->count()}} video dars</span>
                    </span>
                  
                  </div>
                </div>
              </a>
              @endforeach
            @else
              <img src="https://cdn.dribbble.com/users/550484/screenshots/2128340/404-gif.gif" alt="Image" class="mx-auto block">
              <h3 class="text-center">Malaka oshirish kurslari hali joylanmagan!</h3>
            @endif
           
           
          </div>
          <div class="text-center pt-14">
          
                {{ $coursesIndex->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection