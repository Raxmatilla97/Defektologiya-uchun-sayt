 
  <!-- course section start -->
  <div class=" section-padding bg-[url('../images/all-img/section-bg-11.png')] bg-cover bg-no-repeat">
    <div class="container">
      <div class="flex items-center flex-wrap flex-y-4">
        <div class="flex-1">
          <div class="mini-title">Defektalogiya Kurslari</div>
          <div class="column-title ">
            Malaka Oshirish 
            <span class="shape-bg">Kurslarimiz</span>
          </div>
        </div>
        <div class="flex-none">
          <ul class="filter-list flex xl:space-x-[39px] space-x-4 ">
            <li data-filter="*" class="active tipy-info" data-tippy-content="New">
              Barchasi
            </li>
            <li data-filter=".cat-1">
              Bolim bir
            </li>
            <li data-filter=".cat-2">
              Bolim ikki
            </li>
            <li data-filter=".cat-3">
              bo'lim uch
            </li>
          </ul>
        </div>
      </div>
      <div class="flex flex-wrap pt-10 grids">
      
        @if ($coursesIndex->isNotEmpty())
        @foreach($coursesIndex as $item)
        <div class="cat-1 grid-item xl:w-1/3 lg:w-1/2 w-full px-[15px] mb-[15px]">
          <a class=" bg-white shadow-box2 rounded-[8px] transition duration-100 hover:shadow-sm block   mb-5 " href="{{ route('site.courseSingle', $item->slug)}}">
            <div class="course-thumb h-[248px] rounded-t-[8px]  relative">
              <img src="{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
              <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white absolute left-6 top-6">Birinchi bo'lim</span>
            </div>
            <div class="course-content p-8">
              <div class="text-secondary font-bold text-1xl mb-3">{{ $item->narxi }}</div>
              <h4 class=" text-xl mb-3 font-bold">{{ Str::limit($item->title, 50) }}</h4>
              <div class="flex justify-between  space-x-3">
                <span class=" flex items-center space-x-2">
                            <img src="{{ asset('assets/images/svg/file.svg')}}" alt="">
                                <span>{{ $item->videolar->count()}}</span>
                </span>
                <span class=" flex items-center space-x-2">
                                <img src="{{ asset('assets/images/svg/clock.svg')}}" alt="">
                                    <span>{{ $item->davomiylik_vaqti }}</span>
                </span>
                
              </div>
            </div>
          </a>
        </div>
        @endforeach
        @else          
          <h4 class="text-center ">Malaka oshirish kurslari hali joylanmagan!</h4>
        @endif
      </div>
      <div class="text-center lg:pt-16 pt-10">
        <a href="{{ route('site.coursesIndex')}}" class=" btn btn-primary">Barcha video kurslarni ko'rish</a>
      </div>
    </div>
  </div>