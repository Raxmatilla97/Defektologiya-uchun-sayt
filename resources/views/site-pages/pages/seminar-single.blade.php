@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
    
      <h2>@if (!isset($notFound)){{ $seminarIndex->title }} @else {{ $notFound }} @endif</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="breadcrumb-item"><a href="{{route('site.seminarIndex')}}">Seminarlar sahifasi </a></li>
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
      <img src="{{'/'}}storage/{{ $seminarIndex->image }}" alt="" class=" lg:mb-10 mb-6 block w-full">
      </div> --}}
      <div style="background-image: url('{{'/'}}storage/{{ $seminarIndex->image }}'); background-position: center; background-repeat: no-repeat; background-size: cover; width: 100%; height: 430px; overflow: hidden;"></div>
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <h3>
            {{ $seminarIndex->title  }}
          </h3>

          @if ($seminarIndex->boladigan_kun->isPast())
          <div class="bg-secondary text-white p-10 rounded-md mt-5" style="background-color: #ff0000ad; color: #FFF">
            Seminar tugagan | {{ $seminarIndex->boladigan_kun->diffForHumans() }}
          </div>
          @else
          <div class="bg-secondary text-white p-10 rounded-md mt-5">
            <div id="timer" class="md:flex space-y-4 md:space-y-0 justify-between text-center "></div>
          </div>
          <script>            
            if (document.getElementById("timer")) {
              var countDownDate = new Date("{{ $seminarBoladiganKun }}").getTime(); // Update the count down every 1 second

              var x = setInterval(function () {
                // Get today's date and time
                var now = new Date().getTime(); // Find the distance between now and the count down date

                var distance = countDownDate - now; // Time calculations for days, hours, minutes and seconds

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                var seconds = Math.floor(distance % (1000 * 60) / 1000); // Display the result in the element with id="demo"

                document.getElementById("timer").innerHTML = "<div class='text-[44px] font-bold'>" + days + "<div class=' text-lg font-medium mt-2 capitalize'>kun</div></div>" + "<div class='text-[44px] font-bold'>" + hours + "<div class='text-lg font-medium mt-2 capitalize'>soat</div></div>" + "<div class='text-[44px] font-bold'>" + minutes + "<div class='text-lg font-medium mt-2 capitalize'>minut</div></div>" + "<div class='text-[44px] font-bold'>" + seconds + "<div class='text-lg font-medium mt-2 capitalize'>sekund</div></div>"; // If the count down is finished, write some text

                if (distance < 0) {
                  clearInterval(x);
                  document.getElementById("timer").innerHTML = "EXPIRED";
                }
              }, 1000);
            } // 1.13 modal triger
          </script>
          @endif          
                 
          <div class="img-desc lg:my-6 my-4">
            {!! $seminarIndex->desc !!}
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
                    <div> @if ($seminarIndex->boladigan_kun->isPast())
                      <span  class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute " style="background-color: #ff0000ad; color: #FFF">
                        Tugagan
                      </span>
                      @else
                      <span  class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute ">
                        Rejalashtirilgan
                      </span>
                      @endif  </div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>Sayt ma'muriyati tomonidan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-c.svg')}}" alt="" />
                    <div>{{ $seminarIndex->created_at->diffForHumans()  }} joylangan</div>
                  </div>
                </li>

                <li class=" flex space-x-3 ">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('/assets/images/svg/circle-clock.svg')}}" alt="" />
                    <div>Bo'lim: Seminar</div>
                  </div>
                </li>              

              </ul>
             

            </div>

            <div class="wdiget">
              <h4 class=" widget-title">O'xshash seminarlar</h4>
              <ul class="list space-y-6">
                @foreach($oxshashSeminarlar as $item)
                <li class=" flex space-x-4 border-[#ECECEC] ">
                  <div class="flex-none ">
                    <div class="h-20 w-20   rounded-full">
                      <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-full">
                    </div>
                  </div>
                  <div class="flex-1 ">

                    <div class="mb-1 font-bold text-black capitalize">
                       <a href="{{ route('site.seminarSingle', $item->slug )}}">{{ Str::limit($item->title, 30) }}</a>

                    </div>
                    <span class=" text-primary font-semibold">Seminar</span>
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