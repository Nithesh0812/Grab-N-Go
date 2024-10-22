<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <x-jet-authentication-card class="bg-white rounded-lg shadow-lg p-10 w-full max-w-lg">
            <x-slot name="logo">
                <a href="/redirect">
                    <!-- <img src="my/logo.jpg" class="mb-6 mx-auto" alt="Logo" /> -->
                </a>
            </x-slot>

            <div class="mb-6 text-sm text-gray-600 text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-lg" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-jet-button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        {{ __('Email Password Reset Link') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
