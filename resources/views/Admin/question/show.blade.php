@extends('Admin.layouts.master')
@section('title','مشاهده سوال')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing mt-4 pt-2">
            <div id="tableFooter" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row p-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>جزئیات سوال با شناسه {{$question->id}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="col-12 row">
                            <div class="card bg-info col-6 ">
                                <div class="card-body">
                                    <h5 class="card-text">قطب</h5>
                                    <h6 class="rating-count">{{$question->pole->name}}</h6>
                                </div>
                            </div>
                            <div class="card bg-primary col-6">
                                <div class="card-body">
                                    <h5 class="card-text">آزمون</h5>
                                    <h6 class="rating-count">{{$question->pole->exam->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="jumbotron">
                                <h4 class="display-4 mb-5  mt-4">متن سوال</h4>
                                <p class="lead mt-3 mb-4">{{$question->text}}</p>
                                <hr class="my-4">
                                <p class="mb-5">گزینه ها</p>
                                <!-- start Options-->
                                @for($i = 1; $i <6 ; $i++)
                                    @if ($question["q$i"] !== null)
                                        <div class="hd-tab-section">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="accordion" id="hd-statistics">
                                                        <div class="card m-1">
                                                            <div class="card-header" id="hd-statistics-{{$i}}">
                                                                <div class="mb-0">
                                                                    <div class="collapsed" data-toggle="collapse"
                                                                         role="navigation"
                                                                         data-target="#collapse-hd-statistics-{{$i}}"
                                                                         aria-expanded="false"
                                                                         aria-controls="collapse-hd-statistics-{{$i}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none" stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round"
                                                                             class="feather feather-help-circle">
                                                                            <circle cx="12" cy="12" r="10"></circle>
                                                                            <path
                                                                                d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                                                            <line x1="12" y1="17" x2="12"
                                                                                  y2="17"></line>
                                                                        </svg>
                                                                        گزینه {{$i}} : ({{$question["q".$i."point"]}})
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="collapse-hd-statistics-{{$i}}" class="collapse"
                                                                 aria-labelledby="hd-statistics-{{$i}}"
                                                                 data-parent="#hd-statistics" style="">
                                                                <div class="card-body">
                                                                    <p>{{$question["q$i"]}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor

                                <!-- End Options-->

                                <p class="lead">
                                    <a class="btn btn-dark" href="{{route('question.edit',$question->id)}}" role="button">ویرایش</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
