<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_post',
        'client_address',
        'client_url',
        'client_person',
        'client_person_phone',
        'client_memo',
    ];

    /**
     * 全てのクライアント情報を取得する
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllClients()
    {
        return self::all();
    }

    public static function register(array $data)
    {
        return self::create([
            'client_name' => $data['client_name'],
            'client_post' => $data['client_post'],
            'client_address' => $data['client_address'],
            'client_url' => $data['client_url'],
            'client_person' => $data['client_person'],
            'client_person_phone' => $data['client_person_phone'],
            'client_memo' => $data['client_memo'],
        ]);
    }

    /**
     * クライアント情報を更新する。
     *
     * @param  array $data 更新するデータ
     * @param  int   $id   更新するクライアントのID
     * @return Client      更新されたクライアントモデル
     */
    public function updateClient(array $data)
    {
        $client = $this->find($data['id']);
        if (!$client) {
            // クライアントが見つからない場合の処理
            return null;
        }

        $client->update([
            'client_name' => $data['client_name'],
            'client_post' => $data['client_post'],
            'client_address' => $data['client_address'],
            'client_url' => $data['client_url'],
            'client_person' => $data['client_person'],
            'client_person_phone' => $data['client_person_phone'],
            'client_memo' => $data['client_memo'],
        ]);

        return $client;
    }
}
