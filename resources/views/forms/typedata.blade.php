<div class="form-group">
    <select class="choices form-select" name="{{ $name }}">
        @foreach (\App\Models\TypeForm::all() as $td)
            <option value="{{ $td->type_name }}" style="text-transform: capitalize">{{ $td->type_name }}</option>
        @endforeach
    </select>
</div>