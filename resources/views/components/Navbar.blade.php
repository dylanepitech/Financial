<nav class="navbar navbar-expand-lg bg-body-tertiary bg-gradient opacity-75">
    <div class="container-fluid">
        <a style="font-size: 1.5em; letter-spacing: 2px; text-shadow: 2px 2px 5px black;" class="navbar-brand" href="{{route('Home')}}">Financial</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(!auth()->user())
                @if(Route::currentRouteName() != 'Connexion')
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('Connexion')}}">Se connecter <img src="{{asset('icone/connexion.png')}}" alt="Icone_mesages"></a>
                </li>
                @endif
                @if(Route::currentRouteName() != 'Inscription')
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('Inscription')}}">S'inscrire <img src="{{asset('icone/inscription.png')}}" alt="Icone_mesages"></a>
                </li>
                @endif
                @endif
                @if(auth()->user())
                @if(Route::currentRouteName() != 'Information')
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('Information')}}">Mes informations <img src="{{asset('icone/cadena.png')}}" alt="Icone_mesages"></a>
                </li>
                @endif
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('Deconnexion')}}">déconnexion <img src="{{asset('icone/deconnexion.png')}}" alt="Icone_mesages"></a>
                </li>
                @if(Route::currentRouteName() != 'Landing')
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('Landing')}}">Ma page personelle <img src="{{asset('icone/loupe.png')}}" alt="Icone_mesages"></a>
                </li>
                @endif
                @endif
            </ul>
            <p class="justify-content-end my-auto">
                100% français <img height="20" src="{{asset('icone/france.png')}}" alt="">
            </p>
        </div>
    </div>
</nav>
<div class="container">
    @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
    @endif
</div>