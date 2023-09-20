@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>@if (!isset($notFound))Malaka oshirish kursi @else {{ $notFound }} @endif</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="breadcrumb-item"><a href="{{ route('site.coursesIndex')}}">Malaka oshirish kurslari </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgan sahifa </li>
        </ol>
      </nav>
    </div>
  </div>

  @if (!isset($notFound))
  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <div class="single-course-details">
            <div class="xl:h-[470px] h-[350px] mb-10 course-main-thumb">
              <img src="{{ $courseIndex->image }}" alt="{{ $courseIndex->title }}" class=" rounded-md object-fut w-full h-full block">
            </div>
            <div class=" mb-6">
              <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white ">O'quv kursi</span>
            </div>
            <h2>{{ $courseIndex->title }}</h2>
            <div class="author-meta mt-6 sm:flex  lg:space-x-16 sm:space-x-5 space-y-5 sm:space-y-0 items-center">
              <div class="flex space-x-4 items-center group">
                <div class="flex-none">
                  <div class="h-12 w-12 rounded">
                    <img src="{{ $courseIndex->specialist->image }}" alt="{{ $courseIndex->specialist->fish }}" class=" object-cover w-full h-full rounded">
                  </div>
                </div>
                <div class="flex-1">
                  <span class=" text-secondary  ">Mutaxasis
                                        <a href="#" class=" text-black">
                                            : {{ $courseIndex->specialist->fish }}</a>
                                    </span>
                </div>
              </div>
              <div>
                <span class=" text-secondary  ">Kurs yaratildi:
                                    <a href="#" class=" text-black">
                                      {{ $courseIndex->created_at->diffForHumans() }}</a>
                                </span>
              </div>
            </div>
            <div class="nav-tab-wrapper mt-12">
              <ul id="tabs-nav" class=" course-tab mb-8">
                <li>
                  <a href="#tab1">
                    Kurs haqida
                  </a>
                </li>
                <li>
                  <a href="#tab2">
                    Video darslar
                  </a>
                </li>
                <li>
                  <a href="#tab3">
                    Mutaxasis haqida
                  </a>
                </li>
              
              </ul>
              <div id="tabs-content">
                <div id="tab1" class="tab-content">

                  <div>
                    <h3 class=" text-2xl">Malaka oshirish kursi haqida qisqacha</h3>
                    <div class="mt-4">
                      {!! $courseIndex->desc !!}
                    </div>
                   
                    <hr class="mt-12">
                  </div>
                </div>
                <div id="tab2" class="tab-content">


                  <div>
                    <h3 class=" text-2xl">Video darslar</h3>
                    <div class="md:flex md:space-x-10  space-x-3 flex-wrap mt-4 mb-6">
                      <hr>
                    </div>
                    <ul class="list  course-accrodain space-y-6">
                      @if ($videoDarslar->isNotEmpty())
                      @foreach($videoDarslar as $item)
                      <li>
                        <button type="button" class="accrodain-button">
                          <span class="icon-pm fle x-none"></span>
                          <span class=" flex-1">{{  $item->title }}</span>
                          <div class=" flex-none extra-text hidden sm:block ">
                            {{  $item->created_at->format('y-M-d H:i') }}
                          </div>
                        </button>
                        <div class="content hidden">
                          <div class=" text-xl font-semibold text-black mb-2">{{  $item->title }}</div>
                          <p>
                            {!!  $item->desc !!}
                          </p>
                      
                          <div class=" mt-8 ">                           
                            @php
                              $url = "$item->youtube";
                              $video_id = '';
            
                              // Parse the URL and extract the video ID
                              $parts = parse_url($url);
                              if (isset($parts['query'])) {
                                  parse_str($parts['query'], $query);
                                  if (isset($query['v'])) {
                                      $video_id = $query['v'];
                                  }
                              }
                            @endphp
                            @if (!empty($video_id))
                            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{ $video_id }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @endif
                          </div>
                        </div>
                      </li>
                      @endforeach
                      @else
                      <img src="https://cdn.dribbble.com/users/550484/screenshots/2128340/404-gif.gif" alt="Image" class="mx-auto block">
                      <h3 class="text-center">Video darslar hali joylanmagan!</h3>
                      @endif
                   


                    </ul>
                  </div>
                </div>
                <div id="tab3" class="tab-content">


                  <div class=" bg-[#F8F8F8] rounded-md p-8">
                    <div class="md:flex space-x-5 mb-8">
                      <div class="h-[310px] w-[270px] flex-none rounded mb-5 md:mb-0">
                        <img src="{{ $courseIndex->specialist->image}}" alt="" class=" w-full h-full object-cover  rounded">
                      </div>
                      <div class="flex-1">
                        <div class="max-w-[300px]">
                          <h4 class=" text-[34px] font-bold leading-[51px]">{{ $courseIndex->specialist->fish}}</h4>
                          <div class=" text-primary mb-6">
                            {{ $courseIndex->specialist->lavozim}}
                          </div>
                          <ul class=" list space-y-4">

                            <li class=" flex space-x-3">
                              <img src="assets/images/icon/file2.svg" alt="" />
                              <div>
                                Hozirgacha {{ $courseIndex->specialist->courses->count()}}+ dan ortiq kurslar muallifi
                              </div>
                            </li>
                       


                          </ul>
                          <ul class=" flex space-x-3 mt-8">

                            <li class="">
                              <a href="#"><img src="{{ asset('/assets/images/social/fb.svg')}}" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="{{ asset('/assets/images/social/ln.svg')}}" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="{{ asset('/assets/images/social/youtube.svg')}}" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="{{ asset('/assets/images/social/instra.svg')}}" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="{{ asset('/assets/images/social/twiiter.svg')}}" alt="" />
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                    <p>
                      {!! $courseIndex->specialist->desc !!}
                    </p>
                  </div>
                </div>
                <div id="tab4" class="tab-content">

                  <div>
                    <div class="grid grid-cols-12 gap-5">
                      <div class="md:col-span-8 col-span-12">

                        <div class="flex items-center space-x-4  mb-5 last:mb-0 ">
                          <div class="flex-none">
                            <div class="flex space-x-1 text-xl  ">

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>


                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="progressbar-group flex items-center space-x-4">
                              <div class="rounded-[2px] overflow-hidden bg-opacity-10 bg-black h-[6px] relative flex-1">
                                <div class="ani  h-[6px] bg-secondary block absolute left-0 top-1/2 -translate-y-1/2 " data-progress="40"></div>
                              </div>
                              <div class="flex-none">
                                <span class=" block mb-2  font-semibold">40%</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex items-center space-x-4  mb-5 last:mb-0 ">
                          <div class="flex-none">
                            <div class="flex space-x-1 text-xl  ">

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>


                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="progressbar-group flex items-center space-x-4">
                              <div class="rounded-[2px] overflow-hidden bg-opacity-10 bg-black h-[6px] relative flex-1">
                                <div class="ani  h-[6px] bg-secondary block absolute left-0 top-1/2 -translate-y-1/2 " data-progress="10"></div>
                              </div>
                              <div class="flex-none">
                                <span class=" block mb-2  font-semibold">10%</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex items-center space-x-4  mb-5 last:mb-0 ">
                          <div class="flex-none">
                            <div class="flex space-x-1 text-xl  ">

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>


                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="progressbar-group flex items-center space-x-4">
                              <div class="rounded-[2px] overflow-hidden bg-opacity-10 bg-black h-[6px] relative flex-1">
                                <div class="ani  h-[6px] bg-secondary block absolute left-0 top-1/2 -translate-y-1/2 " data-progress="0"></div>
                              </div>
                              <div class="flex-none">
                                <span class=" block mb-2  font-semibold">0%</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex items-center space-x-4  mb-5 last:mb-0 ">
                          <div class="flex-none">
                            <div class="flex space-x-1 text-xl  ">

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>


                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="progressbar-group flex items-center space-x-4">
                              <div class="rounded-[2px] overflow-hidden bg-opacity-10 bg-black h-[6px] relative flex-1">
                                <div class="ani  h-[6px] bg-secondary block absolute left-0 top-1/2 -translate-y-1/2 " data-progress="0"></div>
                              </div>
                              <div class="flex-none">
                                <span class=" block mb-2  font-semibold">0%</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="flex items-center space-x-4  mb-5 last:mb-0 ">
                          <div class="flex-none">
                            <div class="flex space-x-1 text-xl  ">

                              <iconify-icon icon="heroicons:star-20-solid" class="text-tertiary"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>

                              <iconify-icon icon="heroicons:star-20-solid" class="text-[#E6E6E6]"></iconify-icon>


                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="progressbar-group flex items-center space-x-4">
                              <div class="rounded-[2px] overflow-hidden bg-opacity-10 bg-black h-[6px] relative flex-1">
                                <div class="ani  h-[6px] bg-secondary block absolute left-0 top-1/2 -translate-y-1/2 " data-progress="0"></div>
                              </div>
                              <div class="flex-none">
                                <span class=" block mb-2  font-semibold">0%</span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>


                      <div class="md:col-span-4 col-span-12">
                        <div class="bg-white min-h-[219px] p-6 flex flex-col justify-center items-center shadow-box7 rounded space-y-3">
                          <h2>
                            4.9
                          </h2>
                          <div class="flex space-x-3">
                            <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                          </div>
                          <span class=" block">(2 Review)</span>
                        </div>
                      </div>

                    </div>
                    <!-- review comments -->
                    <div class=" mt-8">
                      <h4 class=" text-xl font-bold text-black">Reviews</h4>
                      <ul class=" list space-y-6 mt-6">
                        <li class=" flex space-x-6 ">
                          <div class="flex-none">
                            <div class="h-[72px] w-[72px] rounded-full">
                              <img src="assets/images/all-img/cmnt-1.png" alt="" class=" object-cover w-full h-full">
                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="flex space-x-3 mb-4">
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            </div>
                            <p>
                              There are many variations of passages of Lorem Ipsum available, but the
                              majority have suffered alteration.
                            </p>
                            <div class="author mt-4">
                              <span class="block text-xl font-bold text-black">Daniel Smith</span>
                              <span class="block">Jan 24, 2022</span>
                            </div>
                          </div>
                        </li>
                        <li class=" flex space-x-6 ">
                          <div class="flex-none">
                            <div class="h-[72px] w-[72px] rounded-full">
                              <img src="assets/images/all-img/cmnt-2.png" alt="" class=" object-cover w-full h-full">
                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="flex space-x-3 mb-4">
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                              <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                            </div>
                            <p>
                              There are many variations of passages of Lorem Ipsum available, but the
                              majority have suffered alteration.
                            </p>
                            <div class="author mt-4">
                              <span class="block text-xl font-bold text-black">Daniel Smith</span>
                              <span class="block">Jan 24, 2022</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lg:col-span-4 col-span-12">
          <div class="sidebarWrapper space-y-[30px]">
            <div class="wdiget custom-text space-y-5 ">
              {{-- <a class="h-[220px]  rounded relative block" href="{{ $courseIndex->youtube }}">
                <img src="{{ asset('assets/images/all-img/thumb.png')}}" alt="" class=" block w-full h-full object-cover rounded " />
                <div class=" absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                  <img src="{{ asset('assets/images/svg/play.svg')}}" alt="">
                </div>
              </a> --}}
              @php
                  $url = "$courseIndex->youtube";
                  $video_id = '';

                  // Parse the URL and extract the video ID
                  $parts = parse_url($url);
                  if (isset($parts['query'])) {
                      parse_str($parts['query'], $query);
                      if (isset($query['v'])) {
                          $video_id = $query['v'];
                      }
                  }
              @endphp
              @if (!empty($video_id))
              <iframe width="100%" height="300px" src="https://www.youtube.com/embed/{{ $video_id }}" title="{{ $courseIndex->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              @endif
              <h3>{{ $courseIndex->narxi}}</h3>
              <button class="btn btn-primary w-full text-center ">
                Kursga yozilish
              </button>
              <ul class="list  ">

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('assets/images/icon/user.svg')}}" alt="" />
                    <div class=" text-black font-semibold">Mutaxasis</div>
                  </div>
                  <div class="flex-none">
                    {{ $courseIndex->specialist->fish }}
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('assets/images/icon/file2.svg')}}" alt="" />
                    <div class=" text-black font-semibold">Darslar soni</div>
                  </div>
                  <div class="flex-none">
                   {{ $videoDarslar->count() }}
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('assets/images/icon/clock.svg')}}" alt="" />
                    <div class=" text-black font-semibold">Davomiyligi</div>
                  </div>
                  <div class="flex-none">
                    {{ $courseIndex->davomiylik_vaqti }}
                  </div>
                </li>               


                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="{{ asset('assets/images/icon/web.svg')}}" alt="" />
                    <div class=" text-black font-semibold">Dars tili</div>
                  </div>
                  <div class="flex-none">
                    {{ $courseIndex->kurs_tili }}
                  </div>
                </li>

              </ul>
              <ul class="flex space-x-4 items-center pt-3 ">
                <li class=" text-black font-semibold">
                 Tarqatish:
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="{{ asset('assets/images/icon/fb.svg')}}" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="{{ asset('assets/images/icon/tw.svg')}}" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="{{ asset('assets/images/icon/pn.svg')}}" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="{{ asset('assets/images/icon/ins.svg')}}" alt="">
                  </a>
                </li>
              </ul>
            </div>

            <div class="wdiget">
              <h4 class=" widget-title">O'xshash kurslar</h4>
              <ul class="list">
                @foreach ($oxshashKurslar as $item)
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                  <div class="flex-none ">
                    <div class="h-20 w-20  rounded">
                      <img src="{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded">
                    </div>
                  </div>
                  <div class="flex-1 ">                    
                    <div class="mb-1 font-semibold text-black">                   
                      <a href="{{ route('site.courseSingle', $item->slug)}}">{{ Str::limit($item->title, 35) }}</a>
                    </div>
                    <span class=" text-secondary font-semibold">{{ $item->narxi }}</span>
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