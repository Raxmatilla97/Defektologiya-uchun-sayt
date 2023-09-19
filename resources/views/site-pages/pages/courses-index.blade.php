@extends('layouts/def');
@section('content')   
<div class="breadcrumbs section-padding bg-[url('../images/all-img/bred.png')] bg-cover bg-center bg-no-repeat">
    <div class="container text-center">
      <h2>Malaka oshirish kurslari</h2>
      <nav>
        <ol class="flex items-center justify-center space-x-3">
          <li class="breadcrumb-item"><a href="{{ route('site.index')}}">Bosh sahifa </a></li>
          <li class="breadcrumb-item">-</li>
          <li class="text-primary">Course Details </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="nav-tab-wrapper tabs  section-padding">
    <div class="container">
      <div class="grid grid-cols-12 gap-[30px]">
        <div class="lg:col-span-8 col-span-12">
          <div class="single-course-details">
            <div class="xl:h-[470px] h-[350px] mb-10 course-main-thumb">
              <img src="assets/images/all-img/single-course-thumb.png" alt="" class=" rounded-md object-fut w-full h-full block">
            </div>
            <div class=" mb-6">
              <span class="bg-secondary py-1 px-3 text-lg font-semibold rounded text-white ">Data Science</span>
            </div>
            <h2>UI/UX Design and Graphics Learning Bootcamp 2022</h2>
            <div class="author-meta mt-6 sm:flex  lg:space-x-16 sm:space-x-5 space-y-5 sm:space-y-0 items-center">
              <div class="flex space-x-4 items-center group">
                <div class="flex-none">
                  <div class="h-12 w-12 rounded">
                    <img src="assets/images/all-img/author-1.png" alt="" class=" object-cover w-full h-full rounded">
                  </div>
                </div>
                <div class="flex-1">
                  <span class=" text-secondary  ">Trainer
                                        <a href="#" class=" text-black">
                                            : Md Shamim Hossain</a>
                                    </span>
                </div>
              </div>
              <div>
                <span class=" text-secondary  ">Last Update:
                                    <a href="#" class=" text-black">
                                        10 February, 2022</a>
                                </span>
              </div>
            </div>
            <div class="nav-tab-wrapper mt-12">
              <ul id="tabs-nav" class=" course-tab mb-8">
                <li>
                  <a href="#tab1">
                    Overview
                  </a>
                </li>
                <li>
                  <a href="#tab2">
                    Carriculum
                  </a>
                </li>
                <li>
                  <a href="#tab3">
                    Instructor
                  </a>
                </li>
                <li>
                  <a href="#tab4">
                    Reviews
                  </a>
                </li>
              </ul>
              <div id="tabs-content">
                <div id="tab1" class="tab-content">

                  <div>
                    <h3 class=" text-2xl">Course Description</h3>
                    <p class="mt-4">
                      This tutorial will help you learn quickly and thoroughly. Lorem ipsum, or lipsum as it sometimes known, is dummy text
                      used in laying out print, graphic or web designs. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                      Quisque volutpat mattis eros.
                      <br/> <br/> You’ll be exposed to principles and strategies, but, more importantly, you’ll learn how actually apply these
        abstract concepts by coding three different websites for three very different the audiences. Lorem ipsum is dummy text
        used in laying out print, graphic or web designs Lorem ipsum blinding shot chinwag knees.
                    </p>
                    <div class="bg-[#F8F8F8] space-y-6 p-8 rounded-md my-8">
                      <h4 class=" text-2xl">What You will Learn?</h4>
                      <ul class=" grid sm:grid-cols-2 grid-cols-1 gap-6">

                        <li class=" flex space-x-3">
                          <div class="flex-none  relative top-1 ">
                            <img src="assets/images/icon/ck.svg" alt="">
                          </div>
                          <div class="flex-1">
                            Learn how perspective works and how to incorporate your art
                          </div>
                        </li>

                        <li class=" flex space-x-3">
                          <div class="flex-none  relative top-1 ">
                            <img src="assets/images/icon/ck.svg" alt="">
                          </div>
                          <div class="flex-1">
                            Learn how perspective works and how to incorporate your art
                          </div>
                        </li>

                        <li class=" flex space-x-3">
                          <div class="flex-none  relative top-1 ">
                            <img src="assets/images/icon/ck.svg" alt="">
                          </div>
                          <div class="flex-1">
                            Learn how perspective works and how to incorporate your art
                          </div>
                        </li>

                        <li class=" flex space-x-3">
                          <div class="flex-none  relative top-1 ">
                            <img src="assets/images/icon/ck.svg" alt="">
                          </div>
                          <div class="flex-1">
                            Learn how perspective works and how to incorporate your art
                          </div>
                        </li>

                      </ul>
                    </div>
                    <div>
                      <h4 class=" text-2xl">What You will Learn?</h4>
                      <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                        <div class=" bg-white  rounded px-5 py-[18px] flex   shadow-box2 space-x-[10px] items-center">
                          <span class="flex-none">
                    <img src="assets/images/icon/laptop.svg" alt="">
                </span>
                          <span class="flex-1 text-black">
                    Computer/Mobile
                </span>
                        </div>
                        <div class=" bg-white  rounded px-5 py-[18px] flex  shadow-box2 space-x-[10px] items-center">
                          <span class="flex-none">
                    <img src="assets/images/icon/pencil.svg" alt="">
                </span>
                          <span class="flex-1 text-black">
                    Paper & Pencil
                </span>
                        </div>
                        <div class=" bg-white  rounded px-5 py-[18px] flex  shadow-box2 space-x-[10px] items-center">
                          <span class="flex-none">
                    <img src="assets/images/icon/wifi.svg" alt="">
                </span>
                          <span class="flex-1 text-black">
                   Internet Connect
                </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="tab2" class="tab-content">


                  <div>
                    <h3 class=" text-2xl">Course Description</h3>
                    <div class="md:flex md:space-x-10  space-x-3 flex-wrap mt-4 mb-6">
                      <span>Level Beginner</span>
                      <span>12 Lectures</span>
                      <span>Total: 5 Hours 56 Minutes 24 Seconds</span>
                    </div>
                    <ul class="list  course-accrodain space-y-6">
                      <li class="open">
                        <button type="button" class="accrodain-button">
                          <span class="icon-pm fle x-none"></span>
                          <span class=" flex-1">Introduction</span>
                          <div class="flex-none extra-text  hidden sm:block">
                            3 Lectures, 34:51 min
                          </div>
                        </button>
                        <div class="content">
                          <div class=" text-xl font-semibold text-black mb-2">Intermediate Level</div>
                          <p>
                            This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or
                            web designs
                          </p>
                          <div class=" text-xl font-semibold text-black mb-2 mt-6">2 Videos, 1 Audio, 1 Notebook</div>
                          <div class=" mt-8 ">

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/headphone.svg" alt="">
                            </span>
                                <span class="flex-1">Audio: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/file.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                          </div>
                        </div>
                      </li>
                      <li>
                        <button type="button" class="accrodain-button">
                          <span class="icon-pm fle x-none"></span>
                          <span class=" flex-1">Getting Started</span>
                          <div class=" flex-none extra-text hidden sm:block ">
                            3 Lectures, 34:51 min
                          </div>
                        </button>
                        <div class="content hidden">
                          <div class=" text-xl font-semibold text-black mb-2">Intermediate Level</div>
                          <p>
                            This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or
                            web designs
                          </p>
                          <div class=" text-xl font-semibold text-black mb-2 mt-6">2 Videos, 1 Audio, 1 Notebook</div>
                          <div class=" mt-8 ">

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/headphone.svg" alt="">
                            </span>
                                <span class="flex-1">Audio: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/file.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                          </div>
                        </div>
                      </li>
                      <li>
                        <button type="button" class="accrodain-button">
                          <span class="icon-pm fle x-none"></span>
                          <span class=" flex-1">Start from Sketch Design</span>
                          <div class=" flex-none extra-text hidden sm:block ">
                            3 Lectures, 34:51 min
                          </div>
                        </button>
                        <div class="content hidden">
                          <div class=" text-xl font-semibold text-black mb-2">Intermediate Level</div>
                          <p>
                            This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or
                            web designs
                          </p>
                          <div class=" text-xl font-semibold text-black mb-2 mt-6">2 Videos, 1 Audio, 1 Notebook</div>
                          <div class=" mt-8 ">

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/headphone.svg" alt="">
                            </span>
                                <span class="flex-1">Audio: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/file.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                          </div>
                        </div>
                      </li>
                      <li>
                        <button type="button" class="accrodain-button">
                          <span class="icon-pm fle x-none"></span>
                          <span class=" flex-1">Getting Help & Support in Seller Central</span>
                          <div class=" flex-none extra-text hidden sm:block ">
                            3 Lectures, 34:51 min
                          </div>
                        </button>
                        <div class="content hidden">
                          <div class=" text-xl font-semibold text-black mb-2">Intermediate Level</div>
                          <p>
                            This tutorial will help you learn quickly and thoroughly. Lorem ipsum is dummy text used in laying out print, graphic or
                            web designs
                          </p>
                          <div class=" text-xl font-semibold text-black mb-2 mt-6">2 Videos, 1 Audio, 1 Notebook</div>
                          <div class=" mt-8 ">

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/camera.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Getting Started and Introductions
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <span class=" bg-primary text-white px-3 rounded">Preview</span>

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/headphone.svg" alt="">
                            </span>
                                <span class="flex-1">Audio: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                            <a href="#" class=" flex items-start pb-4 mb-4 last:mb-0 last:pb-0 border-b border-[#ECECEC] last:border-0">
                              <div class="flex-1 flex">
                                <span class="flex-none  mr-2">
                                <img src="assets/images/icon/file.svg" alt="">
                            </span>
                                <span class="flex-1">Video: Connectig Throgh Technology
                            </span>
                              </div>
                              <div class="flex-none flex space-x-3">

                                <img src="assets/images/icon/lock.svg" alt="">
                              </div>
                            </a>

                          </div>
                        </div>
                      </li>


                    </ul>
                  </div>
                </div>
                <div id="tab3" class="tab-content">


                  <div class=" bg-[#F8F8F8] rounded-md p-8">
                    <div class="md:flex space-x-5 mb-8">
                      <div class="h-[310px] w-[270px] flex-none rounded mb-5 md:mb-0">
                        <img src="assets/images/all-img/ux.png" alt="" class=" w-full h-full object-cover  rounded">
                      </div>
                      <div class="flex-1">
                        <div class="max-w-[300px]">
                          <h4 class=" text-[34px] font-bold leading-[51px]">Daniel Smith</h4>
                          <div class=" text-primary mb-6">
                            User Experience Designer
                          </div>
                          <ul class=" list space-y-4">

                            <li class=" flex space-x-3">
                              <img src="assets/images/icon/file2.svg" alt="" />
                              <div>
                                65+ Courses
                              </div>
                            </li>

                            <li class=" flex space-x-3">
                              <img src="assets/images/icon/user2.svg" alt="" />
                              <div>
                                2k+ Student Learned
                              </div>
                            </li>

                            <li class=" flex space-x-3">
                              <img src="assets/images/icon/star.svg" alt="" />
                              <div>
                                547+ Reviews
                              </div>
                            </li>

                            <li class=" flex space-x-3">
                              <img src="assets/images/icon/like.svg" alt="" />
                              <div>
                                4.9 Average Rating
                              </div>
                            </li>

                          </ul>
                          <ul class=" flex space-x-3 mt-8">

                            <li class="">
                              <a href="#"><img src="assets/images/social/fb.svg" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="assets/images/social/ln.svg" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="assets/images/social/youtube.svg" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="assets/images/social/instra.svg" alt="" />
                              </a>
                            </li>

                            <li class="">
                              <a href="#"><img src="assets/images/social/twiiter.svg" alt="" />
                              </a>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                      by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                      Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
                      generators on the Internet tend.
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
              <a class="h-[220px]  rounded relative block" href="#">
                <img src="assets/images/all-img/thumb.png" alt="" class=" block w-full h-full object-cover rounded " />
                <div class=" absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                  <img src="assets/images/svg/play.svg" alt="">
                </div>
              </a>
              <h3>Free</h3>
              <button class="btn btn-primary w-full text-center ">
                Enroll Now
              </button>
              <ul class="list  ">

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/user.svg" alt="" />
                    <div class=" text-black font-semibold">Instructor</div>
                  </div>
                  <div class="flex-none">
                    Daniel Smith
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/file2.svg" alt="" />
                    <div class=" text-black font-semibold">Lectures</div>
                  </div>
                  <div class="flex-none">
                    23
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/clock.svg" alt="" />
                    <div class=" text-black font-semibold">Duration</div>
                  </div>
                  <div class="flex-none">
                    2Hr 36Minutes
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/star.svg" alt="" />
                    <div class=" text-black font-semibold">Enrolled</div>
                  </div>
                  <div class="flex-none">
                    2k Students
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/target.svg" alt="" />
                    <div class=" text-black font-semibold">Course level</div>
                  </div>
                  <div class="flex-none">
                    Intermediate
                  </div>
                </li>

                <li class=" flex space-x-3 border-b border-[#ECECEC] mb-4 pb-4 last:pb-0 past:mb-0 last:border-0">
                  <div class="flex-1 space-x-3 flex">
                    <img src="assets/images/icon/web.svg" alt="" />
                    <div class=" text-black font-semibold">Language</div>
                  </div>
                  <div class="flex-none">
                    English
                  </div>
                </li>

              </ul>
              <ul class="flex space-x-4 items-center pt-3 ">
                <li class=" text-black font-semibold">
                  Share On:
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="assets/images/icon/fb.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="assets/images/icon/tw.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="assets/images/icon/pn.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="#" class="flex h-10 w-10">
                    <img src="assets/images/icon/ins.svg" alt="">
                  </a>
                </li>
              </ul>
            </div>

            <div class="wdiget">
              <h4 class=" widget-title">Related Courses</h4>
              <ul class="list">
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                  <div class="flex-none ">
                    <div class="h-20 w-20  rounded">
                      <img src="assets/images/all-img/rc-1.png" alt="" class=" w-full h-full object-cover rounded">
                    </div>
                  </div>
                  <div class="flex-1 ">
                    <div class="flex space-x-3 mb-2">
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                    </div>
                    <div class="mb-1 font-semibold text-black">
                      Greatest Passion In...
                    </div>
                    <span class=" text-secondary font-semibold">$38.00</span>
                  </div>
                </li>
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                  <div class="flex-none ">
                    <div class="h-20 w-20  rounded">
                      <img src="assets/images/all-img/rc-2.png" alt="" class=" w-full h-full object-cover rounded">
                    </div>
                  </div>
                  <div class="flex-1 ">
                    <div class="flex space-x-3 mb-2">
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                    </div>
                    <div class="mb-1 font-semibold text-black">
                      Greatest Passion In...
                    </div>
                    <span class=" text-secondary font-semibold">$38.00</span>
                  </div>
                </li>
                <li class=" flex space-x-4 border-[#ECECEC] pb-6 mb-6 last:pb-0 last:mb-0 last:border-0 border-b">
                  <div class="flex-none ">
                    <div class="h-20 w-20  rounded">
                      <img src="assets/images/all-img/rc-3.png" alt="" class=" w-full h-full object-cover rounded">
                    </div>
                  </div>
                  <div class="flex-1 ">
                    <div class="flex space-x-3 mb-2">
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                      <iconify-icon icon="heroicons:star-20-solid" class=" text-tertiary"></iconify-icon>
                    </div>
                    <div class="mb-1 font-semibold text-black">
                      Greatest Passion In...
                    </div>
                    <span class=" text-secondary font-semibold">$38.00</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection