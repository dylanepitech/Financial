@extends('components/Base')
@section('title', 'Financial')
@section('content')
@extends('components/Navbar')

<div class="body">
    <div class="container text-center mt-5">

        <form action="{{route('Inscription.post')}}" method="post" class="text-center">
            <img height="90" src="{{asset('images/formulaire.png')}}" alt="Personnage_icone">
            <h2>Inscription</h2>
            @csrf
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3 mt-5">
                    <span class="input-group-text" id="name"><img height="20" src="{{asset('images/personnage.png')}}" alt="Personnage_icone"></span>
                    <input type="text" class="form-control" placeholder="Votre prénom" name="name" value="{{old('name')}}">
                </div>
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3 mt-5">
                    <span class="input-group-text" id="email">@</span>
                    <input type="email" class="form-control" placeholder="Votre E-mail" name="email" value="{{old('email')}}">
                </div>
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3 mt-5">
                    <span class="input-group-text" id="password"><img height="20" src="{{asset('icone/cadena.png')}}" alt="Cadena_icone"></span>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                </div>
                @error('password')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3 mt-5">
                    <span class="input-group-text" id="password_confirmation"><img height="20" src="{{asset('icone/cadena.png')}}" alt="Cadena_icone">+</span>
                    <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="password_confirmation">
                </div>
            </div>
            <div class="col-10 col-md-6 mx-auto text-start">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                    <label class="form-check-label" for="newsletter">
                        S'abonner à la newsletter
                    </label>
                </div>
            </div>
            <div class="col-10 col-md-6 mt-2 mx-auto text-start">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="cgv" required name="cgv">
                    <label class="form-check-label" for="cgv">
                        Accepter les <a style="color: orangered;" href="">CGV</a>
                    </label>
                </div>
            </div>
            <button class="btn btn-dark mt-4 mb-4" type="submit">Valider mon inscription</button>
        </form>
    </div>
</div>


@endsection

<style>
    form {
        background: rgba(0, 0, 0, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(13.5px);
        -webkit-backdrop-filter: blur(13.5px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .body {
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        height: 100vh;
        width: 100%;
        background: linear-gradient(to right, #82E0AA, #BDC3C7);
        z-index: 1;
    }
</style>