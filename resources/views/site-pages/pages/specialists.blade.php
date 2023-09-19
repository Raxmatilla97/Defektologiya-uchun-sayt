@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Mutaxasislar</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index') }}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- team start -->
  <div class=" section-padding">
    <div class="container">
      <div class="text-center">
        <div class="mini-title">Assotsiatsiya xodimlari</div>
        <div class="column-title ">
         Bizning 
          <span class="shape-bg">Mutaxasislar</span>
        </div>
      </div>
      <div class="grid xl:grid-cols-4 lg:grid-cols-3  sm:grid-cols-2 grid-cols-1 gap-7 pt-10">

        @foreach ($specialist as $item)       
        <div class=" bg-white shadow-box3 rounded-[8px] transition-all duration-100 pt-10 pb-[28px] px-6 text-center hover:shadow-box4
                            border-t-4 border-transparent hover:border-primary ">
          <div class="w-[170px] h-[170px] rounded-full  relative mx-auto mb-8">
            <img src="{{ $item->image }}" alt="{{ $item->fish }}" class=" w-full h-full object-cover rounded-full">
          </div>
          <div class="course-content">
            <a href="{{ route('site.specialistSingle', $item->slug )}}">
              <h4 class="text-2xl mb-1 font-bold">{{ $item->fish }}</h4>
            </a>
            <div>{{ $item->lavozim }}</div>
            <ul class="space-x-4 flex justify-center pt-6">
              <li>
                <a href="#" class=" h-10 w-10 rounded bg-red-paste text-primary flex flex-col justify-center items-center text-2xl transition
                                                hover:bg-primary hover:text-white">
                  <iconify-icon icon="bxl:facebook"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="#" class=" h-10 w-10 rounded bg-green-paste text-secondary flex flex-col justify-center items-center text-2xl transition
                                                hover:bg-secondary hover:text-white">
                  <iconify-icon icon="bxl:twitter"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="#" class=" h-10 w-10 rounded bg-[#EEE8FF] text-#8861DB flex flex-col justify-center items-center text-2xl transition
                                                hover:bg-[#8861DB] hover:text-white">
                  <iconify-icon icon="bxl:linkedin"></iconify-icon>
                </a>
              </li>
            </ul>
          </div>
        </div>     
        @endforeach

       
      </div>
    </div>
    {{ $specialist->links('vendor.pagination.custom') }}
  </div>
  @endsection