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
        $contacts = Contact::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin', compact('categories', 'contacts'));
    }
}
