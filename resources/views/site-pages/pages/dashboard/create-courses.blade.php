@extends('layouts/def');
@section('content')   

<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
  <div class="container text-center">
    <h2>Kurs yaratish</h2>
    <nav>
      <ol class="flex items-center justify-center space-x-3">
        <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
        <li class="breadcrumb-item">-</li>
        <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Kurslarim</a></li>
        <li class="breadcrumb-item">-</li>
        <li class="text-primary">Siz turgan sahifa </li>
      </ol>
    </nav>
  </div>
</div>

 <!-- This is an example component -->
<div class="max-w-xl mx-auto bg-white p-16 mt-6">
  <img src="https://i.pinimg.com/originals/fb/47/4b/fb474b70b4092f95c379e633ca58d27c.gif" alt="">
  <h4 class="text-center mt-3">Formani to'ldiring!</h4>
	<form class="mt-5" action="{{ route('dashboard.coursesStore')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf 
    @method('post')   
    <div class="mb-6">
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurs nomlanishi</label>
      <input type="text" id="title" name="title" placeholder="Kurs nomini yozing.." class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div> 
    <div class="grid gap-6 mb-6 lg:grid-cols-2">
        <div>
          <label for="kurs_narxi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kurs narxi</label>
          <input type="text" id="kurs_narxi" placeholder="Bepul, 120000 so'm" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div>
          <label for="kurs_tili" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kurs tili</label>
          <select id="kurs_tili" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option  selected value="uzbek_tilida">O'zbek tilida</option>
              <option value="rus_tilida">Rus tilida</option>
          </select>
      </div>
        <div>
            <label for="davomiylik_vaqti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Davomiylik vaqti</label>
            <input type="text" id="davomiylik_vaqti" name="davomiylik_vaqti" placeholder="12 soat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>  
        <div>
            <label for="youtube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Youtubedan asosiy video</label>
            <input type="text" id="youtube"  placeholder="https://www.youtube.com/" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
      
    </div>
    <div class="mb-6">
      <div>
        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kurs haqida to'liqroq yozing</label>
        <textarea id="desc" name="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kurs maqsadi va nimalarni o'rgatishi mumkinligi haqida...." style="height: 350px;" required></textarea></div>
    </div> 
    
    <div class="mb-6">
      <label for="image-upload" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kursni sarlavha suratini yuklash</label>
      <input type="file" name="image" id="image-upload" accept="image/*">
    </div> 

    <div id="image-preview"></div>


    <script>
      const imageUpload = document.getElementById('image-upload');
      const imagePreview = document.getElementById('image-preview');
    
      imageUpload.addEventListener('change', function() {
        const file = imageUpload.files[0];
        const reader = new FileReader();
    
        reader.onload = function(e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          imagePreview.innerHTML = '';
          imagePreview.appendChild(img);
        }
    
        reader.readAsDataURL(file);
      });
    </script>


    <style>
      #image-preview {
        display: flex;
        justify-content: center;
        align-items: center;
        max-height: 30%;
      }
      
      #image-preview img {
        max-height: 200px;
        width: auto;
      }
    </style>    
    <hr class="mt-3 mb-5">
    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
        <input id="status" type="checkbox" name="status" value="1" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>
        </div>
        <label for="status" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-400">Formada barcha ma'lumotlar tog'ri va kurs ko'rsatishga tayyor</label>
    </div>
    <button type="submit" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center " style="background: #009575; height: 50px">Kursni yaratish</button>
  </form>

  <div class="flex p-4 mb-6 text-sm  rounded-lg " role="alert" style="background-color: #2d80fb; color: #fff">
    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Kursni yaratganingizdan keyin shu sahifaga qaytasiz!</span>
        <ul class="mt-1.5 ml-4 list-disc list-inside">
          <li>Sizga sahifaga o'tish uchun tugma paydo bo'ladi.</li>        
          <li>Sahifaga o'tganizdan so'ng video darslarni yarata boshlaysiz.</li>
      </ul>
    </div>
  </div>

</div>


@endsection