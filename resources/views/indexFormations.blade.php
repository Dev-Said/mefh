@extends('layouts.nav')

@section('content')


   
<div id="cours"></div>
 <!-- l'$id est fourni dans la route -->
<script> var idFormation = "{{ $id }}" </script>
<script src="/js/cours.js"></script>

@endsection