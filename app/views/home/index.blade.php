@extends('layouts.main')

@section('content')

	<p>{{ $usuario->nome }}</p>
	<p>{{ $usuario->empresa->razao_social }}</p>

@stop