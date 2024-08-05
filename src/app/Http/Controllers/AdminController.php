<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Category;
use App\Models\User;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7);
        return view('admin', compact('contacts'));
    }

    public function export()
    {
        $contacts = Contact::all();
        $csvFileName = 'contacts.csv';
        $handle = fopen('php://output', 'w');

        // CSVのヘッダーを設定
        fputcsv($handle, ['First Name', 'Last Name', 'Email', 'Tell', 'Address', 'Building', 'Category', 'Detail']);

        // データをCSVに書き込む
        foreach ($contacts as $contact) {
            fputcsv($handle, [
                $contact->first_name,
                $contact->last_name,
                $contact->email,
                $contact->tell,
                $contact->address,
                $contact->building,
                $contact->category->name,
                $contact->detail,
            ]);
        }
        //CSVヘッダーを設定
        fclose($handle);
        return response()->streamDownload(function() use ($handle) {
            fpassthru($handle);
        }, $csvFileName, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ]);
    }
}

