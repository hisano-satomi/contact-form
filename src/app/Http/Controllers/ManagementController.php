<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class ManagementController extends Controller
{
    // public function __construct()
    // {
    //     // admin, export メソッドにのみ認証を必要とする
    //     $this->middleware('auth')->only(['index', 'export']);
    // }

    // 登録フォーム表示
    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

    // // ユーザー登録処理
    // public function register(UserRequest $request)
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     Auth::login($user);
    //     return redirect()->route('admin');
        
    // }

    // ログインフォーム表示
    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }

    // ログイン処理
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('admin'));
    //     }

    //     return back()->withErrors([
    //         'email' => 'メールアドレスまたはパスワードが正しくありません。',
    //     ])->withInput();
    // }

    // ログアウト処理
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/login');
    // }

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
    
    public function export() 
    {
        $contacts = Contact::with('category')->get();
        
        $csvHeader = [
            'お名前（姓）',
            'お名前（名）',
            '性別',
            'メールアドレス',
            'お問い合わせの種類',
            '登録日時'
        ];
        
        $csvData = [];
        foreach ($contacts as $contact) {
            $gender = '';
            switch ($contact->gender) {
                case 1:
                    $gender = '男性';
                    break;
                case 2:
                    $gender = '女性';
                    break;
                case 3:
                    $gender = 'その他';
                    break;
            }
            
            $csvData[] = [
                $contact->last_name,
                $contact->first_name,
                $gender,
                $contact->email,
                $contact->category->content ?? '',
                $contact->created_at->format('Y-m-d H:i:s')
            ];
        }
        
        $callback = function() use ($csvHeader, $csvData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);
            
            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }
            
            fclose($file);
        };
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts_' . date('YmdHis') . '.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];
        
        return response()->stream($callback, 200, $headers);
    }
}


