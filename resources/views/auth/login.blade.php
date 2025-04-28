<x-guest-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @csrf

        <!-- Header -->
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

        <!-- Email -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" class="block mb-2 font-medium text-gray-700" />
            <x-text-input 
                id="email" 
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                placeholder="Enter your email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" class="block mb-2 font-medium text-gray-700" />
            <x-text-input 
                id="password" 
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                placeholder="Enter your password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-800 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between">
            <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">
                {{ __("Don't have an account?") }} <span class="font-semibold text-blue-600 hover:underline">Register</span>
            </a>

            <x-primary-button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-white rounded-md transition-colors">
                <i class="fas fa-sign-in-alt mr-2"></i> {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-primary-button>Logout</x-primary-button>
    </form>
</x-guest-layout>