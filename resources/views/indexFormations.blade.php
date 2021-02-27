@extends('layouts.nav')

@section('content')

<script>
    var auth = <?php echo json_encode($auth); ?>
</script>

<div id="cours"></div>
<script src="/js/cours.js"></script>
@endsection