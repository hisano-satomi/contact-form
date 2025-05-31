<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Contact::with('category')->orderBy('created_at', 'desc');

        // 名前・メール 部分一致＋完全一致の両方で検索
        if ($request->filled('name')) {
            $query->where(function($q) use ($request) {
                $q->where('last_name', $request->name)
                  ->orWhere('first_name', $request->name)
                  ->orWhere('email', $request->name)
                  ->orWhere('last_name', 'like', "%{$request->name}%")
                  ->orWhere('first_name', 'like', "%{$request->name}%")
                  ->orWhere('email', 'like', "%{$request->name}%");
            });
        }
        // 性別
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
        // カテゴリ
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        // 日付（fromのみ・完全一致）
        if ($request->filled('from')) {
            $query->whereDate('created_at', $request->from);
        }
        $contacts = $query->paginate(7)->appends($request->query());
        return view('admin', compact('categories', 'contacts'));
    }
}
