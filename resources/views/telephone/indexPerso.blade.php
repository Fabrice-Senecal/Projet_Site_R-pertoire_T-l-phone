<x-layout>
    <x-slot name="titre">
        {{__('telephones.indexPerso.titre')}}
    </x-slot>
    @if(sizeof($telephones) > 0 )
        <ul>
            @foreach($telephones as $telephone)
                <li class="flex">
                    <x-telephonePreviewBar :telephone="$telephone">
                        <x-boutonDelete :telephone="$telephone">
                        </x-boutonDelete>
                    </x-telephonePreviewBar>

                </li>
            @endforeach
        </ul>
    @else
        <ul class="h-128 text-center">
            <h1 class="lg:text-2xl md:text-xl text-lg pt-20 text-gray-600">
                {{__('telephones.indexPerso.aucunNumero')}}
            </h1>
            <a href="{{ route('telephones.create') }}" class="px-4 sm:w-3/12 w-11/12 h-10 mt-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded h-8 w-24 mt-4">
                    {{__('telephones.indexPerso.ajouterNumero')}}
                </button>
            </a>
        </ul>

    @endif

</x-layout>
