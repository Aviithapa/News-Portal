<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CMS\Post\PostRepository;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    //

    private $view_data;
    private $request;
    private $postRepository;
    private $categoryRepository;

    public function __construct(
        Request $request,
        PostRepository $postRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        parent::__construct();
    }


    public function slug($slug = null)
    {
        $slug = $slug ? $slug : 'index';
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'website/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        $this->view_data['pageData'] = $this->postRepository->findBy('slug', $slug);
        $this->view_data['clients'] = $this->postRepository->all()->where('type', 'clients');
        $this->view_data['slug'] = $slug;
        $this->view_data['breakingNews'] = $this->postRepository->findByWithPagination('is_breaking_news', 1, '=', true, 5);
        $this->view_data['categories'] = $this->categoryRepository->all(['id', 'name', 'name_nepali']);
        $this->view_data['trendingNews'] = $this->postRepository->findByWithPagination('is_trending_news', 1,  '=', true, 10);
        $this->view_data['menu'] = Category::where('is_show_to_menu', 1)->orderBy('order')->get();
        $this->view_data['recentPostsFotter'] = $this->postRepository->getRecentPosts(2);

        if (file_exists($file_path) && $this->view_data['pageData']) {
            switch ($slug) {
                case 'index':
                    $this->view_data['banners'] = $this->postRepository->all()->where('type', 'homepage_banner');
                    $this->view_data['facilities'] = $this->postRepository->all()->where('type', 'facilities');
                    $this->view_data['services'] = $this->postRepository->all()->where('type', 'services');
                    $this->view_data['isTopRated'] = $this->postRepository->findByWithPagination('is_top_rated', 1, '=', true, 5);
                    $this->view_data['isFeaturedPost'] = $this->postRepository->findBy('is_featured_post', 1, ['id', 'title', 'created_at', 'image']);
                    $this->view_data['isTrendingNews'] = $this->postRepository->findByWithPagination('is_trending_news', 1,  '=', true, 2);
                    $this->view_data['trendingNews'] = $this->postRepository->findByWithPagination('is_trending_news', 1,  '=', true, 10);
                    $this->view_data['videos'] = $this->postRepository->findByWithPagination('news_type', 'video',  '=', true, 4);
                    $this->view_data['featuredPosts'] = $this->postRepository->findByWithPagination('is_featured_post', 1, true, 10);
                    $this->view_data['columnCategories'] = $this->categoryRepository->findByWithPagination('is_active_to_home', 1, true, 4);
                    $this->view_data['recentPosts'] = $this->postRepository->getRecentPosts();
                    $this->view_data['isPopularNews'] = $this->postRepository->findByWithPagination('is_popular_news', 1, true, 4);
                    $this->view_data['internationalNews'] = Category::where('name', 'international')->orderBy('created_at', 'desc')->take(4)->get();
                    $columnNews = [];
                    foreach ($this->view_data['columnCategories'] as $category) {
                        $news = $category->news()->orderBy('created_at', 'desc')->take(4)->get(); // Assuming you have a 'news' relationship in your Category model
                        $columnNews[$category->id] = $news;
                    }
                    $this->view_data['columnNews'] = $columnNews;

                    break;
            }
            return view('website.pages.' . $slug,  $this->view_data);
        }
        return view('website.pages.404', $this->view_data);
    }

    public function newsDetails($id = null)
    {
        $this->view_data['menu'] = Category::where('is_show_to_menu', 1)->orderBy('order')->get();
        $currentPost = $this->view_data['newsDetails'] = $this->postRepository->findOrFail($id);
        $categoryIds = $currentPost->categories->pluck('id');

        // Find related posts that share at least one category with the current post
        $this->view_data['relatedPosts'] = Post::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->where('id', '!=', $currentPost->id) // Exclude the current post from the results
            ->get();

        $this->view_data['categories'] = $this->categoryRepository->all(['id', 'name', 'name_nepali']);
        $this->view_data['recentPosts'] = $this->postRepository->getRecentPosts();

        return view('website.pages.news-details',  $this->view_data);
    }

    public function newsList($type = null, $id = null)
    {
        $this->view_data['menu'] = Category::where('is_show_to_menu', 1)->orderBy('order')->get();
      
        if ($type === 'author') {
            $this->view_data['newsDetails'] = $this->postRepository->findByWithPagination('created_by', $id, '=', true, 5);
        } else if ($type === 'category') {
            $this->view_data['newsDetails'] = $this->getRelatedPostsByCategory($id);
        }

        $this->view_data['categories'] = $this->categoryRepository->all(['id', 'name', 'name_nepali']);
        $this->view_data['recentPosts'] = $this->postRepository->getRecentPosts();
        return view('website.pages.news-list', $this->view_data);
    }

    private function getRelatedPostsByCategory($categoryId)
    {
        $category = Category::with('news')->findOrFail($categoryId);
        $relatedPosts = $category->news()->where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(5);
        return $relatedPosts;
    }
}
