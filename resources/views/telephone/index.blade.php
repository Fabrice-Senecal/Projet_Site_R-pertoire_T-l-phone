<x-layout>
    <x-slot name="titre">
        {{__('telephones.index.titre')}}
    </x-slot>

    <ul>
        @foreach($telephones as $telephone)
            <li>
                <x-telephonePreviewBar :telephone="$telephone">
                </x-telephonePreviewBar>
            </li>
        @endforeach
    </ul>
</x-layout>
