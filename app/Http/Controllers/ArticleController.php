<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Cart;
use App\Models\Favorite;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $query = Article::query();


    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }


    if ($request->filled('category') && $request->category != 'all_categ') {
        $query->where('category', $request->category);
    }


    $articles = $query->latest()->take(4)->get();


   $favorites = session()->get('favorites', []);
$favoriteIds = array_keys($favorites);

  $categoryCounts = [
        'Calculatoare si laptopuri' => Article::where('category', 'Calculatoare si laptopuri')->count(),
        'Materiale consumabile' => Article::where('category', 'Materiale consumabile')->count(),
        'Componente PC' => Article::where('category', 'Componente PC')->count(),
        'Imprimante si MFU' => Article::where('category', 'Imprimante si MFU')->count(),
        'Periferice PC' => Article::where('category', 'Periferice PC')->count(),
    ];

    return view('articles.index', compact(
        'articles',
        'favoriteIds',
        'categoryCounts'
    ));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
        return redirect()
    ->route('products', ['edit' => 1])
    ->with('success', 'Product saved successfully!');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect()->route('articles.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
         $favorites = session()->get('favorites', []);
$favoriteIds = array_keys($favorites);


return view('articles.index', compact('articles', 'favoriteIds'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
         return view('articles.edit', compact('article'));


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $article = Article::findOrFail($id);


    $article->update($request->all());


    return redirect()
        ->route('products')
        ->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $article = Article::findOrFail($id);
    $article->delete();


    return redirect()->route('articles.index');
}



public function addToFavorites($id)
{
    if (!auth()->check()) {
    return redirect('/index')
        ->with('error', 'You must login or register first to add items to cart.');
}
   $favorite = Favorite::where('user_id', auth()->id())
    ->where('article_id', $id)
    ->first();

if ($favorite) {
    $favorite->delete(); 
} else {
    Favorite::create([
        'user_id' => auth()->id(),
        'article_id' => $id
    ]);
}
return response()->json([
    'status' => 'ok'
]);
}



public function favorites()
{
   $articles = Article::whereIn('id', function ($query) {
    $query->select('article_id')
        ->from('favorites')
        ->where('user_id', auth()->id());
})->get();

return view('articles.favorites', compact('articles'));
}

public function remove($id)
{
    Article::destroy($id);

    return redirect()->back();
}


public function products(Request $request)
{
    $query = Article::query();

    $subcategoriesMap = [
        'Calculatoare si laptopuri' => [
            'All-in-one PC', 'Calculatoare', 'Laptopuri'
        ],
        'Materiale consumabile' => [
            'Cartușe compatibile','Cartușe originale','Cerneala compatibila','Cerneala originala','Hartie'
        ],
        'Componente PC' => [
            'Carcase','Memorie RAM','Placa de baza','Placi video','Procesoare','Coolere','Surse de alimentare','Unitati de stocare'
        ],
        'Imprimante si MFU' => [
            'Imprimante cu cerneala','Imprimante laser','MFU cu cerneala','MFU laser','Scanere'
        ],
        'Periferice PC' => [
            'Camere WEB','Casti si microfoane','Difuzoare','Mouse'
        ],
    ];


    $currentCategory = $request->category;
    $currentSubcategory = $request->subcategory;

    
    if ($request->filled('category')) {
        $query->where('category', $currentCategory);
    }

    if ($request->filled('subcategory')) {
        $query->where('subcategory', $currentSubcategory);
    }

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

 

    $favorites = session()->get('favorites', []);
    $favoriteIds = array_keys($favorites);

    $subcategories = $subcategoriesMap[$currentCategory] ?? [];


if ($request->filled('min_price')) {
    $query->where('price', '>=', $request->min_price);
}

if ($request->filled('max_price')) {
    $query->where('price', '<=', $request->max_price);
}

if ($request->filled('brands')) {
    $query->whereIn('brand', $request->brands);
}

$articles = $query->paginate(12)->withQueryString();

$brands = Article::when($currentCategory, function ($q) use ($currentCategory) {
        $q->where('category', $currentCategory);
    })
    ->select('brand')
    ->distinct()
    ->pluck('brand');

    
 return view('articles.products', compact(
        'articles',
        'favoriteIds',
        'brands',
        'subcategories',
        'currentCategory',
        'currentSubcategory'
    ));
}

}
