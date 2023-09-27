@extends('layouts/def');
@section('content')   

<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Assotsiatsiya Proyektlari</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="grid  lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
        @foreach ($projectsIndex as $item)
        <div class=" bg-white shadow-box12 rounded-[8px] transition duration-100 hover:shadow-box13">
        <div class="course-thumb h-[260px] rounded-t-[8px]  relative">
            <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
            <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6">Proyekt</span>
        </div>
        <div class="course-content p-8">
            <div class="flex   lg:space-x-10 space-x-5 mb-5">
            <a class=" flex items-center space-x-2" href="blog-single.html">
                <img src="assets/images/svg/admin.svg" alt="">
                <span>Admin</span>
            </a>
            <a class=" flex items-center space-x-2" href="blog-single.html">
                <img src="assets/images/svg/calender.svg" alt="">
                <span>{{ $item->created_at->diffForHumans() }}</span>
            </a>
            </div>
            <h4 class=" text-xl mb-5 font-bold">
            <a href="{{ route('site.projectInfoPage', $item->slug )}}" class=" hover:text-primary transition duration-150">
                {{ Str::limit($item->title, 50) }}
            </a>
            </h4>
            <a href="blog-single.html" class=" text-black font-semibold hover:underline transition duration-150">Ko'proq o'qish</a>
        </div>
        </div>       
        @endforeach
      </div>
      {{ $projectsIndex->links('vendor.pagination.custom') }}
    </div>
  </div>
  @endsection