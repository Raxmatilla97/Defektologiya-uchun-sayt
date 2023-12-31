<!-- events start -->
<div class=" section-padding bg-white bg-[url('../images/all-img/section-bg-13.png')]  bg-no-repeat">
    <div class="container">
      <div class="text-center mb-14">
        <div class="mini-title">Yangilik Va E'lonlar</div>
        <div class="column-title ">
          Yangiliklar Va E'lonlarni 
          <span class="shape-bg">Kuzatib Boring</span>
        </div>
      </div>
      <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">

        @foreach ($newsAndEvents as $item)
        <div class=" bg-white shadow-box5 rounded-[8px] transition duration-100 hover:shadow-box3">
          <div class="course-thumb h-[297px] rounded-t-[8px]  relative">
            <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
          </div>
          <div class="course-content p-8">
            <h4 class=" text-xl mb-5 font-bold">
              <a href="{{ route('site.news-and-events-single', $item->slug )}}" class=" hover:text-primary transition duration-150">
                {{ Str::limit($item->title, 50) }}
              </a>
            </h4>
            <ul class=" list space-y-3 mb-6">
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                        </span>
                <span>{{ $item->created_at->diffForHumans()  }}</span>
              </li>
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:map-pin"></iconify-icon>
                        </span>
                <span>
                  @if ($item->news_or_event == 'news')
                    Yangilik
                  @else
                    E'lon
                  @endif
                  </span>
              </li>
            </ul>
            <a href="{{ route('site.news-and-events-single', $item->slug )}}" class="btn px-8 py-[11px] bg-black text-white hover:bg-primary">
              @if ($item->news_or_event == 'news')
                Yangilikni o'qish
              @else
                E'lonni o'qish
              @endif
              </a>
          </div>
        </div>
        @endforeach
       

        {{-- <div class=" bg-white shadow-box5 rounded-[8px] transition duration-100 hover:shadow-box3">
          <div class="course-thumb h-[297px] rounded-t-[8px]  relative">
            <img src="{{ asset('assets/images/all-img/e2.png')}}" alt="" class=" w-full h-full object-cover rounded-t-[8px]">
          </div>
          <div class="course-content p-8">
            <h4 class=" text-xl mb-5 font-bold">
              <a href="event-single.html" class=" hover:text-primary transition duration-150">
                Yangilikni nomlanishi - ikkinchi yangilik
              </a>
            </h4>
            <ul class=" list space-y-3 mb-6">
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                        </span>
                <span>Dush, Okt 5, 2023 13:48</span>
              </li>
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:map-pin"></iconify-icon>
                        </span>
                <span>Yangilik</span>
              </li>
            </ul>
            <a href="event-single.html" class="btn px-8 py-[11px] bg-black text-white hover:bg-primary">Yangilikni ko'rish</a>
          </div>
        </div>

        <div class=" bg-white shadow-box5 rounded-[8px] transition duration-100 hover:shadow-box3">
          <div class="course-thumb h-[297px] rounded-t-[8px]  relative">
            <img src="{{ asset('assets/images/all-img/e3.png')}}" alt="" class=" w-full h-full object-cover rounded-t-[8px]">
          </div>
          <div class="course-content p-8">
            <h4 class=" text-xl mb-5 font-bold">
              <a href="event-single.html" class=" hover:text-primary transition duration-150">
                E'lonning nomlanishi - uchunchi e'lon
              </a>
            </h4>
            <ul class=" list space-y-3 mb-6">
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                        </span>
                <span>Dush, Okt 5, 2023 13:48</span>
              </li>
              <li class=" flex space-x-2">
                <span class="text-lg  text-secondary">
                            <iconify-icon icon="heroicons:map-pin"></iconify-icon>
                        </span>
                <span>E'lon</span>
              </li>
            </ul>
            <a href="event-single.html" class="btn px-8 py-[11px] bg-black text-white hover:bg-primary">E'lonni ko'rish</a>
          </div>
        </div> --}}

      </div>
    </div>
  </div>
  {{-- <!-- course block start -->
  <div class="lg:pt-10 section-padding-bottom bg-white bg-[url('../images/all-img/section-bg-14.png')] bg-center bg-no-repeat
            bg-cover">
    <div class="container">
      <div class="grid lg:grid-cols-2 grid-cols-1 gap-7">
        <div class="bg-[url('../images/all-img/bg-ins-1.png')] bg-cover  bg-no-repeat p-10  rounded-md">
          <div class="max-w-[337px]">
            <div class="mini-title">Build Your Career</div>
            <div class=" text-[34px] text-black leading-[51px]">
              Become an
              <span class="shape-bg">Instructor</span>
            </div>
            <div class=" mt-6 mb-12">
              Learn at your own pace, move the between multiple courses.
            </div>
            <a href="#" class="btn btn-primary">Apply Now</a>
          </div>
        </div>
        <div class="bg-[url('../images/all-img/bg-ins-2.png')]  bg-no-repeat p-10 bg-cover rounded-md">
          <div class="max-w-[337px]">
            <div class="mini-title">Build Your Career</div>
            <div class=" text-[34px] text-black leading-[51px]">
              Get Free
              <span class="shape-bg">Courses</span>
            </div>
            <div class=" mt-6 mb-12">
              Learn at your own pace, move the between multiple courses.
            </div>
            <a href="#" class="btn btn-black">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div> --}}