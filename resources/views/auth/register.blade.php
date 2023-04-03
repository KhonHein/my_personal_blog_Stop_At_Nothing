<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regiser</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body class="bg-secondary">
   <div class="container-fluid row m-auto my-4  justify-content-between" style="width:500px; height:auto;">
    <div class="m-auto text-center fs-2 fw-bold">Register</div>
    <form method="POST" action="{{ route('register') }}" class="col-md-8 offset-2 m-auto  ">
        @csrf

        <div class="mx-auto" style="width:300px;">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" class="form-control block mt-1 w-full  border-success" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4 mx-auto" style="width:300px;">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" class="form-control block mt-1 w-full  border-success" type="email" name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <div class="mt-4 mx-auto" style="width:300px;">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" class="form-control block mt-1 w-full  border-success" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
        </div>

        <div class="mt-4 mx-auto" style="width:300px;">
            <x-label for="phone" value="{{ __('Phone') }}" />
            <x-input id="phone" class="form-control block mt-1 w-full  border-success" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
        </div>

        <div class="mt-4 mx-auto" style="width:300px;">
            <x-label for="password" value="{{ __('Password') }}" />
            <x-input id="password" class="form-control block mt-1 w-full  border-success" type="password" name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4 mx-auto" style="width:300px;">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" class="form-control block mt-1 w-full  border-success" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4 mx-auto">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
        @endif

        <div class="flex items-center d-flex justify-content-between mt-4">
            <a class="btn btn-secondary  my-2 text-warning rounded-pill py-2 px-4" href="{{ route('login') }}">
                {{ __('Login ?') }}
            </a>

            <x-button class="ms-5 my-2  btn border-danger btn-dark ">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
   </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
