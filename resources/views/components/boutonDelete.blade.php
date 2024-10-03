<div
    class="md:border-l border-gray-300 md:w-1/12 md:text-center max-md:w-full max-md:m-2 md:h-14 flex items-center justify-center">

    @if(\App\Http\Controllers\TelephoneController::getNbVotesParId($telephone->id) < 10)
        <form action="{{route('telephones.destroy', $telephone)}}" method="post"
              class="w-1/2 justify-center flex md:w-full">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold rounded h-full w-1/2">
                {{__('telephones.indexPerso.delete')}}
            </button>
        </form>
    @else
        <div class="px-4 w-2/12 h-8">
        </div>
    @endif

</div>
