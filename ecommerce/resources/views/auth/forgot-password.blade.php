<x-guest-layout>

    <div style="color: tomato;" class="d-flex align-items-center justify-content-center mb-4 fs-2">
        <h1>Forgot Password</h1>
    </div>

    <div class="mb-4 text-sm text-gray-600 d-flex align-items-center justify-content-center">
        {{ __('Forgot your password? Please input email for recovery.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input style="border: 2px solid tomato;" class="" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{url('/login')}}" style="width: 140px" class="btn btn-danger">
                Cancel
            </a>
            <button style="background-color: tomato; width: 140px" class="btn text-white">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
</x-guest-layout>