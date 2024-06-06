<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Please Check your email for verification.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button style="background-color: tomato;" class="btn text-white">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-danger">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>