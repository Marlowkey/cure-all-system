@extends('layouts.guest')
@section('content')
@include('components.main-content', ['featuredMedicines' => $featuredMedicines])
@endsection
