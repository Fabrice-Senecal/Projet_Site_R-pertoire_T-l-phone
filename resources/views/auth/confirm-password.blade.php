<x-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('auth.confirm.secured') }}
    </div>
    <div class="flex justify-center w-full">

        <form method="POST"
              class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 text-center border-black border rounded-3xl bg-gray-200"
              action="{{ route('password.confirm') }}">
            <h1 class="text-xl py-4">
                {{__('auth.confirm.confirmPassword')}}
            </h1>
            @csrf

            <!-- Password -->
            <div class="flex flex-col justify-center items-center w-full">
                <x-input-label for="password" :value="__('auth.confirm.password')"/>

                <x-text-input id="password" class="block mt-1 w-1/2 min-w-40"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('auth.confirm.confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
