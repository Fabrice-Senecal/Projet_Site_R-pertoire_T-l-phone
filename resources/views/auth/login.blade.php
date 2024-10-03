<x-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <div class="flex justify-center">
        <form method="POST"
              class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 flex flex-col justify-center items-center text-center border-black border rounded-3xl bg-gray-200"
              action="{{ route('login') }}">
            <h1 class="text-xl py-4">
                {{__('auth.login.connexion')}}
            </h1>
            @csrf

            <!-- Email Address -->
            <div class="flex flex-col justify-center items-center w-full mt-4">
                <x-input-label for="email" :value="__('auth.login.email')"/>
                <x-text-input id="email" class="block mt-1 w-1/2 min-w-40" name="email" :value="old('email')"
                              autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="flex flex-col justify-center items-center w-full mt-4">
                <x-input-label for="password" :value="__('auth.login.password')"/>

                <x-text-input id="password" class="block mt-1 w-1/2 min-w-40"
                              type="password"
                              name="password"
                              autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('passwordIncorrect')" class="mt-2"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('auth.login.rememberMe') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 flex-col">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('auth.login.forgotPassword') }}
                    </a>
                @endif

                <x-primary-button class="my-2">
                    {{ __('auth.login.login') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-layout>
