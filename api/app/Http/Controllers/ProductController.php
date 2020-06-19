<?php
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    function __construct(Product $product)
    {
        $this->product = $product;    
    }

    public function index()
    {
        return $this->product->with('images')->paginate(10);
    }

    public function show($product)
    {
        return $this->product->with('images')->findOrFail($product);
    }

    public function store(Request $request)
    {
        $this->product->create($request->all());

        return response()->json(['data' => ['message' => 'Produto criado com sucesso.']]);
    }

    public function update(Request $request, $product)
    {
        $product = $this->product->find($product);
        $product->update($request->all());

        return response()->json(['data' => [
                'message' => sprintf(
                    'Produto [%s](%s) atualizado com sucesso.',
                    $product->name,
                    $product->id 
                )
            ]
        ]);
    }

    public function destroy($product)
    {
        $product = $this->product->find($product);
        $product->delete();

        return response()->json(['data' => [
                'message' => sprintf(
                    'Produto [%s](%s) removido com sucesso.',
                    $product->name,
                    $product->id 
                )
            ]
        ]);
    }
}