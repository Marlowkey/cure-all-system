@extends('layouts.app')
@section('content')

@include('components.main-content', ['featuredMedicines' => $featuredMedicines])

@endsection
