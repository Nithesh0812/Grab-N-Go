<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <x-jet-authentication-card class="bg-white rounded-lg shadow-lg p-10 w-full max-w-lg">
            <x-slot name="logo">
                <!-- <x-jet-authentication-card-logo class="mb-6 mx-auto" /> -->
            </x-slot>

            <div class="mb-6 text-sm text-gray-600 text-center">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 text-lg" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="flex justify-end mt-6">
                    <x-jet-button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        {{ __('Confirm') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
