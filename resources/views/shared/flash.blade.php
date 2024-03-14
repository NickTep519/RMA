
@if (session('error'))
    <div class="flash-message error">
        <p>{{session('error')}}</p>
    </div>
@endif

@if (session('success'))
    <div class="flash-message success">
        <p> {{session('success')}} </p>
    </div>  
@endif

