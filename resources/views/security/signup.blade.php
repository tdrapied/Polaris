@extends('security.form')

@section('title', 'Créez-vous un compte')

@section('btn_text', 'S\'inscrire')

@section('ahref')
    Déjà inscrit ?
    <a href="{{ route('security_login') }}">Cliquer ici </a>
@endsection