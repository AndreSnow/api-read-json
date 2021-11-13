<?php

namespace Tests\Feature;

use App\Traits\Tests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilesTest extends TestCase
{

    use RefreshDatabase, Tests;
    protected $token;

    public function testListById()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('GET', '/api/simulation/plans',)
        ->assertOk();
    }

    public function testRegisterBenefisByPlan()
    {
        $this->artisanComands();
        $this->login();

        $this->withHeaders($this->headers($this->token))
        ->json('POST', '/api/simulation', [
                "codigo" => 1,
                "minimo_vidas" => 2,
                "dadosBenefs" => [
                    [
                        "nome" => "Claudio Martins",
                        "idade" => 34,
                    ],
                    [
                        "nome" => "André",
                        "idade" => 24,
                    ]
                ]
        ])
        ->assertOk();
    }
}