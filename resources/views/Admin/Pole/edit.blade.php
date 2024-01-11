@extends('Admin.layouts.master')
@section('title','ویرایش قطب')
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
                            <form action="{{route('pole.update',$pole->id)}}" method="post" name="addPole">
                                @csrf
                                @method('PUT')
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="info">
                                        <h6 class="">قطب جدید</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="name">نام اختصاری قطب <span @class('text-danger')>*</span></label>
                                                                        <input type="text" name="name" class="form-control mb-4" id="name" required value="{{$pole->name}}" >
                                                                    </div>
                                                                    @if ($errors->has('name'))
                                                                        <small class="text-danger">{{$errors->first('name')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="dob-input" for="positive">قطب مثبت <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="text" name="positive" class="form-control" id="positive" value="{{$pole->positive}}" required />
                                                                    </div>
                                                                    @if ($errors->has('positive'))
                                                                        <small class="text-danger">{{$errors->first('positive')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label class="dob-input" for="negative">قطب منفی <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="text" class="form-control" name="negative"  required id="negative" value="{{$pole->negative}}" />
                                                                    </div>
                                                                    @if ($errors->has('negative'))
                                                                        <small class="text-danger">{{$errors->first('negative')}}</small>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exam_id">آزمون مرتبط <span @class('text-danger')>*</span></label>
                                                                <select name="exam_id" id="exam_id" class="form-control">
                                                                    <option value="" disabled selected>انتخاب کنید</option>
                                                                    @foreach($exams as $exam)
                                                                        <option value="{{$exam->id}}" @selected($exam->id == $pole->exam_id)>{{$exam->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('exam_id'))
                                                                    <small class="text-danger">{{$errors->first('exam_id')}}</small>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mx-auto text-start">
                                                                    <button id="save-exam" class="btn btn-success">ویرایش قطب</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
