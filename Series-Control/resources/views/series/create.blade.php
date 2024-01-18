<x-layout title="Nova Série">
    <form action={{ route('series.store') }} method="post">
        @csrf
        <div class="mb-3">

            <label class="form-label" for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <div class="position-relative">

        <button type="submit" class="btn btn-primary position-absolute top-0 start-50">Adicionar</button>
        </div>
    </form>
</x-layout>
