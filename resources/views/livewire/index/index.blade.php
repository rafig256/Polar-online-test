<main class="main container-fluid">

    <!-- -------------------- top banner ------------------------- -->

    <div class=" row top_header_banner align-items-center justify-content-center">
        <div class="bg_blur_light p-4 bg_blur_light rounded_5 d-none d-md-block animate__animated animate__fadeInDown animate__delay-1s ">
            <h3 class="text-center text-dark">خیلی زود مسیر برنامه نویسی رو پیدا کن</h3>
        </div>
        <div class="row col-12 col-md-10 justify-content-center article_goup">
            <a href="#" class="p-4 col-11 col-md-4 animate__animated animate__fadeInDown">
                <div class="p-3 cursor_pointer_shadow rounded bg_blur_light text-center border_2 border_white">
                    <i class="fas fa-chalkboard-teacher fa-3x"></i>
                    <h4 class="text-center ">مقالات راهنمای مسیر</h4>
                </div>
            </a>
            <a href="#" class="p-4 col-11 col-md-4 animate__animated animate__fadeInDown animate__delay-1s">
                <div class="p-3 cursor_pointer_shadow rounded bg_blur_light text-center border_2 border_white">
                    <i class="fab fa-react fa-3x"></i>
                    <h4 class="text-center ">مقالات زبان های سمت کاربر</h4>
                </div>
            </a>
            <a href="#" class="p-4 col-11 col-md-4 animate__animated animate__fadeInDown">
                <div class="p-3 cursor_pointer_shadow rounded bg_blur_light text-center border_2 border_white">
                    <i class="fab fa-php fa-3x"></i>
                    <h4 class="text-center ">مقالات زبان های سمت سرور</h4>
                </div>
            </a>
        </div>
    </div>

    <!-- -------------------- best article ------------------------- -->
    <div id="bestArticles" class="row justify-content-center col-12 col-lg-10 m-auto">

        <div class="col-12 text-right">
            <h4 class="pt-4 pb-1 text-info">آخرین آزمون ها</h4>
            <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
        </div>

        <div class="row justify-content-center align-items-center">
            @foreach($exams as $exam)
                    <livewire:index.exam-card wire:key="{{ $exam->id }}" :exam="$exam" />
            @endforeach
        </div>


    </div>

</main>
