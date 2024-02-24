<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // 例外ハンドリングを無効化
        $this->withoutExceptionHandling();
    }


    /**
     * クライアント一覧正常系テスト
     * @test
     * @return 200
     */
    public function test_clients_list_success()
    {
        // テスト用のユーザーを作成
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/clients/list');
        $response->assertStatus(200);
    }

    /**
     * クライアント新規登録正常系テスト
     * @test
     * @return 204
     */
    public function test_clients_new_insert_success()
    {
        $user = User::factory()->create();
        $formData = [
            'client_name' => '自動テストクライアント',
            'client_post' => '123-4567',
            'client_address' => 'テスト住所',
            'client_url' => 'http://exsample.com',
            'client_person' => 'テスト担当者',
            'client_person_phone' => '090-1234-5678',
            'client_memo' => 'テストメモ',
        ];

        $response = $this->actingAs($user)->postJson('/api/clients/create', $formData);
        $response->assertStatus(204);
        $this->assertDatabaseHas('clients', [
            'client_name' => '自動テストクライアント',
            'client_post' => '123-4567',
            'client_address' => 'テスト住所',
            'client_url' => 'http://exsample.com',
            'client_person' => 'テスト担当者',
            'client_person_phone' => '090-1234-5678',
            'client_memo' => 'テストメモ',
        ]);
    }
}
