@extends('components/Base')
@section('title', 'Financial')
@section('content')
@extends('components/Navbar')

<div class="body">
    <div class="container text-center mt-5">
        <form action="{{route('Information.modification')}}" method="post" class="text-center">
            <img class="my-2" height="90" src="{{asset('images/formulaire.png')}}" alt="Personnage_icone">
            <h2 class="my-2">Modification des informations</h2>
            @csrf
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" class="form-control" aria-label="Username" aria-describedby="basic-addon1"
                        value="{{$user->email}}" name="email">
                </div>
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img height="24"
                            src="{{asset('images/personnage.png')}}" alt="Icone_cadena"></span>
                    <input type="text" class="form-control" aria-label="name" aria-describedby="basic-addon1"
                        value="{{$user->name}}" name="name">
                </div>
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img src="{{asset('icone/cadena.png')}}"
                            alt="Icone_cadena"></span>
                    <input type="text" class="form-control" aria-label="password" aria-describedby="basic-addon1"
                        name="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class="col-10 col-md-6 mx-auto">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><img src="{{asset('icone/cadena.png')}}"
                            alt="Icone_cadena"></span>
                    <input type="text" class="form-control" aria-label="password_confirmation"
                        aria-describedby="basic-addon1" name="password_confirmation"
                        placeholder="Confirmation du mot de passe">
                </div>
            </div>
            <div class="col-10 col-md-6 mx-auto text-start">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter"
                        {{$user->Newsletter ? 'checked' : ""}} <label class="form-check-label" for="newsletter">
                    S'abonner à la newsletter
                    </label>
                </div>
            </div>
            <button class="btn btn-dark mt-4 mb-4" type="submit">Modifier mes informations</button>
        </form>
    </div>
</div>

@endsection
<style>
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

form {
    background: rgba(0, 0, 0, 0.2);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(13.5px);
    -webkit-backdrop-filter: blur(13.5px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
}
</style>