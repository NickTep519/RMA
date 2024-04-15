@php
    $type ??= 'text' ; 
    $name ??= '' ; 
    $label ??= '' ; 
    $value ??= ' ' ; 
    $class ??= '' ; 
@endphp


<div class="inputBox">
    <label for="{{$name}}"> {{$label}} </label>
        
    @if ($type=='textarea')
        <textarea name="{{$name}}" id="{{$name}}"  class="@error($name) is-invalid @enderror"> {{old($name, $value)}} </textarea>
    @else
        <input type="{{$type}}" id="{{$name}}" name="{{$name}}" class="{{$class}} @error($name) is-invalid @enderror" value="{{old($name, $value)}}" >
    @endif
    
    @error('{{$name}}')
        <div>
            {{$message}}
        </div>
    @enderror
</div>
