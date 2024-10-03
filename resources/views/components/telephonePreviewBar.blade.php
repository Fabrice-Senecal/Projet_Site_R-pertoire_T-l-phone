<section class="flex justify-center w-full">
    <a href="/telephones/{{ $telephone->id }}"
       class="w-8/12 border-b border-gray-400 bg-gray-200 items-center h-16 flex max-md:flex-wrap max-md:m-4 max-md:h-auto md:mx-16 md:mb-1 rounded-2xl">
        <div
            class="lg:w-2/12 md:w-1/12 sm:w-full max-md:w-full max-md:m-2 md:h-16 flex items-center md:justify-end justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-12 fill-current">
                <path
                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
            </svg>
        </div>
        <div
            class="md:border-r border-gray-300 lg:w-3/12 md:w-4/12 sm:w-full md:text-center max-md:w-full max-md:m-2 md:h-16 flex items-center md:justify-start justify-center">
            {{$telephone->numero_telephone}}
        </div>
        <div
            class="md:border-r border-gray-300 lg:w-2/12 md:w-1/12 sm:w-full md:text-center max-md:w-full max-md:m-2 md:h-16 flex items-center justify-center">
            {{$telephone->created_at->isoFormat('Do MMMM YYYY') }}
        </div>
        <div
            class="md:border-r border-gray-300 md:w-4/12 md:text-center max-md:w-full max-md:m-2 md:h-16 flex items-center justify-center">
            {{__('telephones.preview.nom_usager_ajout') . \App\Http\Controllers\TelephoneController::getNomUser($telephone)}}
        </div>
        <div
            class="md:border-r border-gray-300 md:w-1/12 md:text-center max-md:w-full max-md:m-2 md:h-16 flex items-center justify-center">
            {{\App\Http\Controllers\VoteController::getNbVoteParIdTelephone($telephone->id)}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="lg:pl-2 h-6 w-8 fill-current">
                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM135.1 217.4l107.1-99.9c3.8-3.5 8.7-5.5 13.8-5.5s10.1 2 13.8 5.5l107.1 99.9c4.5 4.2 7.1 10.1 7.1 16.3c0 12.3-10 22.3-22.3 22.3H304v96c0 17.7-14.3 32-32 32H240c-17.7 0-32-14.3-32-32V256H150.3C138 256 128 246 128 233.7c0-6.2 2.6-12.1 7.1-16.3z"/>
            </svg>
        </div>
        <div class="md:w-1/12 md:text-center max-md:w-full max-md:m-2 md:h-14 flex items-center justify-center">
            {{\App\Http\Controllers\CommentaireController::getNbCommentairesParIdTelephone($telephone->id)}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="lg:pl-2 h-6 w-8 fill-current">
                <path
                    d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z"/>
            </svg>
        </div>
        @isset($slot)
            {{ $slot }}
        @endisset
    </a>

</section>

