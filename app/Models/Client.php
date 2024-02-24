<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    // 新しいクライアントを登録するメソッド
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
}
