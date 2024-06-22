<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $categoryRepository;


    public function __construct(
        CategoryRepository $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $category = $this->categoryRepository->getPaginatedList($request);
        return view('admin.pages.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = $this->categoryRepository->all();
        return view('admin.pages.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        //
        $data = $request->all();
        try {
            DB::beginTransaction();
            $news = $this->categoryRepository->store($data);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            DB::commit();
            session()->flash('success', 'Category has been created successfully.');
            return redirect()->route('category.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = $this->categoryRepository->findOrFail($id);
        $category = $this->categoryRepository->all();
        return view('admin.pages.category.edit', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $data = $request->all();
            DB::beginTransaction();
            $news = $this->categoryRepository->update($id, $data);
            if (!$news) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            DB::commit();
            session()->flash('success', 'Category has been updated successfully.');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $news = $this->categoryRepository->delete($id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Category has been deleted successfully.');
            return redirect()->route('category.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function updateCategory(Request $request, string $id)
    {
        try {
            // Check if the request is an AJAX request
            if ($request->ajax()) {
                // Validate the request data
                $request->validate([
                    'attribute' => 'required|string',
                    'checked' => 'required|boolean',
                ]);

                // Extract the attribute and checked values from the request
                $attribute = $request->input('attribute');
                $checked = $request->input('checked');

                // Update the specified resource
                DB::beginTransaction();
                $news = $this->categoryRepository->update($id, [$attribute => $checked]);
                if (!$news) {
                    return response()->json(['error' => 'Oops! Something went wrong.'], 500);
                }
                DB::commit();

                return response()->json(['success' => 'Resource updated successfully.']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('danger', 'Oops! Something went wrong. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function updateOrder(Request $request)
    {
        if ($request->ajax()) {
        $id = $request->input('id');
        $newOrder = $request->input('order');
    
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            if ($category) {
                $currentOrder = $category->order;
    
                // Update the order of the category
                $category->order = $newOrder;
                $category->save();
    
                // Adjust the orders of other categories
                if ($newOrder < $currentOrder) {
                    Category::where('order', '>=', $newOrder)
                            ->where('order', '<', $currentOrder)
                            ->where('id', '!=', $id)
                            ->increment('order');
                } elseif ($newOrder > $currentOrder) {
                    Category::where('order', '<=', $newOrder)
                            ->where('order', '>', $currentOrder)
                            ->where('id', '!=', $id)
                            ->decrement('order');
                }
            }
            DB::commit();
            return response()->json(['message' => 'Order updated successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Oops! Something went wrong. ' . $e->getMessage()], 500);
        }
    }
    }
    
}
