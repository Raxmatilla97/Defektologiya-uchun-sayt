@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
    
      <h2>@if (!isset($notFound)){{ $newsEvent->title }} @else {{ $notFound }} @endif</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="breadcrumb-item"><a href="{{route('site.news-and-events')}}">Yangiliklar va E'lonlar </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa</li>
        </ol>
      </nav>
    </div>
  </div>

  @if (!isset($notFound))
  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      {{-- <div style="width: 100%; height: 430px; overflow: hidden;">
        <img src="{{'/'}}storage/{{ $newsEvent->image }}" style="width: 100%; height: auto;">
      </div> --}}
      <div style="background-image: url('{{'/'}}storage/{{ $newsEvent->image }}'); background-position: center; background-repeat: no-repeat; background-size: cover; width: 100%; height: 430px; overflow: hidden;"></div>

      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <h3>
            {{ $newsEvent->title  }}
          </h3>
          <div class="img-desc lg:my-6 my-4">
            {!! $newsEvent->desc !!}
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
         
          <div class="flex justify-between border-y border-[#ECECEC] py-4 md:mt-12 mt-10">
            <div class=" text-black font-semibold">Tarqatish</div>
            <ul class="flex space-x-3 lg:justify-end items-center  ">
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="{{ asset('/assets/images/icon/fb.svg')}}" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="{{ asset('/assets/images/icon/tw.svg')}}" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="{{ asset('/assets/images/icon/pn.svg')}}" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="{{ asset('/assets/images/icon/ins.svg')}}" alt="">
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="lg:col-span-4 col-span-12 relative lg:-mt-20">


          <div class="sidebarWrapper max-w-[90%] mx-auto space-y-[30px]">
            <div class="wdiget custom-text space-y-5 ">
              <h4 class=" widget-title">Sahifa ma'lumotlari</h4>
              <ul class="list space-y-6  ">

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>Sayt ma'muriyati tomonidan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-c.svg')}}" alt="" />
                    <div>{{ $newsEvent->created_at->diffForHumans()  }} joylangan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>Bo'lim:@if ($newsEvent->news_or_event == 'event') E'lon @else Yangilik @endif</div>
                  </div>
                </li>

                {{-- <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>yourmail@gmail.com</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>+88018 2829 98267</div>
                  </div>
                </li> --}}

              </ul>
             

            </div>

            <div class="wdiget">
              <h4 class=" widget-title">O'xshash xabarlar</h4>
              <ul class="list space-y-6">
                @foreach($oxshashXabarlar as $item)
                <li class=" flex space-x-4 border-[#ECECEC] ">
                  <div class="flex-none ">
                    <div class="h-20 w-20   rounded-full">
                      <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-full">
                    </div>
                  </div>
                  <div class="flex-1 ">

                    <div class="mb-1 font-bold text-black capitalize">
                       <a href="{{ route('site.news-and-events-single', $item->slug )}}">{{ Str::limit($item->title, 40) }}</a>

                    </div>
                    <span class=" text-primary font-semibold">@if ($item->news_or_event == 'news') Yangilik @else E'lon @endif</span>
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