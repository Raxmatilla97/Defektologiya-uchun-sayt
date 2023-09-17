@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>{{ $newsEvent->title }} </h2>
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

  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <img src="/{{ $newsEvent->image }}" alt="" class=" lg:mb-10 mb-6 block w-full">
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <h3>
            {{ $newsEvent->title  }}
          </h3>
          <div class="lg:my-6 my-4">
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
            by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
            Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
            generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the
            Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to
            generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition,
            injected humour.
          </div>         
          
          <div class="flex justify-between border-y border-[#ECECEC] py-4 md:mt-12 mt-10">
            <div class=" text-black font-semibold">Previous</div>
            <ul class="flex space-x-3 lg:justify-end items-center  ">
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="assets/images/icon/fb.svg" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="assets/images/icon/tw.svg" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="assets/images/icon/pn.svg" alt="">
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 w-8">
                  <img src="assets/images/icon/ins.svg" alt="">
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
                    <img src="assets/images/svg/circle-clock.svg" alt="" />
                    <div>Sayt ma'muriyati tomonidan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/svg/circle-c.svg" alt="" />
                    <div>{{ $newsEvent->created_at->diffForHumans()  }} joylangan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/svg/circle-clock.svg" alt="" />
                    <div>Bo'lim:@if ($newsEvent->news_or_event == 'news') Yangilik @else E'lon @endif</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/svg/circle-clock.svg" alt="" />
                    <div>yourmail@gmail.com</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/svg/circle-clock.svg" alt="" />
                    <div>+88018 2829 98267</div>
                  </div>
                </li>

              </ul>
             

            </div>

            <div class="wdiget">
              <h4 class=" widget-title">O'xshash xabarlar</h4>
              <ul class="list space-y-6">
                @foreach($oxshashXabarlar as $item)
                <li class=" flex space-x-4 border-[#ECECEC] ">
                  <div class="flex-none ">
                    <div class="h-20 w-20   rounded-full">
                      <img src="/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-full">
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
@endsection