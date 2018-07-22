<?php

namespace Tests\JsonTest;

use App\Requests\CreateCurrencyRequest;
use App\Services\CurrencyServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Entity\{Wallet,User};

class JsonTest extends TestCase
{
    private $user1;
    private $user2;
    private $wallet1;
    private $wallet2;

    const ENDPOINT = '/api/v1/wallet';

    use RefreshDatabase;

    private $currencyService;

    protected function setUp()
    {
        parent::setUp();

        $this->user1 = factory(User::class)->create();
        $this->user2 = factory(User::class)->create();
        $this->wallet1 = factory(Wallet::class)->create(['user_id' => $this->user2->id]);
        $this->wallet2 = factory(Wallet::class)->create(['user_id' => $this->user1->id]);

        $this->currencyService = $this->app->make(CurrencyServiceInterface::class);
    }

    public function test_json_get_all_sorting()
    {
        $response = $this->get(self::ENDPOINT.'?sort=user_id')
            ->header('Content-Type','application/vnd.api+json');
        print_r($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getContent(),true);
        $this->assertArrayHasKey('data', $data);
        $this->assertEquals('wallet', $data['data'][0]['type']);
        $this->assertEquals($this->wallet2->id, $data['data'][0]['id']);
    }
}