<x-layout.app class="app">
    <h1>Blog</h1>

    @foreach($clientes as $cliente)
        <h1>{{cliente->Nombre}}</h1>
    @endforeach
</x-layout.app>