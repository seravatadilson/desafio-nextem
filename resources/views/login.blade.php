@extends('layouts.layout')

@section('content')
<div class="conteudo">

    <div class="card" style="width: 24rem;">

        <div class="card-body">
        <form class="form-signin" action="{{ route('user.login') }}" method="POST">
            @csrf
                            
                <h1 class="h3 mb-3 font-weight-normal"> Realizar login!</h1>

                    <div class="form-group">
                        <label for="inputEmail" class="sr-only"> Email </label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                    </div>     

                <button class="btn btn-lg btn-primary btn-block" type="submit"> Entrar </button>
                <p class="mt-3 md-3 text-muted center">©2019</p>

            </form>
        </div>
    </div>

</div>
@endsection