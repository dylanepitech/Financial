@extends('components/Base')
@section('title', 'Financial')
@section('content')
@extends('components/Navbar')

<div class="container text-center my-3">
    <h2 style="color:orangered;">Vous avez aucun portefeuille</h2>
</div>

<form action="" class="text-center my-5">
    <h3>J'aurais besoin de quelques informations...</h3>

    <div class="row">
        <h3>Vos revenus</h3>
        <div class="col-10 col-md-10 mx-auto text-start">
            <div class="mb-3">
                <label for="salaire_principal" class="form-label">Qu'elle est votre métier ?</label>
                <input type="text" class="form-control" id="salaire" name="salaire_principal">
            </div>
        </div>
        <div class="col-10 col-md-10 mx-auto text-start">
            <div class="mb-3">
                <label for="salaire_autre" class="form-label"></label>
                <input type="text" class="form-control" id="autre" name="salaire_autre">
            </div>
        </div>
    </div>
</form>

@endsection
<style>
    body {
        background: linear-gradient(to right, #82E0AA, #BDC3C7);
    }
</style>