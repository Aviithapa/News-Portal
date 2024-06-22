<?php

namespace App\Repositories\Ads;

use App\Models\Ad;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdRepository extends Repository
{

    /**
     * AdRepository constructor.
     * @param Ad $ads
     */
    public function __construct(Ad $ads)
    {
        parent::__construct($ads);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }

}
