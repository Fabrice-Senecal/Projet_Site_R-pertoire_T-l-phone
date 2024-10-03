<x-layout>
    <div class="flex justify-center">

        <!-- Session Status -->
        <form method="POST"
              class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 text-center border-black border rounded-3xl bg-gray-200"
              action="{{ route('password.email') }}">
            <x-auth-session-status :status="session('status')"/>
            <h1 class="text-xl py-4">
                {{__('auth.forgot.forgotPassword')}}
            </h1>
            @csrf

            <!-- Email Address -->
            <div class="flex flex-col justify-center items-center w-full">
                <x-input-label for="email" class="min-w-24" :value="__('auth.forgot.email')"/>
                <x-text-input id="email" class="block mt-1 w-1/2 min-w-40" name="email"
                              :value="old('email')"
                              autofocus/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4 flex-col my-2">
                <x-primary-button>
                    {{ __('auth.forgot.emailLink') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="mb-4 text-center text-sm text-gray-600">
        {{ __('auth.forgot.supportForgot') }}
    </div>
</x-layout>
