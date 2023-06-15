<x-layout title="Editar Série '{{ $serie->nome }}'">
    <section>
        <x-form
            :action="route('series.update', $serie->id)"
            :nome="$serie->nome"
        >
        </x-form>
    </section>
</x-layout>
