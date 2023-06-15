<x-layout title="Séries">
    <section>
        <div
            class="row text-center align-items-center justify-content-center"
            style="max-width: 400px"
        >
            <div class="col-6">
                {{-- Link to create page --}}
                <a class="btn btn-dark mb-3" href="{{ route('series.create') }}"
                    >Create a new serie</a
                >
            </div>
            <form
                class="col-6"
                action="{{ route('series.enrase') }}"
                method="POST"
            >
                {{-- Delete all Button --}}
                @csrf
                <button class="btn btn-dark mb-3" type="submit">
                    Erase all
                </button>
            </form>
        </div>

        {{-- Status Flash Message --}}
        <div class="row">
            @if (isset($status))
            <div class="alert alert-success">
                {{ $status }}
            </div>
            @endif
        </div>
        {{-- END Status Flash Message --}}

        <ul class="list-group">
            @foreach ($series as $serie)
            <li
                class="list-group-item d-flex justify-content-between align-items-center"
            >
                {{ $serie->nome }}

                <div class="d-flex gap-2">
                    <a
                        class="btn btn-dark"
                        href="{{ route('series.edit', $serie->id) }}"
                    >
                        <img
                            style="max-width: 20px"
                            class="img-fluid"
                            src="{{ asset('/assets/edit_icon.png') }}"
                            alt=""
                        />
                    </a>

                    <form
                        action="{{ route('series.destroy', $serie) }}"
                        method="POST"
                    >
                        {{-- Delete Button --}}
                        @csrf @method('DELETE')
                        <button class="btn btn-dark" type="submit">X</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </section>
</x-layout>
