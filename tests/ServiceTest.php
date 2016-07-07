<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use GdaDesenv\AdminService\Entities\Service;

class ServiceTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_domain()
    {
        Service::create([
            'icone' => 'fa-icon',
            'nome' => 'Service Test',
            'descricao' => 'Service Description Test'
        ]);

        $this->seeInDatabase('services',['nome' => 'Service Test']);
    }

    public function test_creating_domain_using_form_with_errors()
    {
        \App\Entities\User::create([
            'name' => 'Admin Test',
            'login' => 'admin_test',
            'email' => 'admintest@admintest.com',
            'password' => bcrypt(12345678)
        ]);

        $this->visit('/')
            ->see('Efetuar Login')
            ->type('admin_test','login')
            ->type('12345678','password')
            ->press('Efetuar Login')
            ->dontSee('Login ou Password incorreto');

        $this->visit('/service/form')
            ->type('','icone')
            ->type('','nome')
            ->type('','descricao')
            ->press('Salvar Alterações')
            ->see('O campo icone é obrigatório.')
            ->see('O campo nome é obrigatório.')
            ->see('O campo descricao é obrigatório.');
    }

    public function test_creating_domain_using_form()
    {
        \App\Entities\User::create([
            'name' => 'Admin Test',
            'login' => 'admin_test',
            'email' => 'admintest@admintest.com',
            'password' => bcrypt(12345678)
        ]);

        $this->visit('/')
            ->see('Efetuar Login')
            ->type('admin_test','login')
            ->type('12345678','password')
            ->press('Efetuar Login')
            ->dontSee('Login ou Password incorreto');

        $this->visit('/service/form')
            ->type('fa-icon','icone')
            ->type('Service Test','nome')
            ->type('Service Description Test','descricao')
            ->press('Salvar Alterações');

        $this->seeInDatabase('services',['nome' => 'Service Test']);
    }

    public function test_updating_domain_using_form()
    {
        \App\Entities\User::create([
            'name' => 'Admin Test',
            'login' => 'admin_test',
            'email' => 'admintest@admintest.com',
            'password' => bcrypt(12345678)
        ]);

        $this->visit('/')
            ->see('Efetuar Login')
            ->type('admin_test','login')
            ->type('12345678','password')
            ->press('Efetuar Login')
            ->dontSee('Login ou Password incorreto');

        $service = Service::create([
            'icone' => 'fa-icon',
            'nome' => 'Service Test',
            'descricao' => 'Service Description Test'
        ]);

        $this->visit('/service/edit/'.$service->id)
            ->type('','icone')
            ->type('','nome')
            ->type('','descricao')
            ->press('Salvar Alterações')
            ->see('O campo icone é obrigatório.')
            ->see('O campo nome é obrigatório.')
            ->see('O campo descricao é obrigatório.');

        $this->visit('/service/edit/'.$service->id)
            ->type('fa-icon','icone')
            ->type('Service 2 Test','nome')
            ->type('Service Description Test','descricao')
            ->press('Salvar Alterações');

        $this->seeInDatabase('services',['nome' => 'Service 2 Test']);
    }

    public function test_deleting_client_using_form()
    {
        \App\Entities\User::create([
            'name' => 'Admin Test',
            'login' => 'admin_test',
            'email' => 'admintest@admintest.com',
            'password' => bcrypt(12345678)
        ]);

        $this->visit('/')
            ->see('Efetuar Login')
            ->type('admin_test','login')
            ->type('12345678','password')
            ->press('Efetuar Login')
            ->dontSee('Login ou Password incorreto');

        $service = Service::create([
            'icone' => 'fa-icon',
            'nome' => 'Service Test',
            'descricao' => 'Service Description Test'
        ]);

        $this->visit('/service/edit/'.$service->id)
            ->click('Remover Serviço')
            ->see('Serviço removido com sucesso!');

        $this->dontSeeInDatabase('services', ['nome' => 'Service Test']);
    }
}