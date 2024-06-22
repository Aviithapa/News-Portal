<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * Get all resources
     *
     * @param array $columns
     *
     * @return Collection
     */
    public function all(array $columns = array('*')): Collection;

    /**
     * Get paginated resources
     *
     * @param Request $request
     * @param array $columns
     *
     * @return LengthAwarePaginator|Collection
     */
    public function getPaginatedList(Request $request, $type, array $columns = array('*'));

    /**
     * Stores newly created resource
     *
     * @param array $data
     *
     * @return object
     */
    public function store(array $data): object;

    /**
     * Update specific resource.
     *
     * @param array $data
     * @param       $id
     *
     * @return bool
     */
    public function update($id, array $data): bool;

    /**
     * Delete specific resource
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id): bool;

    /**
     * Find specific resource
     *
     * @param       $id
     * @param array $columns
     *
     * @return object
     */
    public function find($id, array $columns = array('*')): ?object;

    /**
     * Find specific resource by given attribute
     *
     * @param       $attribute
     * @param       $value
     * @param array $columns
     *
     * @return Object
     */
    public function findBy($attribute, $value, array $columns = array('*')): ?object;

    /**
     * Count specific resource.
     *
     * @return integer
     */
    public function count(): int;


    /**
     * Find data by specified column name and value.
     *
     * @param string $key
     * @param string $value
     * @param string $operator
     *
     * @param bool $paginate
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByWithPagination($key, $value, $operator = '=', $paginate = true, $length = 10);


        /**
     * Get recent posts with pagination.
     *
     * @param Request $request
     * @param int $limit
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getRecentPosts( int $limit = 10, array $columns = array('*'));
}
