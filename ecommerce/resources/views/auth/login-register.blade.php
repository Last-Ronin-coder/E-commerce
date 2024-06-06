<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/login-register.css')}}" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class=" sign-in-form">

                    @csrf

                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <button type="submit" value="Login" class="btn solid">{{ __('Log in') }}</button>

                </form>

                <form method="POST" action="{{ route('register') }}" class=" sign-up-form">

                    @csrf

                    <h2 class="title">Sign up</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" value="Login" class="btn solid">{{ __('Register') }}</button>

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{asset('js/login-register.js')}}"></script>
</body>

</html>