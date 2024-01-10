@extends('Admin.layouts.master');
@section('title','لیست آزمونها');
@section('head')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/editors/quill/quill.snow.css')}}">
    <link href="{{asset('assets/css/apps/todolist.css')}}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endsection
@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="mail-box-container">
                        <div class="mail-overlay"></div>
                        <div class="tab-title">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                    <h4 class="app-title">لیست آزمونها</h4>
                                </div>

                                <div class="todoList-sidebar-scroll">
                                    <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                        <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link list-actions active" id="all-list" data-toggle="pill" href="#pills-inbox" role="tab" aria-selected="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                                                        <line x1="8" y1="6" x2="21" y2="6"></line>
                                                        <line x1="8" y1="12" x2="21" y2="12"></line>
                                                        <line x1="8" y1="18" x2="21" y2="18"></line>
                                                        <line x1="3" y1="6" x2="3" y2="6"></line>
                                                        <line x1="3" y1="12" x2="3" y2="12"></line>
                                                        <line x1="3" y1="18" x2="3" y2="18"></line>
                                                    </svg>
                                                    کل آزمونها <span class="todo-badge badge"></span></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link list-actions" id="todo-task-important" data-toggle="pill" href="#pills-important" role="tab" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    فعال <span class="todo-badge badge"></span></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link list-actions" id="todo-task-done" data-toggle="pill" href="#pills-sentmail" role="tab" aria-selected="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
                                                        <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                                    </svg>
                                                    غیرفعال <span class="todo-badge badge"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a class="btn btn-success m-auto" id="addExam" href="{{route('exam.create')}}">
                                     آزمون جدید</a>
                            </div>
                        </div>

                        <div id="todo-inbox" class="accordion todo-inbox">
                            <div class="search">
                                <input type="text" class="form-control input-search" placeholder="Search Here...">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                            </div>

                            <div class="todo-box">

                                <div id="ct" class="todo-box-scroll">
                                    @foreach($exams as $exam)
                                        <div class="todo-item all-list {{$exam->status == 0 ? 'todo-task-done': 'todo-task-important'}}">
                                            <div class="todo-item-inner">
                                                <div class="n-chk text-center">
                                                    <label class="new-control new-checkbox checkbox-primary">
                                                        <input type="checkbox" class="new-control-input inbox-chkbox">
                                                        <span class="new-control-indicator"></span>
                                                    </label>
                                                </div>

                                                <div class="p-4 w-100">
                                                    <h5 class="todo-heading" data-todoHeading="Meeting with Shaun Park at 4:50pm"><a href="{{route('exam.show',$exam->id)}}">{{$exam->name}}</a> </h5>
                                                    <p class="meta-date">{{$exam->created_at->format('Y/M/d')}}</p>
                                                    <p class="todo-text" >{{$exam->info}}</p>
                                                </div>

                                                <div class="priority-dropdown custom-dropdown-icon">
                                                    <div class="dropdown p-dropdown">
                                                        <a class="dropdown-toggle warning" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">
                                                            <a class="dropdown-item danger" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> مدیریت</a>
                                                            <a class="dropdown-item warning" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> حذف</a>
                                                            <a class="dropdown-item primary" href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg> مشاهده</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>

                                <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <div class="compose-box">
                                                    <div class="compose-content">
                                                        <h5 class="task-heading"></h5>
                                                        <p class="task-text"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn"> </path></svg> Close</button>
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

@section('script')
    <script src="{{asset('assets/js/ie11fix/fn.fix-padStart.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    <script src="{{asset('assets/js/apps/todoList.js')}}"></script>
@endsection
