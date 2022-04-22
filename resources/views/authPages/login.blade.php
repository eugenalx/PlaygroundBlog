<x-layout>


    <div class="custom-card-login container mt-5 mb-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-10 col-md-6 mx-auto mb-2">
                    <input id="email" type="email" class="form-control border-0 border-bottom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
                    required ="email" 
                    autofocus placeholder={{ __('E-Mail Address') }}>

                    @error('email') 
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            @csrf
            <div class="form-group row">
                <div class="col-sm-10 col-md-6 mx-auto  mb-2">
                    <input id="password" type="password" class="form-control border-0 border-bottom @error('password') is-invalid @enderror" name="password" 
                    required ="current-password" 
                    placeholder ={{ __('Password') }}>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 col-md-6 mx-auto">
                    <div class="form-check d-flex align-items-end">
                        <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label ms-1" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-outline-primary col-12 mx-auto mt-3">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 col-md-6 row mx-auto">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link custom-forgot-your-password col-6 " href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                   
                </div>
            </div>
        </form>
    </div>
</x-layout>