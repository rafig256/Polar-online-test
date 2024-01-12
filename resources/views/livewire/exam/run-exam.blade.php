<main class="main container">
    <div id="articleRight" class="col-12">
            <div class="p-2 bg-light rounded">
                <h1 class="text-center font_2 py-2">{{$exam->name}}</h1>
                <div class="image text-center">
                    <P><strong>توضیحات آزمون:</strong> {{$exam->info}}</P>
                    <p>این آزمون دارای <strong>{{$exam->number_questions}}</strong> سوال است که <strong>{{$exam->time}}</strong> ثانیه برای پاسخدهی برای آن در نظر گرفته شده است.
                    <br>
                    با این حال برای اینکه شما با خیال راحتتری نسبت به پاسخگویی اقدام کنید <strong>{{round($exam->time*11/10,0)}}</strong> ثانیه زمان برای شما در نظر گرفته شده است.
                    </p>
                </div>
                <div class="p-2 text_container">
                    <form action="" method="POST">
                        @CSRF
                        @foreach($exam->Questions as $question)
                            <div class="form-group">
                                <label>سوال     {{ $loop->iteration }} - {{$question->text}}</label>
                                <div class="row">
                                    <input type="radio" name="{{$question->id}}" id="{{$question->id}}-q1" class="mr-3 ml-2" value="q1"> {{$question->q1}}
                                    <input type="radio" name="{{$question->id}}" id="{{$question->id}}-q2" class="mr-3 ml-2" value="q2"> {{$question->q2}}
                                    @if($question->q3 !== NULL) <input type="radio" name="{{$question->id}}" id="{{$question->id}}-q3" class="mr-3 ml-2" value="q3"> {{$question->q3}} @endif
                                    @if($question->q4 !== NULL) <input type="radio" name="{{$question->id}}" id="{{$question->id}}-q4" class="mr-3 ml-2" value="q4"> {{$question->q4}} @endif
                                    @if($question->q5 !== NULL) <input type="radio" name="{{$question->id}}" id="{{$question->id}}-q5" class="mr-3 ml-2" value="q5"> {{$question->q5}} @endif
                                </div>

                            </div>
                        @endforeach

                    </form>
                </div>
            </div>

        </div>
</main>
