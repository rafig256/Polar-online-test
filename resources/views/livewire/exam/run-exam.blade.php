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
                    <div>
                        <form wire:submit.prevent="saveForm">
                            @foreach ($exam->questions as $index => $question)
                                <div class="flex items-center">
                                    <p>{{ $question->text }}</p>
                                    <label>
                                        <input type="radio" wire:model="formFields.{{ $question->id }}" wire:model="formFields.value" value="{{ $question->q1point }}"> {{ $question->q1 }}
                                    </label>
                                    <label>
                                        <input type="radio" wire:model="formFields.{{ $question->id }}" wire:model="formFields.value" value="{{ $question->q2point }}"> {{ $question->q2 }}
                                    </label>
                                    @if($question->q3 !== NULL)
                                    <label>
                                        <input type="radio" wire:model="formFields.{{ $question->id }}" wire:model="formFields.value" value="{{ $question->q3point }}"> {{ $question->q3 }}
                                    </label>
                                    @endif
                                    @if($question->q4 !== NULL)
                                    <label>
                                        <input type="radio" wire:model="formFields.{{ $question->id }}" wire:model="formFields.value" value="{{ $question->q4point }}"> {{ $question->q4 }}
                                    </label>
                                    @endif
                                    @if($question->q5 !== NULL)
                                    <label>
                                        <input type="radio" wire:model="formFields.{{ $question->id }}" wire:model="formFields.value" value="{{ $question->q5point }}"> {{ $question->q5 }}
                                    </label>
                                    @endif
                                </div>
                            @endforeach

                            <button type="button" wire:click="saveForm" class="btn btn-success">ذخیره پاسخ</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
</main>



