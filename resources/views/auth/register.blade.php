@extends('layouts.app')

@section('content')
<section class="vh-150" style="background-color: #E5E7E9;">
  <div class="container py-5 h-75">
    <div class="row d-flex justify-content-center align-items-center h-75">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route('register') }}">
                @csrf
                
                  <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                    <img src="{{asset('assets/dist/img/edge_pic_2.png')}}" height="65" alt="">
                    <span class="h1 fw-bold mb-0">Training Edge Consulting</span>
                  </div>

                  <h4 class="text-center mb-3 pb-3" style="letter-spacing: 1px;">Sign up Page</h4>

                  
                  <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus />
                            <label class="form-label" for="name">{{ __('Full Name') }}</label>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email"/>
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="phone" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autofocus/>
                            <label class="form-label" for="phone">{{ __('phone') }}</label>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                  </div>

                  <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="country" class="form-control form-control-lg @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autofocus />
                            <label class="form-label" for="country">{{ __('country') }}</label>
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="text" id="city" class="form-control form-control-lg @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autofocus />
                            <label class="form-label" for="city">{{ __('city') }}</label>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                  </div>


                  <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-outline mb-4">
                            <input type="password" id="password-confirm" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password"/>
                            <label class="form-label" for="password-confirm">{{ __('re-Password') }}</label>
                        </div>
                    </div>
                  </div>


                  <div class="pt-1 mb-4 text-center">
                    <button class="btn btn-dark  btn-lg btn-block" type="submit">{{ __('Register') }}</button>
                  </div>

                 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
