<x-layout>
    <div class="h-screen">
        <x-slot name="titre">
            {{__('welcome.titre')}}
        </x-slot>
        <div class="flex justify-center">
            <form method="GET" action="{{ route('recherche') }}"
                  class="w-5/12  max-sm:w-10/12 border-black border rounded-3xl bg-gray-200 text-center shadow-md rounded p-8 my-4">
                @csrf
                <div>
                    <x-text-input id="numero_telephone" name="numero_telephone" type="text" class="mt-1 block w-full"
                                  :value="old('numero_telephone')"/>
                    <x-input-error :messages="$errors->get('numero_telephone')" class="mt-2"/>
                </div>
                <div class="mt-4 items-center gap-4">
                    <x-primary-button>{{ __('welcome.recherche') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
