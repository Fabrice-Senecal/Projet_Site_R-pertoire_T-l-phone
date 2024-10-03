<x-layout>
    <x-slot name="titre">
        {{__('telephones.show.titre')}}
    </x-slot>

    <x-telephoneShowCard :telephone="$telephone" :commentaires="$commentaires">
    </x-telephoneShowCard>

</x-layout>

