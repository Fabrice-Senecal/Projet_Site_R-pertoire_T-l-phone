<x-layout>
    <div class="flex justify-center">

        <form method="POST"
              class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 text-center border-black border rounded-3xl bg-gray-200"
              action="{{ route('password.store') }}">
            <h1 class="text-xl py-4">
                {{__('auth.reset.resetPassword')}}
            </h1>
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('auth.reset.email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email', $request->email)" autofocus autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('auth.reset.password')"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                              autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('auth.reset.confirmPassword')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-center my-4">
                <x-primary-button>
                    {{ __('auth.reset.reset') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
