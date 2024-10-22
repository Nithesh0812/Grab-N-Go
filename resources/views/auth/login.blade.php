<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <x-jet-authentication-card class="bg-white rounded-lg shadow-lg p-10 w-full max-w-lg">
            <x-slot name="logo">
                <!-- <a href="/redirect"><img src="my/logo.jpg" class="mx-auto mb-8" alt="Logo" /></a> -->
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-lg" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-6">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-lg" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="mt-6">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-lg text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-lg text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded text-lg">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
