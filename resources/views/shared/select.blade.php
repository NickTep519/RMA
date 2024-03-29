@php
    $name ??= '' ; 
    $label ??= '' ; 
    $values ??= '' ; 
@endphp

<div>
    <label for="{{$name}}">{{$label}}</label>
    <select id="{{$name}}" @if($name != 'city') name="{{$name}}[]" multiple @else name="{{$name}}" @endif>
@foreach ($values as $k => $v)
        <option  @if($value->contains($k)) selected @endif value="{{$k}}"> {{$v}} </option>    
@endforeach
    </select>

@error('{{$name}}')
    <div class="invalid-feedback">
        {{$message}}
    </div>    
@enderror
</div>