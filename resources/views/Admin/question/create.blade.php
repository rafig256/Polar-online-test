@extends('Admin.layouts.master')
@section('title', 'ثبت سوال جدید')
@section('head')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
{{--    <link href="{{asset('plugins/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" >--}}
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="col-12">
                            <form action="{{route('question.store')}}" method="post" name="addQuestion">
                                @csrf
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="info">
                                        <h6 class="">سوال جدید</h6>
                                        <div class="row">
                                            <div class="col-lg-12 mx-auto">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-md-12 mx-auto">
                                                                    <div class="form-group">
                                                                        <label for="text">متن سوال <span @class('text-danger')>*</span></label>
                                                                        <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
                                                                        @if ($errors->has('text'))
                                                                            <small class="text-danger">{{$errors->first('text')}}</small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="form-group">
                                                                        <label for="pole_id">قطب مربوطه <span class="text-danger">*</span> </label>
                                                                        <select name="pole_id" id="pole_id" class="form-control">
                                                                            <option selected disabled>یکی را انتخاب کنید</option>
                                                                            @foreach($poles as $pole)
                                                                                <option value="{{$pole->id}}">{{$pole->name}}  (قطب مثبت: {{$pole->positive}}) , (قطب منفی: {{$pole->negative}})</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                    @if ($errors->has('pole_id'))
                                                                        <small class="text-danger">{{$errors->first('pole_id')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label class="dob-input" for="status">وضعیت سوال</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <select name="status" id="status" class="form-control">
                                                                            <option value="1" selected> فعال</option>
                                                                            <option value="0" >غیر فعال</option>
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('status'))
                                                                        <small class="text-danger">{{$errors->first('status')}}</small>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="q1">گزینه 1<span @class('text-danger')>*</span></label>
                                                                        <input type="text" name="q1" class="form-control mb-4" id="q1" placeholder="متن گزینه را وارد کنید" required>
                                                                    </div>
                                                                    @if ($errors->has('q1'))
                                                                        <small class="text-danger">{{$errors->first('q1')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label class="dob-input" for="q1point">امتیاز گزینه 1 <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" name="q1point" class="form-control" id="q1point" value="0" required />
                                                                    </div>
                                                                    @if ($errors->has('q1point'))
                                                                        <small class="text-danger">{{$errors->first('q1point')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="q2">گزینه 2<span @class('text-danger')>*</span></label>
                                                                        <input type="text" name="q2" class="form-control mb-4" id="q2" placeholder="متن گزینه را وارد کنید">
                                                                    </div>
                                                                    @if ($errors->has('q2'))
                                                                        <small class="text-danger">{{$errors->first('q2')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label class="dob-input" for="q2point">امتیاز گزینه 2 <span @class('text-danger')>*</span></label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" name="q2point" class="form-control" id="q2point" value="0" required />
                                                                    </div>
                                                                    @if ($errors->has('q2point'))
                                                                        <small class="text-danger">{{$errors->first('q2point')}}</small>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="q3">گزینه سوم</label>
                                                                        <input type="text" name="q3" class="form-control mb-4" id="q3" placeholder="متن گزینه را وارد کنید" >
                                                                    </div>
                                                                    @if ($errors->has('q3'))
                                                                        <small class="text-danger">{{$errors->first('q3')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label class="dob-input" for="q3point">امتیاز گزینه سوم</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" name="q3point" class="form-control" id="q3point"  />
                                                                    </div>
                                                                    @if ($errors->has('q3point'))
                                                                        <small class="text-danger">{{$errors->first('q3point')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="q4">گزینه چهارم</label>
                                                                        <input type="text" name="q4" class="form-control mb-4" id="q4" placeholder="متن گزینه را وارد کنید">
                                                                    </div>
                                                                    @if ($errors->has('q4'))
                                                                        <small class="text-danger">{{$errors->first('q4')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label class="dob-input" for="q4point">امتیاز گزینه چهارم</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" name="q4point" class="form-control" id="q4point"  />
                                                                    </div>
                                                                    @if ($errors->has('q4point'))
                                                                        <small class="text-danger">{{$errors->first('q4point')}}</small>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="q5">گزینه پنجم</label>
                                                                        <input type="text" name="q5" class="form-control mb-4" id="q5" placeholder="متن گزینه را وارد کنید" >
                                                                    </div>
                                                                    @if ($errors->has('q5'))
                                                                        <small class="text-danger">{{$errors->first('q5')}}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label class="dob-input" for="q5point">امتیاز گزینه پنجم</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <input type="number" name="q5point" class="form-control" id="q5point"  />
                                                                    </div>
                                                                    @if ($errors->has('q5point'))
                                                                        <small class="text-danger">{{$errors->first('q5point')}}</small>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mx-auto text-start">
                                        <button id="save-exam" class="btn btn-success">ذخیره سوال</button>
                                    </div>
                                </div>
                            </form>

                            <div class="card component-card_5">
                                <div class="card-body">
                                    <p class="card-text">توجه کنید، برای اینکه به سمت قطب مثبت (راست) امتیاز ثبت کنید از اعداد مثبت و برای ثبت امتیاز برای قطب منفی (چپ) از امتیاز منفی استفاده نمایید</p>
                                </div>
                            </div>

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

