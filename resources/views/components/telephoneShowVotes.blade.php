<div class="w-full h-16 flex items-center justify-center">
    <div class="sm:w-2/12 w-11/12 h-min text-center text-xl">
        {{__('telephones.show.votes')}}
        {{\App\Http\Controllers\VoteController::getNbVoteParIdTelephone($telephone->id)}}

    </div>
    <form action="{{route('votes.store')}}" method="post" class="px-4 sm:w-2/12 w-10/12 h-8">
        @csrf
        <input type="hidden" name="telephone_id" value="{{ $telephone->id }}">
        <x-input-error :messages="$errors->get('dejaVote')" class="h-4"/>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded h-full w-full">
            {{__('telephones.show.voter')}}
        </button>
    </form>
</div>
