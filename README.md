# GDA Admin - Service

## Instruções

Esse pacote é para adicionar a função Domain(Domínios) na aplicação GDA Admin

## Instalação

composer require gdadesenv/adminservice

Adicione o seguinte service provider em seu arquivo config/app.php:

```php
'providers' => [
    //...
    GdaDesenv\AdminService\Providers\GdaServiceServiceProvider::class
]
```

Adicione o seguinte código ao arquivo resources/views/sidebar.blade.php:

```php
<li class="{{ setActiveMenu('service') }}">
  <a href="{{route('services')}}">
    <i class="fa fa-gear"></i> <span>Serviços</span>
  </a>
</li>
```

Rode o seguinte comando no artisan:

```bash
php artisan vendor:publish
```

Rode as migrações

```bash
php artisan migration
```
