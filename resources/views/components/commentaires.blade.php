<ul class="overflow-y-auto h-128">
    @foreach ($commentaires as $commentaire)
        <li class="border-b border-black px-1 py-2">
            <div class="flex items-center">
                <h1 class="text-lg text-blue-700 text-left w-1/2">
                    {{$commentaire['Auteur']}}
                </h1>
                <h1 class="text-lg text-right w-1/2">
                    {{$commentaire['Date']}}
                </h1>
            </div>
            <p class="text-sm py-2 whitespace-normal break-words">
                {{$commentaire['Message']}}
            </p>
        </li>
    @endforeach
</ul>

