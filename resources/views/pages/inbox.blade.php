@extends('home')
@section('content')

<script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
<script>
    
    function getInboxDetails(id){
        $.get("{{ url('/inbox-details') }}/" + id, {}, function(data, status) {
            $("#imported-inbox-details").html(data);
            $('#exampleModalLabel').html($('#postingan_title').val());
            $("#exampleModal").show();
        });
    }
</script>
@endsection