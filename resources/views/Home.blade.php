@extends('components/Base')
@section('title', 'Financial')
@section('content')
@extends('components/Navbar')

<div class="body-container d-flex flex-column">

    <div class=" header finisher-header d-flex justify-content-center align-items-center" style=" width: 100%; height: 75vh;">

        <div class="container text-center">
            <h1 class="text-white">Planifiez, Économisez, Réalisez : Notre site, votre avenir financier.</h1>
            <p>Créer un compte et commencer à gérer votre budget</p>
            <button class="btn btn-danger opacity-50"><a class="link-underline-opacity-0 link-light" href="{{route('Inscription')}}">Créer mon
                    compte</a></button>
        </div>
    </div>

    <section class="section d-flex justify-content-center align-items-center" style=" width: 100%; height: auto;">
        <div class="container  py-5 px-5">
            <div class="row">
                <div class="col">
                    <img height="400" src="{{asset('svg/bureau.svg')}}" alt="">
                </div>
                <div class="col">
                    <h2>Un compte gratuit et unique</h2>
                    <p style="color: orangered;">100% français et gratuit !</p>
                    <p>Optimisez votre gestion financière sans tracas avec notre plateforme de gestion de budget. Pas de
                        choix difficiles à faire, pas de données sensibles à entrer.</p>
                    <br>
                    <p>Profitez de notre offre unique,
                        entièrement gratuite. Nous vous offrons la simplicité et l'efficacité pour vous aider à prendre
                        le
                        contrôle de vos finances.</p>
                    <br>
                    <p>Commencez dès aujourd'hui à planifier votre avenir financier, sans aucune
                        contrainte. Parce que la gestion de budget devrait être simple, transparente, et accessible à
                        tous.
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section class=" section d-flex text-center bg-secondary bg-gradient text-white" style=" width: 100%; height: auto;">
        <div class="container   py-5 px-5" style="width: 50em;">
            <h2>Votre <span style="color: orangered;">compte</span> est privé et sécurisé<img src="{{asset('icone/cadena.png')}}" alt=""></h2>
            <p>Votre sécurité est notre priorité absolue. Avec une protection renforcée et des mesures de sécurité
                avancées,
                votre compte est complètement sécurisé. Nous avons mis en place des protocoles de sécurité robustes pour
                garantir la confidentialité de vos informations financières.</p>
            <p>De plus, nous respectons votre vie privée. Aucune connexion avec une banque n'est nécessaire pour
                profiter
                pleinement de nos services. Votre compte est privé et indépendant, offrant une gestion transparente de
                vos
                finances sans compromettre la sécurité de vos données. Avec nous, la confidentialité est au cœur de
                l'expérience, vous permettant de prendre le contrôle de votre budget en toute confiance et tranquillité
                d'esprit.</p>
        </div>
    </section>

    <section class="section d-flex text-center justify-content-center align-items-center text-black" style=" width: 100%; height: auto;">
        <div class="container  py-5 px-5" style="width: 50em;">
            <p style="color: orangered;">
            <p>- Une plateforme simple et efficace -</p>
            <h2>Devenez <span style="color: orangered;">maitre</span> de votre budget</h2>
            <p class="opacity-50 py-1">Outils d'analyse | Aide constante | Aucune connexion bancaire</p>
            <div class="row">
                <div class="col">
                    <img height="100" src="{{asset('images/calculator.png')}}" alt="">
                    <h3>Maitrise</h3>
                    <p>Différents outils de gestion sont disponibles pour obtenir le meilleur de votre budget.</p>
                    <p>Des conseils de gestion sont disponibles à tout moment.</p>
                </div>
                <div class="col">
                    <img height="100" src="{{asset('images/cacke.png')}}" alt="">
                    <h3>Dévellopement</h3>
                    <p>Des graphiques simples sont disponibles à tout moment dans votre espace personnel.</p>
                    <p>Tout est expliqué et détaillé pour trouver le meilleur compromis avec votre portefeuille.</p>
                </div>
                <div class="col">
                    <img height="100" src="{{asset('images/card.png')}}" alt="">
                    <h3>Gratuit</h3>
                    <p>Aucune carte de paiement n'est nécessaire pour ouvrir un compte, aucune connexion à la banque
                        n'est requise.</p>
                    <p>Seules les informations que vous rentrerez seront utilisées.</p>

                </div>
            </div>
        </div>
    </section>
</div>


@endsection