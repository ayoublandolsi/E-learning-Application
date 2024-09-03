@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('EmailAddress') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('PhoneNumber') }}</label>
    <div class="col-md-6">
        <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phonenumber') }}" name="phonenumber" value="{{ old('phone_number') }}" required autocomplete="phone_number">

        @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="gendre" class="col-md-4 col-form-label text-md-end">Gender</label>
    <div class="col-md-6">
        <select id="gendre" class="form-select @error('gendre') is-invalid @enderror" name="gendre" value="{{ old('gendre') }}" required>
            <option value="{{ old('gendre') }}">Select...</option>
            <option value="male" >Male</option>
            <option value="female" >Female</option>
        </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="PreferredTime" class="col-md-4 col-form-label text-md-end">{{ __('PreferredTime:') }}</label>
                            <div class="col-md-6">
                                <select id="PreferredTime" class="form-select @error('PreferredTime') is-invalid @enderror" name="PreferredTime" required>
                                    <option value="">Select...</option>
                                    <option value="male" {{ old('PreferredTime') == 'Morning' ? 'selected' : '' }}>Morning</option>
                                    <option value="female" {{ old('PreferredTime') == 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                    <option value="other" {{ old('PreferredTime') == 'Evening' ? 'selected' : '' }}>Evening</option>
                                </select>

                                @error('PreferredTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="course" class="col-md-4 col-form-label text-md-end">Categories</label>
                            <div class="col-md-6">
                                <select id="spec" class="form-select @error('spec') is-invalid @enderror" name="spec" value="{{ old('spec') }}" required>
                                    <option value="">Select...</option>
                                    <option value="Web Design">Web Design</option>
                                    <option value="Video Editing"  >Video Editing</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Online Marketing" >Online Marketing</option>
                                </select>
                                @error('spec')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <input type="hidden" name="role" value="apprenant">
                         <input type="hidden" name="state" value="desactive">


                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="{{ old('password_confirmation') }}" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-3">
    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
    <div class="col-md-6">
        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="img" accept="image/*">

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
