<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body class="bg-secondary">
   <div class="container-fluid row m-auto my-4  justify-content-center">

    <form method="POST" action="{{ route('login') }}" class="my-5 text-center d-flex justify-content-center">
        @csrf
        <div class="my-5 text-center " style="height:500px; width:500px;">
            <div class="m-auto text-center fs-2 fw-bold">Login Page</div>
            <div class=" mx-5 " style="width: 500p;">
                <label for="email">email</label>
                <x-input id="email" class="block form-control my-2 w-full rounded-3 border-success" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class=" mx-5 " style="width: 500p;">
                <label for="password">password</label>
                <x-input id="password" class="block form-control my-2 w-full rounded-3 border-success" type="password" name="password" required autocomplete="new-password" />
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class=" mx-5 ">
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

            <div class="flex items-center justify-end  mx-5">
                <a class=" text-decoration-none text-sm text-warning fw-bold  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('register?') }}
                </a>

                <x-button class="ms-5 btn border-danger btn-dark ">
                    {{ __('Login') }}
                </x-button>
            </div>
        </div>
    </form>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

