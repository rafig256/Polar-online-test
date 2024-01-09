<main class="main container">

    <div class="row my-4">
        <div id="articleRight" class="col-12 col-md-8 col-xl-9">
            <div class="p-2 bg-light rounded">
                <h1 class="text-center font_2 py-2">{{$exam->name}}</h1>
                <div class="image text-center">
                    <img src="/assets/images/articles/article1.jpg" alt="توضیح تصویر">
                </div>
                <div class="p-2 text_container">
                   {!! $exam->description !!}
                </div>
            </div>

        </div>

        <div id="articleLeft" class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
            <div class="row bg-light px1 py-5 text-center justify-content-center d-flex rounded w-100 m-auto">
                <div class="image rounded-circle overflow-hidden h_10 w_10 text-center justify-content-center">
                    <img class="max_w_100 m-auto" src="/assets/images/logo.png" alt="توضیح تصویر">
                </div>

                <div class="col-12 mt-3 justify-content-center">
                    <small class="text-center d-block">طراح آزمون:</small>
                    <h6 class="text-center">{{$exam->designer ?? "-"}}</h6>

                    <small class="text-center d-block mt-3">تعداد سوال:</small>
                    <h6 class="text-center">{{$exam->number_questions}}</h6>

                    <small class="text-center d-block mt-3">مدت زمان لازم برای آزمون:</small>
                    <h6 class="text-center">{{$exam->time/60}} دقیقه</h6>

                    <small class="text-center d-block mt-3">زمان ثبت در سایت:</small>
                    <h6 class="text-center">{{$exam->created_at->diffForHumans()}} </h6>


                    <div class="col-12 justify-content-center text-center mt-3">
                        <a href="{{route('home')}}" class="btn rounded_5 btn-outline-dark">سایر آزمون ها</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row p-3 justify-content-center text-right alert-light d-block mb-4 col-12">
        کلمه کلیدی - کلمه کلیدی - کلمه کلیدی
    </div>
    @if(auth()->check())
        <div class="row justify-content-center align-items-center alert-secondary p-3">



            <div class="col-12 row justify-content-center form-group">
                <input type="text" class="form-control rounded_5 col-12 col-md-8" value="{{Auth::user()->name}}" disabled>
            </div>
            <div class="col-12 row justify-content-center form-group">
                <h5 class="col-12 text-center">{{$isAnswer == 0 ? 'متن نظر' : 'متن پاسخ'}}</h5>
                <textarea rows="10" class="form-control rounded shadow col-12 col-md-8 {{$isAnswer == 1 ? "alert-warning" : ""}}"
                          wire:model="comment_text">
                </textarea>
            </div>

            <div class="col-12 text-center">
                <span x-text="$wire.comment_text.length" x-bind:style="$wire.comment_text.length > 400 ? 'color: red' : ''"></span>/400
            </div>


            @error('comment_text') <span class="text-danger text-center">{{$message}}</span> @enderror
            <dic class="text-center col-12">
                @if($isAnswer == 1)
                    <button class="btn btn-sm btn-warning mb-5" wire:click="addAnswer">ثبت پاسخ</button>
                    <button class="btn btn-sm btn-danger mb-5" wire:click="canselAnswer">انصراف</button>
                @else
                    <button class="btn btn-sm btn-success mb-5 " wire:click="addComment" wire:loading.attr="disabled">ثبت نظر</button>

                @endif

            </dic>
            <!--  new Commnet   -->
            <div class="col-12 col-md-11 bg-white p-3 {{$new_comment_class}}">
                <div class="m-2 d-block p-2 rounded shadow-sm border_1 col-11 mb-2 shadow">
                    <div class="justify-content-lg-between w-100 m-auto">
                        <span class="text-danger">نظر شما ثبت شد اما بعد از تایید برای عموم نمایش داده خواهد شد: {{$new_comment}}</span>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-11 bg-white p-3">
                @foreach($comments as $comment)
                    <div class="m-2 d-block p-2 rounded shadow-sm border_1 col-11 mb-2 shadow" wire:key="{{$comment->id}}">
                        <div class="row justify-content-lg-between w-100 m-auto">
                            <h6 class="text-right text-success">{{$comment->user->name}} در
                                <span class="text-danger">{{$comment->created_at->diffForHumans()}}</span></h6>
                            @if($comment->user_id == auth()->user()->id)
                                <span>
                                    <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2" wire:click="delete({{$comment->id}})"></i>
{{--                                <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>--}}
                                </span>
                            @endif
                        </div>
                        <div class=" w-100 pb-3">
                            <p class="text-justify">{{$comment->text}}</p>
                            <button class="btn btn-primary rounded_5 px-3" type="button" wire:click="getCommentToAnswer({{$comment}})">پاسخ</button>
                        </div>
                        @foreach($comment->replies as $answer)
                            <div class="answer shadow-sm alert-success p-2" wire:key="{{$answer->id}}">
                                <h6 class="text-right text-primary">پاسخ</h6>
                                <div class="row justify-content-lg-between w-100 m-auto">
                                    <h6 class="text-right text-info">{{$answer->user->name}} در
                                        <span class="text-danger">{{$answer->created_at->diffForHumans()}}</span></h6>
                                    @if($answer->user_id == auth()->user()->id)
                                        <span>
                                            <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2" wire:click="delete({{$answer->id}})"></i>
{{--                                <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>--}}
                                        </span>
                                    @endif
                                </div>
                                <p >{{$answer->text}}</p>
                            </div>
                        @endforeach

                    </div>
                @endforeach

            </div>
        </div>
    @else
        <div class="row justify-content-center align-items-center alert-secondary p-3">
        <span>برای ثبت نظر ابتدا <a href="{{route('login')}}">وارد</a> شوید</span>
        </div>
    @endif
</main>

