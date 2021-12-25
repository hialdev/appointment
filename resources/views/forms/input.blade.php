<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ ($value)?:'' }}" required>
</div>