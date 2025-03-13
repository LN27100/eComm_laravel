@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>Connexion</h1>
    
    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-input" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-input" required>
        </div>

        <button type="submit" class="submit-button">Se connecter</button>
    </form>
</div>
@endsection
