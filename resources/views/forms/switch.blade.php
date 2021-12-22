<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="{{ $name }}" name="{{ $name }}" {{ ($select == 'on')?'selected':'' }}>
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
</div>