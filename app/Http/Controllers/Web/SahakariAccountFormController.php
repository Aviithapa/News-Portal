<?php

namespace App\Http\Controllers\Web;

use App\Client\FileUpload\FileUploaderInterface;
use App\Repositories\SahakariAccountForm\SahakariAccountFormRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SahakariAccountFormController extends BaseController
{

    /**
     * Repository for interacting with sahakari account form.
     * 
     * @var SahakariAccountFormRepository
     */
    protected $sahakariAccountFormRepository;

    /**
     * 
     * @var FileUploaderInterface
     */
    protected $fileUploader;

    /**
     * SahakariAccountFormController constructor.
     * Initialize SahakariAccountFormController with SahakariAccountForm Repository.
     * 
     * @param SahakariAccountFormRepository $sahakariAccountFormRepository
     * @param FileUploaderInterface $fileUploaderInterface
     */
    public function __construct(
        SahakariAccountFormRepository $sahakariAccountFormRepository,
        FileUploaderInterface $fileUploader
    ) {
        $this->sahakariAccountFormRepository = $sahakariAccountFormRepository;
        $this->fileUploader = $fileUploader;
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
