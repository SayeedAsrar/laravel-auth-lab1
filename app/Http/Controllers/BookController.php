<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        // گرفتن کتاب‌های کاربر لاگین شده (جدیدترین‌ها اول)
        $books = Book::where('user_id', Auth::id())->latest()->get();
        
        return view('dashboard', compact('books'));
    }

    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها طبق خواسته استاد
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'pages' => 'required|integer|min:1|max:10000',
        ]);

        // گرفتن آیدی کاربر و ذخیره کتاب
        $validated['user_id'] = Auth::id();
        Book::create($validated);

        // برگشت به داشبورد با پیام موفقیت
        return redirect()->route('dashboard')->with('success', 'Book added successfully!');
    }
}
