@props([
        'type' => 'text' , 'name' , 'value' => ''
])
<input
type="{{ $type ?? "text" }}"
name="{{ $name }}"
value="{{ old( $name , $value) }}"
{{ $attributes->class([
    'form-control',
    'is-invalid' => @$errors->has($name)
]) }}
>
@error($name)
    <div class="invalid-feedback">
    {{ $message }}
    </div>
@enderror
