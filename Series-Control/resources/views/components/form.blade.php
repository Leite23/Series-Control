<x-layout title="">
    <form action={{ $action }} method="post">

        @csrf
        @if($update)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text"
            id="nome"
            name="nome"
            class="form-control"
            @isset($nome) value="{{ $nome }}" @endisset>
        </div>

        <div class="position-relative">
        <button type="submit" class="btn btn-primary position-absolute top-0 start-50">Adicionar</button>
        </div>
    </form>
</x-layout>
