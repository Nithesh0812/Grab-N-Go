<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <x-jet-authentication-card class="bg-white rounded-lg shadow-lg p-10 w-full max-w-lg">
            <x-slot name="logo">
                <!-- <x-jet-authentication-card-logo class="mb-6 mx-auto" /> -->
            </x-slot>

            <div class="mb-6 text-sm text-gray-600 text-center">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-6 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-jet-button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div>
                </form>

                <div class="flex items-center">
                    <a href="{{ route('profile.show') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Edit Profile') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
