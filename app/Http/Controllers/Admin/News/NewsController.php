<?php

namespace App\Http\Controllers\Admin\News;

use App\Client\FileUpload\FileUploaderInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateNewsRequest;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\CMS\Post\PostRepository;
use App\Repositories\Media\MediaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    protected $postRepository;
    protected $fileUploader;
    protected $mediaRepository;
    protected $categoryRepository;

    public function __construct(
        PostRepository $postRepository,
        FileUploaderInterface $fileUploader,
        MediaRepository $mediaRepository,
        CategoryRepository $categoryRepository,
    ) {
        $this->postRepository = $postRepository;
        $this->fileUploader = $fileUploader;
        $this->mediaRepository = $mediaRepository;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $news = $this->postRepository->getPaginatedList($request, 'news');
        return view('admin.pages.news.index', compact('news', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = $this->categoryRepository->all();
        return view('admin.pages.news.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewsRequest $request)
    {
        //
        $data = $request->all();


        try {
            DB::beginTransaction();
            $data['type'] = 'news';
            $data['slug'] = generateSlug($data['title']);
            $data['created_by'] = Auth::user()->id;
            $news = $this->postRepository->store($data);
            $news->categories()->attach($request->input('categories'));
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            if ($request->hasFile('cover')) {
                $cover = $request->file('cover');
                $newsCover =  $this->fileUploader->upload($cover, "news");
                $news->image = $newsCover['path'];
                $news->save();
            }

            DB::commit();
            session()->flash('success', 'News has been created successfully.');
            return redirect()->route('news.index');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
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
        $news = $this->postRepository->findOrFail($id);
        $category = $this->categoryRepository->all();
        return view('admin.pages.news.edit', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
                $news = $this->postRepository->update($id, [$attribute => $checked]);
                if (!$news) {
                    return response()->json(['error' => 'Oops! Something went wrong.'], 500);
                }
                DB::commit();

                return response()->json(['success' => 'Resource updated successfully.']);
            }

            // If not an AJAX request, proceed with regular update logic
            $data = $request->all();
            DB::beginTransaction();
            $data['slug'] = generateSlug($data['title']);
            $news = $this->postRepository->update($id, $data);
            if (!$news) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $news = $this->postRepository->findOrFail($id);
            $news->categories()->sync($request->input('categories', []));
            if ($request->hasFile('cover')) {
                $news = $this->postRepository->findOrFail($id);
                $newsCover =  $this->fileUploader->upload($request->file('cover'), "cover");
                $news->image = $newsCover['path'];
                $news->save();
            }

            DB::commit();
            session()->flash('success', 'News has been updated successfully.');
            return redirect()->route('news.index');
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
            $news = $this->postRepository->delete($id);
            if ($news == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'News has been deleted successfully.');
            return redirect()->route('news.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }
}
