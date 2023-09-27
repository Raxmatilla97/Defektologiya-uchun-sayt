<!-- Article  Start  -->
<div class=" section-padding">
    <div class="container">
      <div class="text-center">
        <div class="mini-title">Seminarlar Tredinglar</div>
        <div class="column-title ">
          Rejalashtirilgan      
          <span class="shape-bg">Seminarlar</span>
          Haqida Bilib Oling
        </div>
      </div>
      <div class="grid  xl:grid-cols-2 grid-cols-1 gap-7 pt-10">

        @foreach ($allSeminars as $item)          
        <div class=" bg-white shadow-box7 rounded-[8px] group transition duration-150 ring-0 hover:ring-2 hover:ring-primary
            hover:shadow-box8 sm:flex p-4 sm:space-x-6 space-y-6 sm:space-y-0">
          <div class="flex-none">
            <div class="sm:w-[200px] h-[182px]  rounded  relative">
              <img src="{{'/'}}storage/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded">
            </div>
          </div>
          <div class="course-content flex-1">
            <div class="mb-4">
           
                @if ($item->boladigan_kun->isPast())
                <span class="inline-block text-base text-secondary  bg-[#E3F9F6] font-medium rounded px-[10px] py-1" style="background-color: #ff0000ad; color: #FFF">
                  Tugagan
                </span>
                @else
                <span class="inline-block text-base text-secondary bg-[#E3F9F6] font-medium rounded px-[10px] py-1">
                  Rejalashtirilgan
                </span>
                @endif  
              
            </div>
            <h4 class=" lg:text-2xl lg:leading-[36px] text-1xl mb-4 font-bold">
              <a href="{{ route('site.seminarSingle', $item->slug)}}" class=" group-hover:text-primary transitio duration-150">{{ Str::limit($item->title, 30) }}</a>
            </h4>
            <div class="flex   space-x-6">
              <a class=" flex items-center space-x-2" href="#">
                <img src="{{ asset('assets/images/svg/calender2.svg')}}" alt="">              
                <span>{{ $item->boladigan_kun->diffForHumans() }}</span>
              </a>
              <a class=" flex items-center space-x-2" href="#">
                <img src="{{ asset('assets/images/svg/clock2.svg')}}" alt="">
                <span>{{ $item->boladigan_kun->format('H:i') }}</span>
              </a>
            </div>
          </div>
        </div>
        @endforeach
  
      </div>
    </div>
  </div>