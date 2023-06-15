<form action="{{ $action }}" method="POST">
    @csrf @isset($nome) @method('PUT') @endisset

    <div class="mb-3">
        <input
            type="text"
            name="nome"
            class="form-control"
            placeholder="name"
            @isset($nome)
            value="{{ $nome }}"
            @endisset
        />
    </div>

    <button type="submit" class="btn btn-dark">
        @if (@isset($nome)) Update @else Create @endif
    </button>
</form>
