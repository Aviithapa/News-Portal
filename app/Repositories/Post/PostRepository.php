<?php

namespace App\Repositories\Post;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends Repository
{

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
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
            ->filter(new PostFilter($request))
            ->latest()
            ->paginate($limit);
    }

        /**
     * Get recent posts with pagination.
     *
     * @param Request $request
     * @param int $limit
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getRecentPosts( int $limit = 10, array $columns = array('*')): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->orderBy('created_at', 'desc') // Order by creation date descending
            ->select($columns) // Select the specified columns
            ->paginate($limit); // Paginate the results
    }
}
