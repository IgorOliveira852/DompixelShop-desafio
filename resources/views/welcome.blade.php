<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Livewire CRUD Operation Example - Techsolutionstuff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Teste DompixelShop - Gerenciamento de Catálogo</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @livewire('products')
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
