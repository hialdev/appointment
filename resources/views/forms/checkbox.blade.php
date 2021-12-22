<div class="form-check">
    <div class="checkbox">
        <input type="checkbox" id="{{ $name }}" name="{{ $name }}" class="form-check-input"
            {{ ($check == 'on')?'checked':'' }}>
        <label for="{{ $name }}">Touch me!</label>
    </div>
</div>