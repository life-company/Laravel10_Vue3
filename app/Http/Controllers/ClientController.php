<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\UpStoreUserRequest;

class ClientController extends Controller
{
    /**
     * 全てのクライアントデータを取得してJSON形式で返す。
     *
     * このメソッドは、データベースから全クライアントの情報を取得し、
     * それらをJSON形式でレスポンスとして返します。各クライアント情報は、
     * `clients` キーの下に配列として格納されます。
     *
     * @return \Illuminate\Http\JsonResponse
     *         クライアント情報のコレクションを含むJSONレスポンス。
     */
    public function index()
    {
        $clients = Client::getAllClients();
        return response()->json(['clients' => $clients]);
    }

    /**
     * 新しいクライアントを登録します。
     *
     * このメソッドは、HTTPリクエストを受け取り、クライアント情報を登録した後、
     * 成功レスポンスを返します。
     *
     * @param  \Illuminate\Http\Request  $request  HTTPリクエストインスタンス。クライアント情報が含まれます。
     * @return \Illuminate\Http\Response 登録成功時には204 No Contentレスポンスを返します。
     */
    public function store(UpStoreUserRequest $request)
    {
        // リクエストデータを配列として渡す
        $client = Client::register($request->all());
        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpStoreUserRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
