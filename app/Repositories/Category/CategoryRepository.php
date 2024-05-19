<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository extends Repository
{

    /**
     * CategoryRepository constructor.
     * @param Category $Category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type = null, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
