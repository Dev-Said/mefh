@extends('layouts.nav')

@section('content')


   
<div id="cours" style="background-color: #ffffff;"></div>
<script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
 <!-- l'$id est fourni dans la route -->
<script> var idFormation = "{{ $id }}" </script>
<script src="/js/cours.js"></script>

@endsection