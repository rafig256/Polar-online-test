<main class="main container">
    <div id="articleRight" class="col-12">
        <div class="p-2 bg-light rounded">
            <h1 class="text-center font_2 py-2">کارنامه ی  {{$answer->exam->name}}</h1>
            <h2 class="text-center font_2 py-2">آزمون دهنده: {{$answer->user->name}}</h2>
            <div class="">
                  قطب های آزمون:
                <br>
                این آزمون دارای  {{$answer->exam->poles->count()}} شاخه ی اصلی است.
                <br>
                {{$answer->exam->info}}
                <ul>
                    @foreach($answer->exam->poles as $pole)
                        <li>
                            <p>شاخه ی شماره {{$loop->iteration}}: {{$pole->name}}</p>
                            <p></p>
                        </li>
                    @endforeach
                </ul>
                <hr>
                نتیجه ی شما:

                @foreach($polesArray as $pole => $value)
                    <div class="col-12 row">
                        <div class="col-12"><h4>{{$pole}}</h4></div>
                        @foreach($value['poles'] as $poleName => $poleValue)
                            <div class="col-2 @if($loop->last) order-last @endif">
                                {{$poleName}}
                            </div>
                            <div class="progress col-4 @if($loop->first) progress-left @endif @if($loop->last) progress-right @endif" >
                                <div class="progress-bar progress-bar-striped progress-bar-animated @if($loop->first) progress-left-child @endif @if($loop->last) progress-right-child @endif" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$poleValue == 0 ? 0 : $poleValue/$value['sum'] *100 }}%; "></div>
                            </div>
                        @endforeach
                    </div>
                @endforeach



            </div>
            <div class="p-2 text_container">
                <div>
                </div>

            </div>
        </div>

    </div>
</main>
