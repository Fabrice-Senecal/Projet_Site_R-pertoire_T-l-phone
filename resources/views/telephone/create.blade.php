<x-layout>
    <div class="h-screen">
        <x-slot name="titre">
            {{ __('telephones.create.titre') }}
        </x-slot>
        <div class="flex justify-center">
            <form method="POST" action="{{ route('telephones.store') }}"
                  class="lg:w-3/12 md:w-4/12 sm:w-5/12 w-6/12  border-black border rounded-3xl bg-gray-200 text-center shadow-md rounded p-8 my-4">
                @csrf
                <div>
                    <x-input-error :messages="$errors->get('numero_telephone')" class="mt-2"/>
                    <x-input-label for="numero_telephone" :value="__('telephones.create.numero_telephone')"/>
                    @isset($numeroCherche)
                        <x-text-input id="numero_telephone" name="numero_telephone" type="text"
                                      class="mt-1 block w-full"
                                      :value="$numeroCherche"
                        />
                    @else
                        <x-text-input id="numero_telephone" name="numero_telephone" type="text"
                                      class="mt-1 block w-full"
                                      :value=" old('numero_telephone')"
                        />
                    @endisset
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    <x-input-label for="description" :value="__('telephones.create.description')"/>
                    <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                  :value="old('description')"
                    />
                </div>
                <div class="mt-4 items-center gap-4">
                    <x-primary-button>{{ __('telephones.create.enregistrer') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
