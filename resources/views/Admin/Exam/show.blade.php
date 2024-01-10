@extends('Admin.layouts.master');
@section('title','مشاهده جزیات آزمون')
@section('head')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!-- choose one font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- End font-awesome -->
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <!-- alert -->
            @if ($errors->any())
                @foreach ($errors->all() as $key => $error)
                    <x-alert :key=$key , :error=$error ></x-alert>
                @endforeach
            @endif
            <!-- End alert -->
            <div class="row layout-spacing">
                <!-- Content -->
                <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                    <div class="user-profile layout-spacing">
                        <div class="widget-content widget-content-area">
                            <div class="d-flex justify-content-between">
                                <h3 class="">مشخصات آزمون</h3>
                                <a href="{{route('exam.edit',$exam->id)}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                            </div>
                            <div class="text-center user-info">
                                <img src="{{asset('assets/img/90x90.jpg')}}" alt="avatar">
                                <p class="">{{$exam->name}}</p>
                            </div>
                            <div class="user-info-list">

                                <div class="">
                                    <ul class="contacts-block list-unstyled">
                                        @if($exam->designer)
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg> {{$exam->designer}}
                                            </li>
                                        @endif

                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>{{$exam->created_at->format('Y/m/d')}}
                                        </li>
                                        <li class="contacts-block__item">
                                            <i class="fas fa-hourglass-half pr-2"></i>{{round($exam->time /60,0) }} دقیقه و{{$exam->time%60}} ثانیه
                                        </li>
                                        <li class="contacts-block__item">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                            </svg> تعداد سوال: {{$exam->number_questions}}
                                        </li>
                                            <li class="contacts-block__item">
                                                <i class="fa fa-fire pr-2" aria-hidden="true"></i>وضعیت آزمون: {!! $exam->status ? "<span class='text-success'>فعال</span>" : "<span class='text-danger'>فعال</span>"!!}
                                            </li>
                                        <li class="contacts-block__item">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="social-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="education layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">قطب های آزمون</h3>
                            <div class="timeline-alter">
                                <div class="item-timeline">
                                    <div class="t-meta-date">
                                        <p class="">04 Mar 2009</p>
                                    </div>
                                    <div class="t-dot">
                                    </div>
                                    <div class="t-text">
                                        <p>Royal Collage of Art</p>
                                        <p>Designer Illustrator</p>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="t-meta-date">
                                        <p class="">25 Apr 2014</p>
                                    </div>
                                    <div class="t-dot">
                                    </div>
                                    <div class="t-text">
                                        <p>Massachusetts Institute of Technology (MIT)</p>
                                        <p>Designer Illustrator</p>
                                    </div>
                                </div>
                                <div class="item-timeline">
                                    <div class="t-meta-date">
                                        <p class="">04 Apr 2018</p>
                                    </div>
                                    <div class="t-dot">
                                    </div>
                                    <div class="t-text">
                                        <p>School of Art Institute of Chicago (SAIC)</p>
                                        <p>Designer Illustrator</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                    <div class="skills layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">معرفی آزمون</h3>
                            <p>{{$exam->info}}</p>

                        </div>
                    </div>

                    <div class="bio layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">اطلاعات تکمیلی</h3>

                            <p>{{$exam->description}}</p>

                            <div class="bio-skill-box">

                                <div class="row">

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Sass Applications</h5>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Github Countributer</h5>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Photograhpy</h5>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">

                                        <div class="d-flex b-skills">
                                            <div>
                                            </div>
                                            <div class="">
                                                <h5>Mobile Apps</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
