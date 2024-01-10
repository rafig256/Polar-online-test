@extends('Admin.layouts.master');
@section('title','ویرایش آزمون')
@section('head')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" >
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="col-12">
                            <form action="{{route('exam.update',$exam->id)}}" method="post" name="editExam">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="info">
                                        <h6 class="">آزمون جدید</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="name">نام آزمون <span @class('text-danger')>*</span></label>
                                                                        <input type="text" name="name" class="form-control mb-4" id="name" placeholder="نام آزمون را وارد کنید" value="{{$exam->name}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="dob-input" for="number_questions">تعداد سوال <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" class="form-control" name="number_questions"  id="number_questions" value="{{$exam->number_questions}}" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="dob-input" for="time">زمان بر حسب ثانیه <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" class="form-control" name="time" value="{{$exam->time}}" required id="time"  />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="info">توضیح <span @class('text-danger')>*</span></label>
                                                                <input type="text" name="info" required class="form-control mb-4" id="info" value="{{$exam->info ?? ''}}" placeholder="توضیح کوتاه را وارد کنید">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <div class="form-group">
                                                                        <label for="designer">طراح آزمون</label>
                                                                        <input type="text" class="form-control mb-4" id="designer" value="{{$exam->info ?? ''}}" placeholder="نام طراح آزمون در صورت وجود" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <label for="status">وضعیت فعال بودن آزمون</label>
                                                                        <input type="checkbox" class="new-control-input" id="status" @checked($exam->status)>
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
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="row">
                                        <div class="col-md-12 mx-auto">
                                            <div class="form-group">
                                                <label for="description">توضیح تکمیلی</label>
                                                <textarea class="form-control" id="description" name="description" rows="10">{{$exam->description ?? ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mx-auto text-start">
                                        <button id="save-exam" class="btn btn-success">ویرایش آزمون</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
@endsection

