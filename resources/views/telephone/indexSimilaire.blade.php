<x-layout>
    <x-slot name="titre">
        {{__('telephones.numeroSimilaire.titre')}}
    </x-slot>

    <ul>
        @foreach($telephones as $telephone)
            <li>
                <x-telephonePreviewBar :telephone="$telephone">
                </x-telephonePreviewBar>
            </li>
            <li>
                <x-descriptionPreview :description="$telephone->description">
                </x-descriptionPreview>
            </li>
        @endforeach
    </ul>
    <div class="flex flex-col items-center justify-center font-semibold">
        <h2 class="text-center">{{$numeroCherche}}</h2>
        <h2 class="text-center">{{__('telephones.numeroSimilaire.description')}}</h2>

        <form action="{{route('telephones.create')}}"
              class="px-4 flex justify-center sm:w-2/12 w-10/12 h-8">
            @csrf
            <input type="hidden" name="numeroCherche" value="{{ $numeroCherche }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded w-12/12 h-10 mt-2">
                {{ __('telephones.numeroSimilaire.ajouter') }}
            </button>
        </form>
    </div>
</x-layout>
