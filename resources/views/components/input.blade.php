<input name="{{ $name }}" value="{{ old($name) }}"
    {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>
@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror