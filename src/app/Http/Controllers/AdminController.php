<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Response;

class AdminController extends Controller
{

    //ページネーション設定
    public function index()
    {
        $contacts = Contact::paginate(7);
        return view('admin', compact('contacts'));
    }

    //エクスポート設定
    public function export(Request $request)
    {
        $contacts = Contact::all();
        $csvFileName = 'contacts.csv';

        return response()->streamDownload(function () use ($contacts) {
            $handle = fopen('php://output', 'w');
            //CSVヘッダー
            fputcsv($handle, ['名前', '性別', 'メールアドレス', 'お電話番号', '建物名', 'お問い合せの種類', 'お問い合せ内容']);
            //CSVの内容
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name,
                    $contact->first_name,
                    $contact->gender,
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category,
                    $contact->detail,
                ]);
            }
            fclose($handle);
        }, $csvFileName, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ]);
    }

    //モーダルウィンドウの削除設定
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id); //findOrFail一致するidが見つからなかった場合エラー
        $contact->delete();
        return redirect()->route('admin');
    }

    //検索機能
    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $input = $request->input;
        $contacts = Contact::where(function ($query) use ($input) {
            $query //部分一致
                ->where('first_name', 'LIKE', "%{$input}%")
                ->orWhere('last_name', 'LIKE', "%{$input}%") //orWhere複数の条件のうちいずれかに一致するレコードを取得
                ->orWhere('email', 'LIKE', "%{$input}%")
                ->orWhere('gender', 'LIKE', "%{$input}%")
                //->orWhere('data', 'LIKE', "%{$input}%")
                ->orWhereHas('category', function ($q) use ($input) {
                    $q->where('content', 'LIKE', "%{$input}%");
                });
        })
            ->orWhere(function ($query) use ($input) {
                $query //完全一致
                    ->where('first_name', $input)
                    ->orWhere('last_name', $input)
                    ->orWhere('email', $input);
            })
            ->paginate(7);

        $param = [
            'input' => $input,
            'contacts' => $contacts
        ];

        return view('admin', $param);
    }
}
