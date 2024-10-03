<x-layout>
    <x-slot name="titre">
        {{__('auth.verify.titre')}}
    </x-slot>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-lg text-center text-green-600">
            {{ __('auth.verify.confirmation') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-center">
        <form method="POST" class="w-8/12 sm:w-7/12 md:w-6/12 lg:w-5/12 pt-4 mt-8 px-20 items-center flex justify-center text-center"
              action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('auth.verify.renvoyerEmail')}}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layout>
