<header class="site-header  header-normal top-0 bg-white z-[9] rt-sticky">
    <div class="main-header py-5">
      <div class="container">
        <div class=" flex items-center justify-between flex-wrap">
          <a href="{{ route('site.index')}}" class="brand-logo flex-none lg:mr-10 md:w-auto max-w-[120px] ">
            <img src="{{ asset('assets/images/logo/logo-text.png')}}" alt=""></a>
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
                  <a href="{{ route('site.seminarIndex')}}">Seminarlar</a>
                </li>
                <li>
                  <a href="{{ route('site.specialistsIndex')}}">Mutaxassislar</a>
                </li>
              
                <li>
                  <a href="{{route('site.coursesIndex')}}">Kurslar</a>
                </li>
              </ul>
              <div class="lg:block hidden">
                <div class="border border-gray rounded-md  h-[46px] modal-search">
                  <input type="text" class=" block w-full rounded-md  h-full border-none ring-0 focus:outline-none  focus:ring-0" placeholder="Search..">
                </div>
              </div>
            </div>
            <div class="flex-none flex space-x-[18px]">
              <button type="button" class=" md:w-[56px] md:h-[56px] h-10 w-10 rounded bg-[#F8F8F8] flex flex-col items-center justify-center modal-trigger">
                <img src="{{ asset('assets/images/svg/search.svg')}}" alt=""></button>
              <div class=" block   lg:hidden">
                <button type="button" class=" text-3xl md:w-[56px] h-10 w-10 md:h-[56px] rounded bg-[#F8F8F8] flex flex-col items-center justify-center
                                                menu-click">
                  <iconify-icon icon="cil:hamburger-menu" rotate="180deg"></iconify-icon>
                </button>
              </div>
              <div class="hidden lg:block">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary py-[10px] px-8">Profil</a>
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
      <a href="index.html" class="brand-logo flex-none mr-10 ">
        <img src="{{ asset('assets/images/logo/logo.svg')}}" alt="">
      </a>
      <span class=" text-3xl text-black cursor-pointer rt-mobile-menu-close">
            <iconify-icon icon="fe:close"></iconify-icon>
        </span>
    </div>
    <div class="mobile-menu mt-6 flex-1 ">
      <ul class="menu-active-classes">
        <li class=" menu-item-has-children">
          <a href="#">Home</a>
          <ul class="sub-menu">
            <li>
              <a href="index.html">Home One</a>
            </li>
            <li>
              <a href="index2.html">Home Two</a>
            </li>
            <li>
              <a href="index3.html">Home Three</a>
            </li>
          </ul>
        </li>
        <li class="menu-item-has-children">
          <a href="#">Pages</a>
          <ul class="sub-menu">
            <li>
              <a href="about.html">About 1</a>
            </li>
            <li>
              <a href="about2.html">About 2</a>
            </li>
            <li>
              <a href="instructor.html">instructor 1</a>
            </li>
            <li>
              <a href="instructor2.html">instructor 2</a>
            </li>
            <li>
              <a href="instructor-details.html">instructor Single</a>
            </li>
            <li>
              <a href="event.html">Event</a>
            </li>
            <li>
              <a href="event-single.html">Event single</a>
            </li>
            <li>
              <a href="404.html">404</a>
            </li>
          </ul>
        </li>
        <li class="menu-item-has-children">
          <a href="#">Courses</a>
          <ul class="sub-menu">
            <li>
              <a href="courses.html">courses</a>
            </li>
            <li>
              <a href="courses-sidebar.html">courses Sidebar</a>
            </li>
            <li>
              <a href="single-course.html">Single-course</a>
            </li>
          </ul>
        </li>
        <li class="menu-item-has-children">
          <a href="#">Blog</a>
          <ul class="sub-menu">
            <li>
              <a href="blog.html">Blog</a>
            </li>
            <li>
              <a href="blog-full.html">Full Width</a>
            </li>
            <li>
              <a href="blog-standard.html">Blog Standard</a>
            </li>
            <li>
              <a href="blog-single.html">Single Blog</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="contact.html">Contacts</a>
        </li>
      </ul>
    </div>
    <div class=" flex-none pb-4">
      <div class=" text-center text-black font-semibold mb-2">Follow Us</div>
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