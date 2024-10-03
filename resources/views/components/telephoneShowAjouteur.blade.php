<div class="justify-center items-center w-full border-b border-gray-400 h-24">
    <h1 class="w-full text-center text-2xl h-12 pt-2">
        {{__('telephones.show.signalerTitre')}}
    </h1>
    <p class="w-full text-center text-xl h-12">
        {{\App\Http\Controllers\TelephoneController::getNomUser($telephone)}}
    </p>
</div>
