<div class="justify-center items-center w-full border-b border-gray-400 h-24">
    <h1 class="w-full text-center text-xl h-8 pt-2">
        {{__('telephones.show.date')}}

    </h1>
    <p class="w-full text-center text-lg h-16 pt-2">
        {{ucfirst($telephone->created_at->IsoFormat('LLLL'))}}
    </p>
</div>
