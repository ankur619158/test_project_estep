@extends('layouts.app')

@section('content')
<script src="{{ asset('js/custom-ajax.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit User') }}
                    <div class="pull-right">
                        <a href="/">Go Back</a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email  }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact_number" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ $user->contact_number }}" required>

                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" {{ $user->gender == 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" {{ $user->gender == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_female">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_other" value="Other" {{ $user->gender == 'Other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gender_other">
                                        Other
                                    </label>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
    <label for="hobbies" class="col-md-4 col-form-label text-md-end">{{ __('Hobbies') }}</label>
    <div class="col-md-6">
        <div class="multiselect">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="multiselectDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select options
                </button>
                <div class="dropdown-menu" aria-labelledby="multiselectDropdown">
                    <div class="multiselect-option">
                        <input type="checkbox" class="option-checkbox" id="option1" name="hobbies[]" value="Gamer">
                        <label class="form-check-label" for="option1"> Gamer</label>
                    </div>
                    <div class="multiselect-option">
                        <input type="checkbox" class="option-checkbox" id="option2" name="hobbies[]" value="Fast Bike">
                        <label class="form-check-label" for="option2"> Fast Bike</label>
                    </div>
                    <div class="multiselect-option">
                        <input type="checkbox" class="option-checkbox" id="option3" name="hobbies[]" value="reading books">
                        <label class="form-check-label" for="option3"> Reading Books</label>
                    </div>
                    <div class="multiselect-option">
                        <input type="checkbox" class="option-checkbox" id="option4" name="hobbies[]" value="Playing Cricket">
                        <label class="form-check-label" for="option4"> Playing Cricket</label>
                    </div>
                </div>
            </div>
        </div>
        @error('hobbies')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button id="edit-button" data-id="{{ $user->user_id }}" class="btn btn-primary">
            {{ __('Edit User') }}
        </button>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

