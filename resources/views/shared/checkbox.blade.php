@php
    $name ??='' ; 
    $value ??= ''; 
    $label ??= '' ; 
@endphp

<div>
    <label for="{{$name}}" >{{$label}}</label>
    <input type="hidden" value="0" name="{{$name}}" >
    <input type="checkbox" @checked(old($name, $value ?? false)) value="1" id="{{$name}}" name="{{$name}}" class="form-check-inpit @error($name) is-invalid @enderror" role="switch" >
    @error($name)
        <div class="invalid-feedback" >
            {{$message}}
        </div>    
    @enderror
</div>