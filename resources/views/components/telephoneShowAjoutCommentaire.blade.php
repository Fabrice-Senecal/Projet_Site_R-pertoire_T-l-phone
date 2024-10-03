<div class="w-full h-48 bg-gray-200 border-t border-black flex flex-col items-center">
    @auth

        <form action="{{route('commentaires.store')}}" method="post" class="px-4 text-center w-12/12 h-8">
            @csrf
            <input type="hidden" name="telephone_id" value="{{ $telephone->id }}">
            <label class="lg:text-xl md:text-lg text-md pt-2" for="message">
                {{__('telephones.show.ajoutCommentaire')}}
            </label>
            <textarea id="message" name="message"
                      rows="4"
                      class="w-full text-sm text-gray-900 bg-gray-50
                       rounded-lg border border-gray-300 focus:ring-blue-500
                       focus:border-blue-500 min-h-16 max-h-24" placeholder="Commentaire"></textarea>
            <div class="flex flex-col justify- items-center">
                <x-input-error :messages="$errors->get('message')" class="h-4"/>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded sm:w-3/12 w-11/12 h-8 mt-2">
                    {{__('telephones.show.envoyer')}}
                </button>
            </div>
        </form>
    @else
        <h1 class="lg:text-xl md:text-lg text-md pt-2">
            {{__('telephones.show.ajoutCommentaire')}}
        </h1>

        <h1 class="lg:text-xl md:text-lg text-md pt-2">
            {{__('telephones.show.devezEtreConnecter')}}
        </h1>
        <a href="{{ route('login') }}" class="px-4 sm:w-3/12 w-11/12 h-10 mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded h-full w-full">
                {{__('telephones.show.login')}}
            </button>
        </a>
        <a href="{{ route('register') }}" class="px-4 sm:w-3/12 w-11/12 h-10 mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded h-full w-full">
                {{__('telephones.show.register')}}
            </button>
        </a>
    @endauth
</div>
