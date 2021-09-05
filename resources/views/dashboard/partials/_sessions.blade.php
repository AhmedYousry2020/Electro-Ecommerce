@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif

  

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif

   

@if (session('warning'))

<div class="alert alert-warning alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ session('warning') }}</strong>

</div>

@endif