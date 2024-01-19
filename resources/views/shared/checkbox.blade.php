@php
    $name ??='' ; 
    $value ??= ''; 
    $label ??= '' ; 
@endphp

<div>
    <input type="hidden" value="0" name="{{$name}}" >
    <input type="checkbox" @checked(old($name, $value ?? false)) value="1" id="{{$name}}" name="{{$name}}" class="form-check-inpit @error($name) is-invalid @enderror" role="switch" >
    <label for="{{$name}}" class="form-check-label" >{{$label}}</label>
    @error($name)
        <div class="invalid-feedback" >
            {{$message}}
        </div>    
    @enderror
</div>