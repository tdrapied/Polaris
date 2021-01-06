@extends('security.form')

@section('title', 'Connectez-vous')

@section('btn_text', 'Connection')

@section('ahref')
    Nouveau membre ?
    <a href="{{ route('security_signup') }}">Cliquer ici </a>
@endsection