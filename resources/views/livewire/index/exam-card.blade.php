<div class="col-11 col-md-3 px-3 py-4">
    <div class="card hover_shadow hover_up">
        <a href="{{route('examPage',$exam->id)}}">
            <div class="p-0 over_hidden card-header h_10 d-flex align-items-center justify-content-center">
                <img src="./assets/images/articles/article1.jpg" alt="" class="h-100">
            </div>
            <div class="card-body px-1 py-2">
                <h5 class="text-center text-primary">{{$exam->name}} </h5>
                <p class="text-justify text-right font_0_9 text-secondary h_85">
                    {{$exam->info}}
                </p>
                <p>تعداد سوال: {{$exam->number_questions}}</p>
                <p>مدت زمان: {{round($exam->time/ 60,0,PHP_ROUND_HALF_UP)}} دقیقه</p>
                <a href="{{route('examPage',$exam->id)}}" class="btn btn-primary cursor_pointer_shadow rounded_5 px-3">مشاهده آزمون</a>
            </div>
        </a>
    </div>
</div>
