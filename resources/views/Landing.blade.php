@extends('components/Base')
@section('title', 'Financial')
@section('content')
@extends('components/Navbar')

<!-- code non vérifier bloque la page -->
@if(!$user->code_verified)
<div class=" validator  text-center">
    <h2>Validation du compte</h2>
    <p>Pour pouvoir accéder à toutes les fonctionnalités, veuillez entrer le code de confirmation reçu par mail.</p>
    <div class="container">
        <form action="{{route('code_validate')}}" method="post">
            @csrf
            <div class="row">
                <div class="input-group mb-3 mt-5 col-6">
                    <span class="input-group-text" id="email">@</span>
                    <input type="number" class="form-control" placeholder="Entrer le code de validation" name="code"
                        value="{{old('email')}}">
                </div>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <button class="btn btn-dark" type="submit">Valider</button>
        </form>
    </div>
</div>
@endif
<!-- page débloquer -->

<div class="container my-4 text-center text-dark">
    <h2 style="color: orangered;" class="text-center">Welcome {{$user->name}} !</h2>
    <p>La gestion de portefeuille vous permet de simuler vos dépense et votre budget a nimporte quelle moment !</p>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12 col-md-6">

            <form action="{{route('Formulaire')}}" method="post" name="entrer_form" class="text-center text-dark">
                @csrf
                <h3> + Ajouter une <span class=" text-success">recette</span></h3>
                <select class="form-select" aria-label="entrer_name" name="entrer_name">
                    <option selected>Choisisser la categorie</option>
                    @foreach($options as $option)
                    <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <label for="entrer_tarif" class="form-label">Montant</label>
                    <input type="number" class="form-control" id="entrer_tarif" placeholder="250" min='0' max='10000'
                        name="entrer_tarif">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="entrer_date">Quelle date ?</label>
                    <input class="form-control" type="date" name="entrer_date" id="entrer_date">
                </div>
                <button class="btn btn-dark mt-3" type="submit" name="entrer_form">Ajouter</button>
            </form>
        </div>
        <div class="col-12 col-md-6">

            <form action="{{route('Formulaire')}}" method="post" class="text-center text-dark" name="facture_form">
                @csrf
                <h3> - Ajouter une <span class="text-danger">dépense</span></h3>
                <select class="form-select" aria-label="facture_name" name="facture_name">
                    <option selected>Choisisser une depense</option>
                    @foreach($options as $option)
                    <option value="{{$option}}">{{$option}}</option>
                    @endforeach
                </select>
                <div class="mt-3">
                    <label for="facture_tarif" class="form-label">Montant</label>
                    <input type="number" class="form-control" id="facture_tarif" placeholder="250" min='0' max='10000'
                        name="facture_tarif">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="facture_date">Quelle date ?</label>
                    <input class="form-control" type="date" name="facture_date" id="facture_date">
                </div>
                <button class="btn btn-dark mt-3" type="submit" name="facture_form">Ajouter</button>
            </form>
        </div>
    </div>
</div>

<div class="container text-center">
    @if($balance >= 0)
    <h2>Balance : <span class="text-success">{{$balance}}</span></h2>
    @else
    <h2>Balance : <span class="text-danger">{{$balance}}</span></h2>
    @endif
</div>

<!-- <a href="{{route('Budget')}}">Mon portefeuilles</a> -->

<div class="container">
    <div class="row">
        <div class="col-12 col-xl-6 my-5 text-center">
            <h3 style="color: orangered;">Recettes</h3>
            <table class="table table-success table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ligne_entrer as $entrer)
                    <tr>
                        <th scope="row">{{$entrer->entrer_date}}</th>
                        <td>{{$entrer->entrer_name}}</td>
                        <td>{{$entrer->entrer_tarif}} €</td>
                        <td><a class="text-decoration-none text-danger"
                                href="{{ route('Suppression', $entrer->id) }}">X</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ligne_entrer->links() }}
        </div>
        <div class="col-12 col-xl-6 text-center my-5">
            <h3 style="color: orangered;">Dépenses</h3>
            <table class="table table-danger table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Montant</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ligne_depense as $depense)
                    <tr>
                        <th scope="row">{{$depense->facture_date}}</th>
                        <td>{{$depense->facture_name}}</td>
                        <td>{{$depense->facture_tarif}} €</td>
                        <td><a class="text-decoration-none text-danger"
                                href="{{ route('Suppression2', $depense->id) }}">X</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ligne_depense->links() }}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 col-xl-6">
        <div class="container my-3">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
    <div class="col-12 col-xl-6">
        <div class="container my-3">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>



<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($facture_name) ?>,
        datasets: [{
            label: 'Toutes les dépenses',
            data: <?php echo json_encode($facture_tarif) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('myChart2');

new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($entrer_name) ?>,
        datasets: [{
            label: 'Toutes les recettes',
            data: <?php echo json_encode($entrer_tarif) ?>,
            backgroundColor: [
                'rgba(0, 0, 255, 0.2)',

            ],
            borderColor: [
                'rgba(0, 0, 255, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>



@endsection




<style>
.validator {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    height: 90vh;
    width: 100%;
    background: linear-gradient(to right, #82E0AA, #BDC3C7);
}

body {
    background: linear-gradient(to right, #82E0AA, #BDC3C7);
}
</style>