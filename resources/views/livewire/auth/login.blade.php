<main class="main container">

    <div class="row justify-content-center align-items-center">
        <form wire:submit.prevent="" action="" class="bg_blur_light p-4 col-12 col-md-6 my-5 shadow ">
            @csrf
            <i class="fas fa-user-check fa-3x d-block text-center my-3"></i>
            <h5 class="text-center">فرم ورود</h5>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group row justify-content-center">
                <input aria-label="email" type="text" class="form-control rounded_5 col-10 col-md-8 shadow" placeholder="ایمیل"  wire:model="email">
            </div>
            @error('email') <span class="error text-danger">{{$message}}</span> @enderror
            <div class="form-group row justify-content-center">
                <input aria-label="password" type="password" class="form-control rounded_5 col-10 col-md-8 shadow" placeholder="کلمه عبور" wire:model="password">
            </div>
            @error('password') <span class="error text-danger">{{$message}}</span> @enderror
            <div class="form-group row justify-content-center">
                <input type="checkbox" class="form-control outline_0 box_shadow_0 h-auto" wire:model="remember">
                مرا بخاطر بسپار
            </div>
            <div class="form-group row justify-content-center">
                <button type="button" class="btn btn-success rounded_5 px-5 shadow-sm" wire:click="login">ورود</button>
            </div>
        </form>
        <div wire:loading wire:target="submit">
            Loading...
        </div>
    </div>

</main>
