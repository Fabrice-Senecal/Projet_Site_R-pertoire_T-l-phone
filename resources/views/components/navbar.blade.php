<nav class="flex bg-emerald-900 text-white w-screen">
    @if (Route::has('login'))
        <div class="w-1/6px-3 xl:px-12 py-6 max-sm:py-3 max-sm:flex-wrap flex w-full items-center">
            <div class="flex max-sm:w-full max-sm:py-5">
                <div class="px-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-8 w-8 fill-current">
                        <path
                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                    </svg>
                </div>
                <a class="text-2xl font-bold font-heading" href="/">
                    {{__('navbar.titreExercice')}}
                </a>
            </div>

            <div class="flex md:w-full">
                <ul class="w-1/3 md:flex px-10 md:mx-10 font-semibold max-sm:flex-wrap font-heading md:space-x-12">
                    <li class="min-w-1/4  nav-item max-sm:py-1">
                        <a class="w-full" aria-current="page" href="/">{{__('navbar.acceuil')}}</a>
                    </li>
                    <li class="min-w-1/4  nav-item max-sm:py-1">
                        <a class="w-full" aria-current="page"
                           href="/telephones">{{__('navbar.telephones')}}</a>
                    </li>
                    <li class="min-w-1/4  nav-item max-sm:py-1">
                        <a class="w-full" aria-current="page"
                           href="/telephones/create">{{__('navbar.create')}}</a>
                    </li>
                    @auth
                        <li class="min-w-1/4 nav-item max-sm:py-1">
                            <a class="w-full" aria-current="page"
                               href="/telephones/index-perso">{{__('navbar.mesNum')}}</a>
                        </li>
                    @endauth
                </ul>

                <div class="md:w-2/3 w-full md:flex px-10 md:mx-10 justify-end max-md:flex-wrap">
                    @auth
                        <div class="ml-4 font-semibold text-white">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('navbar.logout') }}
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 font-semibold text-white">{{__('navbar.login')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 font-semibold text-white">{{__('navbar.register')}}</a>
                        @endif
                    @endauth
                </div>
               @endif
            </div>
        </div>
</nav>


