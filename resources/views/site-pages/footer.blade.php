<footer class="bg-black bg-[url('../images/all-img/footer-bg-1.png')] bg-cover bg-center bg-no-repeat">
    <div class="section-padding container">
      <div class="grid grid-cols-1 gap-7 md:grid-cols-2 lg:grid-cols-3">
        <div class="single-footer">
          <div class="lg:max-w-[270px]">
            <a href="#" class="mb-10 block">
              <img src="{{ asset('assets/images/logo-text-oq.png')}}" alt="">
            </a>
            <p>
              Toshkent Shaxar Defektologlar Assotsiatsiyasi Web Sayti
            </p>
            <ul class="flex space-x-4 pt-8">
              <li>
                <a href="#" class="flex h-12 w-12 flex-col items-center justify-center rounded bg-white bg-opacity-[0.08] text-2xl text-white
                  transition hover:bg-primary hover:text-white">
                  <iconify-icon icon="bxl:facebook"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="#" class="flex h-12 w-12 flex-col items-center justify-center rounded bg-white bg-opacity-[0.08] text-2xl text-white
                  transition hover:bg-primary hover:text-white">
                  <iconify-icon icon="bxl:twitter"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="#" class="flex h-12 w-12 flex-col items-center justify-center rounded bg-white bg-opacity-[0.08] text-2xl text-white
                  transition hover:bg-primary hover:text-white">
                  <iconify-icon icon="bxl:linkedin"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="#" class="flex h-12 w-12 flex-col items-center justify-center rounded bg-white bg-opacity-[0.08] text-2xl text-white
                  transition hover:bg-primary hover:text-white">
                  <iconify-icon icon="bxl:instagram"></iconify-icon>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="single-footer">
          <div class="flex space-x-[80px]">
            <div class="flex-1 lg:flex-none">
              <h4 class="mb-8 text-2xl font-bold text-white">Havolalar</h4>
              <ul class="list-item space-y-5">
                <li>
                  <a href="{{ route('site.index')}}">Bosh sahifa</a>
                </li>
                <li>
                  <a href="">Biz haqimizda</a>
                </li>
                <li>
                  <a href="{{ url('/news-and-events-sort/only_news')}}">Yangiliklar</a>
                </li>
                <li>
                  <a href="{{ url('/news-and-events-sort/only_event')}}">E'lonlar</a>
                </li>
                <li>
                  <a href="{{ route('site.projectsIndex')}}">Proyektlar</a>
                </li>
                <li>
                  <a href="{{ route('site.seminarIndex')}}">Seminarlar</a>
                </li>
              </ul>
            </div>
            <div class="flex-1 lg:flex-none">
              <h4 class="mb-8 text-2xl font-bold text-white"></h4>
              <ul class="list-item space-y-5">
                <li>
                  <a href="{{ route('site.specialistsIndex')}}">Mutaxasislar</a>
                </li>
                <li>
                  <a href="{{ route('site.coursesIndex')}}">Kurslar</a>
                </li>
                <li>
                  <a href="#">Biz bilan bog'lanish</a>
                </li>
                <li>
                  <a href="{{ route('login')}}">Kirish</a>
                </li>
                <li>
                  <a href="{{ route('register')}}">Ro'yxatdan o'tish</a>
                </li>
                <li>
                  <a href="#">Savol-javoblar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="single-footer">
          <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A853b65148411bb715409ca1c365ea670387edf8f4f7461c6f0c2fd3224e669d3&amp;width=500&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
      </div>
    </div>
    <div class="container border-t border-white border-opacity-[0.1] py-8 text-center text-base">
      &copy; Copyright 2023 | ❤️ RAXI-DEV - Raxmatilla Fayziyev | All Rights Reserved
    </div>
  </footer>