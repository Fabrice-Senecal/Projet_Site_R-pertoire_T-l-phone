<section class="flex justify-center flex-wrap">
    <div class="flex-col justify-center w-full md:w-5/12">
        <div class="w-full bg-gray-200 items-center md:border-r-2 border-gray-700 h-144 max-md:flex-wrap ">
            <x-telephoneShowNumero :telephone="$telephone">
            </x-telephoneShowNumero>
            <x-telephoneShowDescription :telephone="$telephone">
            </x-telephoneShowDescription>
            <x-telephoneShowDate :telephone="$telephone">
            </x-telephoneShowDate>
            <x-telephoneShowAjouteur :telephone="$telephone">
            </x-telephoneShowAjouteur>
            <x-telephoneShowVotes :telephone="$telephone">
            </x-telephoneShowVotes>
        </div>

        <x-telephoneShowAjoutNumero :telephone="$telephone">

        </x-telephoneShowAjoutNumero>
    </div>
    <div class="flex flex-col justify-center w-full md:w-5/12">
        <x-commentaireScrollDown>
            @if(\App\Http\Controllers\CommentaireController::getNbCommentairesParIdTelephone($telephone->id) > 0)
                <x-commentaires :commentaires="$commentaires">

                </x-commentaires>
            @else
                <ul class="h-128 text-center">
                    <h1 class="lg:text-2xl md:text-xl text-lg pt-20 text-gray-600">
                        {{__('telephones.show.aucunCommentaire')}}
                    </h1>
                </ul>
            @endif
        </x-commentaireScrollDown>
        <x-telephoneShowAjoutCommentaire :telephone="$telephone">

        </x-telephoneShowAjoutCommentaire>
    </div>
</section>





