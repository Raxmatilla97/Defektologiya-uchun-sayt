@extends('layouts/def');
@section('content')   
    <div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
        <div class="container text-center">
            <h2>@if (!isset($notFound)) Mutaxasis haqida @else {{ $notFound }} @endif</h2>
            <nav>
                <ol class="flex items-center justify-center space-x-3">
                <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa</a></li>
                <li class="breadcrumb-item">-</li>
                <li class="breadcrumb-item"><a href="{{ route('site.specialistsIndex')}}">Mutaxasislar</a></li>
                <li class="breadcrumb-item">-</li>
                <li class="text-primary">Siz turgan sahifa</li>
                </ol>
            </nav>
        </div>
    </div>
    @if (!isset($notFound))
    <div class="section-padding bg-[url('../images/all-img/insbg.png')] bg-contain   bg-no-repeat">
        <div class="container">
        <div class="grid grid-cols-12 xl:gap-0 gap-[30px]">
            <div class="lg:col-span-4 col-span-12 ">
            <div class="bg-white shadow-box7 rounded-md max-w-[350px] lg:sticky lg:top-10">
                <div class="h-[400px] mb-8">
                <img src="{{ $specialistIndex->image }}" alt="{{ $specialistIndex->fish }}" class="w-full h-full block object-cover rounded-t-md">
                </div>
                <div class="px-8 pb-8">
                <h5 class=" text-2xl font-bold text-black mb-4">{{ $specialistIndex->fish }}</h5>
                <div class="mb-8">
                    {!! Str::limit($specialistIndex->desc, 120) !!}
                </div>
                <ul class=" space-y-[19px]">
                    <li class=" flex items-center space-x-3">
                    <div class="flex-none">
                        <span class="w-8 h-8 rounded bg-secondary text-white flex flex-col items-center justify-center text-lg">
                                                <iconify-icon icon="heroicons:envelope"></iconify-icon>
                                            </span>
                    </div>
                    <span class=" flex-1">{{ $specialistIndex->email }}</span>
                    </li>
                    <li class=" flex items-center space-x-3">
                    <div class="flex-none">
                        <span class="w-8 h-8 rounded bg-secondary text-white flex flex-col items-center justify-center text-lg">
                                                <iconify-icon icon="heroicons:phone"></iconify-icon>
                                            </span>
                    </div>
                    <span class=" flex-1">{{ $specialistIndex->phone }}</span>
                    </li>
                  
                </ul>
                <div class=" text-xl text-black mt-8 mb-4">Ijtimoiy tarmoqlari:</div>
                <ul class="flex space-x-4 ">
                    <li>
                    @if($specialistIndex->facebook_follow)
                    <a href="{{ $specialistIndex->facebook_follow }}" class="flex h-10 w-10">
                        <img src="{{ asset('/assets/images/icon/fb.svg')}}" alt="">
                    </a>
                    </li>
                    @endif
                    @if($specialistIndex->tg_follow)
                    <li>
                    <a href="{{ $specialistIndex->tg_follow }}" class="flex h-10 w-10">
                        <img src="{{ asset('assets/images/icon/telegram.svg')}}" alt="">
                    </a>
                    </li>
                    @endif
                    @if($specialistIndex->insta_follow)
                    <li>
                    <a href="{{ $specialistIndex->insta_follow }}" class="flex h-10 w-10">
                        <img src="{{ asset('assets/images/icon/ins.svg')}}" alt="">
                    </a>
                    </li>
                    @endif
                </ul>
                </div>
            </div>
            </div>
            <div class="lg:col-span-8 col-span-12">
            <div class="mb-10">
                <h2>{{ $specialistIndex->fish }}</h2>
                <span class=" inline-block text-primary">{{ $specialistIndex->lavozimi }}</span>
            </div>
            <div>
                {!! $specialistIndex->desc !!}
            </div>
            <div class=" grid xl:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-[30px] mt-24">


                <div class="bg-white shadow-box7 text-center pt-[64px] pb-8 px-[50px]  rounded-[8px] relative my-4">
                <img src="{{ asset('/assets/images/icon/counter-1.svg')}}" alt="" class=" absolute left-1/2 -translate-x-1/2 -top-10">
                <h4 class=" text-[44px] leading-[66px] text-black font-bold mb-1 ">
                    <span class="counter">
                        0
                    </span>
                    +
                </h4>
                <p>O'quvchilari soni</p>
                </div>

                <div class="bg-white shadow-box7 text-center pt-[64px] pb-8 px-[50px]  rounded-[8px] relative my-4">
                <img src="{{ asset('/assets/images/icon/counter-2.svg')}}" alt="" class=" absolute left-1/2 -translate-x-1/2 -top-10">
                <h4 class=" text-[44px] leading-[66px] text-black font-bold mb-1 ">
                    <span class="counter">
                       {{ $courses->count()}}
                    </span>
                    +
                </h4>
                <p>O'quv kurslari</p>
                </div>

                <div class="bg-white shadow-box7 text-center pt-[64px] pb-8 px-[50px]  rounded-[8px] relative my-4">
                <img src="{{ asset('/assets/images/icon/counter-3.svg')}}" alt="" class=" absolute left-1/2 -translate-x-1/2 -top-10">
                <h4 class=" text-[44px] leading-[66px] text-black font-bold mb-1 ">
                    <span class="counter">
                        0
                    </span>
                    +
                </h4>
                <p>Sertifikat olgan o'quvchilar</p>
                </div>

            </div>
            <div class="mt-20 mb-14">
                <div class="mini-title">{{ $specialistIndex->fish }}ning Malaka oshirish kurslari</div>
                <div class="column-title ">                
                <span class="shape-bg">Video</span> kurslar
                </div>
            </div>
            <div class=" grid xl:grid-cols-2 lg:grid-cols-1 md:grid-cols-2 grid-cols-1  gap-[30px]">

                @foreach ($courses as $item)              
                <a class=" bg-white shadow-box2 rounded-[8px] transition duration-100 hover:shadow-sm" href="#">
                <div class="course-thumb h-[248px] rounded-t-[8px]  relative">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
                    <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6">O'quv kursi</span>
                </div>
                <div class="course-content p-8">
                    <div class="text-secondary font-bold text-2xl mb-3">{{ $item->narxi }}</div>
                    <h4 class=" text-xl mb-3 font-bold">{{ $item->title }}</h4>
                    <div class="flex justify-between  space-x-3">
                    <span class=" flex items-center space-x-2">
                            <img src="assets/images/svg/file.svg" alt="">
                                <span>2 Lessons</span>
                    </span>
                    <span class=" flex items-center space-x-2">
                                <img src="{{ asset('/assets/images/svg/clock.svg')}}" alt="">
                                    <span>{{ $item->davomiylik_vaqti}}</span>
                    </span>
                    <span class=" flex items-center space-x-2">
                                    <img src="{{ asset('/assets/images/svg/star.svg')}}" alt="">
                                        <span>4.8</span>
                    </span>
                    </div>
                </div>
                </a>      
                @endforeach
              

            </div>
            <div class="text-center lg:pt-14 pt-8">
                {{ $courses->links('vendor.pagination.custom') }}
            </div>
            </div>
        </div>
        </div>
    </div>
    @else
        <img src="{{ asset('/assets/images/astronaut-600x800.gif')}}" alt="Image" class="mx-auto block">
    @endif
@endsection