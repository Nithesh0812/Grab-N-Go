<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <x-jet-authentication-card class="bg-white rounded-lg shadow-lg p-10 w-full max-w-lg">
            <x-slot name="logo">
                <a href="/redirect">
                    <!-- <img src="my/logo.jpg" class="mb-6 mx-auto" alt="Logo" /> -->
                </a>
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="phone" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="number" name="phone" :value="old('phone')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="address" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="text" name="address" :value="old('address')" required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-lg font-medium text-gray-700" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
