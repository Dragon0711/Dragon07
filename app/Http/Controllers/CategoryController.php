<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    /**
     * @var CategoryInterface
     */
    private $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {

//        $this->middleware('auth:admin');

        $this->categoryInterface = $categoryInterface;
    }

    public function AllCat()
    {
//        dd(Auth::user());
        $this->authorize('viewAll',Category::class);


//        abort_if(Gate::denies('show_categories'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->categoryInterface->AllCat();
    }

    public function AddCat(Request $request)
    {
        $this->authorize('create',Category::class);

        return $this->categoryInterface->AddCat($request);
    }

    public function EditCat(Request $request)
    {
        $this->authorize('edit',Category::class);

        return $this->categoryInterface->EditCat($request);
    }

    public function deleteCat(Request $request)
    {
        $this->authorize('delete',Category::class);

        return $this->categoryInterface->deleteCat($request);
    }

    public function updateCat(Request $request)
    {
        $this->authorize('update',Category::class);

        return $this->categoryInterface->updateCat($request);
    }
}
