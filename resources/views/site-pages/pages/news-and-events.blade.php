@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Yangiliklar va E'lonlar</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Asosiy sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Siz turgangan sahifa</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="flex  items-center mb-14">
        <div class="flex-1 flex space-x-6  items-center">
          
        </div>
        <div class="flex-0">
            <div class="min-w-[272px]">
              <select id="sortingSelect" onchange="handleSortingSelect()">
                <option value="latest">Saralash: So'ngi qo'shilgan</option>
                <option value="most_read">Ko'p O'qilgan</option>
                <option value="oldest">Oldingi Qo'shilgan</option>
                <option value="only_news">Faqat Yangiliklar</option>
                <option value="only_event">Faqat E'lonlar</option>
              </select>
            </div>
          </div>
          
          <script>
            function handleSortingSelect() {
              var selectedOption = document.getElementById('sortingSelect').value;
              var url = '';
          
              switch (selectedOption) {
                case 'latest':
                  url = '{{ route('site.news-and-events-sort', ['sorting' => 'latest']) }}';
                  break;
                case 'most_read':
                  url = '{{ route('site.news-and-events-sort', ['sorting' => 'most_read']) }}';
                  break;
                case 'oldest':
                  url = '{{ route('site.news-and-events-sort', ['sorting' => 'oldest']) }}';
                  break;
                  case 'only_news':
                  url = '{{ route('site.news-and-events-sort', ['sorting' => 'only_news']) }}';
                  break;
                  case 'only_event':
                  url = '{{ route('site.news-and-events-sort', ['sorting' => 'only_event']) }}';
                  break;
                default:
                  break;
              }
          
              if (url) {
                window.location.href = url;
              }
            }
          </script>
     
      </div>
     

     
      <div class="grid  lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">

        @foreach ($newsAndEvents as $item)
        <div class=" bg-white shadow-box5 rounded-[8px] transition duration-100 hover:shadow-box3">
            <div class="course-thumb h-[297px] rounded-t-[8px]  relative">
              <img src="/{{ $item->image }}" alt="{{ $item->title }}" class=" w-full h-full object-cover rounded-t-[8px]">
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
        

      </div>
      {{ $newsAndEvents->links('vendor.pagination.custom') }}
    </div>
  </div>
@endsection