<x-mail::message>
    # نتیجه ی آزمون {{$userName}}

    @foreach($polesArray as $pole => $value)
        # {{$pole}}
        @foreach($value['poles'] as $poleName => $poleValue)
            -{{$poleName}} : {{$poleValue == 0 ? 0 : $poleValue/$value['sum'] *100 }}%
        @endforeach
    @endforeach

    @component('mail::button', ['url' => config('setting.siteDomain')])
        مراجعه به سایت
    @endcomponent


    با تشکر فراوان<br>
    {{config('setting.appName')}}<br>
    {{config('setting.siteName')}}
</x-mail::message>
