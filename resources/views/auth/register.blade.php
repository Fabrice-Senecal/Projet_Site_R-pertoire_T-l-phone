<x-layout>
    <div class="flex justify-center items-center">
        <form method="POST"
              class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 flex flex-col justify-center items-center text-center border-black border rounded-3xl bg-gray-200"
              action="{{ route('register') }}">
            <h1 class="text-xl py-4 min-w-fit">
                {{__('auth.register.register')}}
            </h1>
            @csrf

            <!-- Name -->
            <div class="flex flex-col justify-center items-center w-full">
                <x-input-label for="name" :value="__('auth.register.nom')"/>
                <x-text-input id="name" class="block mt-1 w-1/2 min-w-40" type="text" name="name" :value="old('name')"
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="flex flex-col justify-center items-center w-full mt-4">
                <x-input-label for="email" :value="__('auth.register.email')"/>
                <x-text-input id="email" class="block mt-1 w-1/2 min-w-40" name="email" :value="old('email')"
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="flex flex-col justify-center items-center  w-full mt-4">
                <x-input-label for="password" :value="__('auth.register.password')"/>

                <x-text-input id="password" class="block mt-1 w-1/2 min-w-40"
                              type="password"
                              name="password"
                              autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('passwordIncorrect')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="flex flex-col justify-center items-center w-full mt-4">
                <x-input-label for="password_confirmation" :value="__('auth.register.confirmerPassword')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-1/2 min-w-40"
                              type="password"
                              name="password_confirmation" autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4 flex-col">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('auth.register.alreadyRegister') }}
                </a>

                <x-primary-button class="my-2">
                    {{ __('auth.register.register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
