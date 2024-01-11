@extends('Admin.layouts.master')
@section('title','لیست سوالات')
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing mt-4 pt-2">
            <!-- alert -->
            @if($errors->any())
                @foreach($errors->all() as $key => $error)
                    <x-alert :key=$key , :error=$error ></x-alert>
                @endforeach
            @endif
            <!-- End alert -->
            <div id="tableFooter" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row p-3">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>لیست سوالات</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-condensed mb-4">
                                <thead>
                                <tr>
                                    <th>متن سوال</th>
                                    <th>قطب سوال</th>
                                    <th>آزمون سوال</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td><a href="{{route('question.show',$question->id)}}">{{$question->text}}</a> </td>
                                        <td>{{$question->pole->name}}</td>
                                        <td>{{$question->pole->exam->name}}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="{{route('question.edit',$question->id)}}" data-toggle="tooltip" data-placement="top" title="ویرایش" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li>
                                                <li><form action="{{route('question.destroy',$question->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
