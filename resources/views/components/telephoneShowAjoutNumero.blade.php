<div class="w-full border-t border-black h-48 bg-gray-200 flex flex-col items-center">
    <h1 class="lg:text-xl md:text-lg text-md pt-2">
        {{__('telephones.show.ajoutNumero')}}
    </h1>
    <a href="{{ route('telephones.create') }}" class="px-4 sm:w-3/12 w-11/12 h-10 mt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded h-full w-full">
            {{__('telephones.show.signalerNumero')}}
        </button>
    </a>
</div>
