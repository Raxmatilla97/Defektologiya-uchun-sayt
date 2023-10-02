<header class="site-header  header-normal top-0 bg-white z-[9] rt-sticky">
  <div class="main-header py-5">
    <div class="container">
      <div class=" flex items-center justify-between flex-wrap">
        <a href="{{ route('site.index')}}" class="brand-logo flex-none lg:mr-10 md:w-auto max-w-[120px] ">
          <img src="{{ asset('assets/images/logo-text2.png')}}" alt=""></a>
        <div class="flex items-center flex-1">
          <div class="flex-1 main-menu  lg:relative   xl:mr-[7px] mr-6">
            <ul class="menu-active-classes">
              <li>
                <a href="{{route('site.news-and-events')}}">Xabarlar</a>
              </li>
              <li>
                <a href="{{ route('site.projectsIndex')}}">Proyektlar</a>
              </li>
              <li>
                <a href="{{route('site.coursesIndex')}}">Kurslar</a>
              </li>
              <li>
                <a href="{{ route('site.seminarIndex')}}">Seminarlar</a>
              </li>
              <li>
                <a href="{{ route('site.specialistsIndex')}}">Mutaxassislar</a>
              </li>
              
            </ul>
            <div class="lg:block hidden">
              <div class="border border-gray rounded-md  h-[46px] modal-search">
                <input type="text" class=" block w-full rounded-md  h-full border-none ring-0 focus:outline-none  focus:ring-0" placeholder="Search..">
              </div>
            </div>
          </div>
          <div class="flex-none flex space-x-[18px]">
           {{-- <button type="button" class=" md:w-[56px] md:h-[56px] h-10 w-10 rounded bg-[#F8F8F8] flex flex-col items-center justify-center modal-trigger">
              <img src="{{ asset('assets/images/svg/search.svg')}}" alt=""></button> --}}
            <div class=" block   lg:hidden">
              <button type="button" class=" text-3xl md:w-[56px] h-10 w-10 md:h-[56px] rounded bg-[#F8F8F8] flex flex-col items-center justify-center
                                              menu-click">
                <iconify-icon icon="cil:hamburger-menu" rotate="180deg"></iconify-icon>
              </button>
            </div> 
            <div class="hidden lg:block">
              @auth
                  <a href="{{ route('dashboard.kurslarSearch') }}" class="btn btn-primary py-[10px] px-8">Profil</a>
              @else
                  <a href="{{ route('login') }}" class="btn btn-primary py-[10px] px-8">Kirish</a>
              @endauth
          </div>
          </div>
        </div>
      </div>
      <div class="lg:hidden block mt-4">
        <div class="border border-gray rounded-md  h-[46px] modal-search">
          <input type="text" class=" block w-full rounded-md  h-full border-none ring-0 focus:outline-none  focus:ring-0" placeholder="Search..">
        </div>
      </div>
    </div>
  </div>
</header>

<div class="openmobile-menu fixed top-0 h-screen pt-10 pb-6 bg-white shadow-box2 w-[320px] overflow-y-auto flex flex-col
      z-[999]">
  <div class="flex justify-between px-6 flex-none">
    <a href="{{'/'}}" class="brand-logo flex-none mr-10 ">
      <img style="width: 150px" src="{{ asset('assets/images/logo-text2.png')}}" alt="">
    </a>
    <span class=" text-3xl text-black cursor-pointer rt-mobile-menu-close">
          <iconify-icon icon="fe:close"></iconify-icon>
      </span>
  </div>
  <div class="mobile-menu mt-6 flex-1 ">
    <ul class="menu-active-classes">
      <li>
        <a href="{{route('site.news-and-events')}}">Xabarlar</a>
      </li>
      <li>
        <a href="{{ route('site.projectsIndex')}}">Proyektlar</a>
      </li>
      <li>
        <a href="{{route('site.coursesIndex')}}">Kurslar</a>
      </li>
      <li>
        <a href="{{ route('site.seminarIndex')}}">Seminarlar</a>
      </li>
      <li>
        <a href="{{ route('site.specialistsIndex')}}">Mutaxassislar</a>
      </li>
      
    </ul>
  </div>
  <div class=" flex-none pb-4">
    <div class=" text-center text-black font-semibold mb-2">Kuzatib boring</div>
    <ul class="flex space-x-4 justify-center ">
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
</div>