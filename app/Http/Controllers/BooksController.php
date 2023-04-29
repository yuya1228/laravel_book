<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use InterventionImage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = Book::paginate(8);
        // 検索機能
        $keyword = $request->input('keyword');
        $categories = $request->input('category');
        // booksテーブルとcategoriesテーブルの内部結合
        $query = Book::query();
        $query->join('categories', 'books.category_id', 'categories.id')->get();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        if (!empty($categories)) {
            $query->where('category_id', 'LIKE', $categories);
        }

        // ページネート+joinで結合したデータの取得
        $items = $query->paginate(3);
        // ここまで

        $categories = Category::all();
        $books = Book::all();;

        // 現在、ログインしているユーザーの取得
        $user = Auth::user();

        return view('books.index', compact('books', 'categories', 'keyword', 'items', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 新規登録処理
    public function store(BookRequest $request)
    {
        $image = $request->file('image');
        $img = $image->storeAs('', $image->getClientOriginalName(), 'public');

        Book::create([
            'name' => $request->name,
            'image' => $img,
            'text' => $request->text,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.create')->with('message', '登録しました。');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 更新ページ
        $books = Book::find($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 更新機能
        $books = Book::find($id);
        $books->update([
            'image' => $request->image,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'text' => $request->text,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 削除機能
        $books = Book::find($id);
        $books->delete();

        return redirect()->route('books.index', compact('books'));
    }
}
