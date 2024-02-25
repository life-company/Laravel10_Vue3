<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\UpStoreUserRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $client = Client::register($request->all());
        return response()->noContent();
    }

    /**
     * 既存のクライアント情報を更新します。
     *
     * このメソッドは、HTTPリクエストを受け取り、指定されたクライアントIDに基づいてクライアント情報を更新します。
     * 更新に成功した場合は204 No Contentレスポンスを返し、クライアントが見つからない場合は404 Not Foundレスポンスを返します。
     *
     * @param  \Illuminate\Http\Request  $request  HTTPリクエストインスタンス。更新するクライアント情報とそのIDが含まれます。
     * @return \Illuminate\Http\Response 更新成功時には204 No Contentレスポンス、クライアントが見つからない場合は404 Not Foundレスポンスを返します。
     */
    public function update(UpStoreUserRequest $request)
    {
        // クライアントモデルのインスタンスを取得
        $client = Client::find($request->id);
        if (!$client) {
            // クライアントが見つからない場合の処理
            return response()->json(['error' => 'Client not found.'], 404);
        }
        // インスタンスメソッドとしてupdateClientを呼び出し
        $client->updateClient($request->all());

        return response()->noContent();
    }

    /**
     * 指定されたクライアントを削除します。
     *
     * クライアントIDに基づいて特定のクライアント情報を削除します。
     * クライアントが存在しない場合は、404 Not Foundレスポンスを返します。
     *
     * @param  string  $id  削除するクライアントのID。
     * @return \Illuminate\Http\Response クライアント削除成功時には204 No Contentレスポンスを返します。
     */
    public function destroy(string $id)
    {
        try {
            $client = Client::findOrFail($id); // クライアントが存在しない場合はModelNotFoundExceptionが投げられる
            $client->delete(); // クライアントを削除
            return response()->noContent(); // 204 No Contentレスポンスを返す
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Client not found.'], 404); // クライアントが見つからない場合は404 Not Foundレスポンスを返す
        }
    }
}
