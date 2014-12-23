@extends('layouts.main')

@section('content')

	{{ $usuario->empresa()->first()->razao_social }}

@stop