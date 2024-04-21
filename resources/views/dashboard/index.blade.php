@extends('dashboard.layouts.template')
@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back, {{ auth()->user()->username }} !</h1>

 
</div>
<div>
  <h5>Hello this is dashboard</h5>
</div>

@can('DistributorCheck')

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('208228a228e1f81fec76', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('offer-submitted', function(data) {
    alert(JSON.stringify(data));
  });
</script>



@endcan
@endsection
