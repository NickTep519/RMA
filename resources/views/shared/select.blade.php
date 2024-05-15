@php
    $name ??= '' ; 
    $label ??= '' ; 
    $values ??= '' ; 
    $class ??= '' ; 
@endphp

<div @class(['inputBox', $class])>
    <label for="{{$name}}">{{$label}}</label>
    <select id="{{$name}}" name="{{$name}}" >
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