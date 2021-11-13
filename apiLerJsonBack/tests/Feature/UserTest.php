<?php

namespace Tests\Feature;

use App\Traits\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase, Tests;
    protected $token;

    public function testCreate()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('POST', '/api/users', [
            'name' => 'Andre Snow',
            'email' => 'andre@teste1.com',
            'password' => '12345678',
        ])
        ->assertJson([
            'msg' => "Usuário cadastrado!",
            ])
        ->assertStatus(201);

        $this->assertDatabaseHas(
            'users',
            ['email' => 'andre@teste1.com']
        );
    }

    public function testListById()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('GET', '/api/users/1', [
            'email' => 'andre@teste1.com',
            'password' => '12345678',
        ])
        ->assertOk();
    }

    public function testListAll()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))->json('GET', '/api/users', [
            'email' => 'andre@teste.com',
            'password' => '12345678',
        ])
        ->assertOk();
    }
    
    public function testUpdate()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('PUT', '/api/users/1', [
            'name' => 'Andre Neves',
            'email' => 'andre@teste2.com',
            'password' => '12345678',
        ])
        ->assertJson([
            'msg' => "Cadastro atualizado!",
            ])
        ->assertOk();
    }

    public function testLogout()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('POST', '/api/users/logout', [
            'email' => 'andre@teste2.com',
            'password' => '12345678',
        ])
        ->assertOk();
    }
    
    public function testDelete()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('DELETE', '/api/users/1')
        ->assertJson([
            'msg' => "Cadastro removido!",
        ])
        ->assertOk()
        ->assertJsonMissing([
            'name' => 'Andre Neves',
        ]);
    }
}
