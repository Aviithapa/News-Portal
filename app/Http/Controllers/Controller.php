<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function save_image(Request $request)
    {
        try {
            // Check if the file upload field exists in the request
            if ($request->hasFile('upload')) {
                // Store the uploaded file in the 'public/news' directory
                $path = $request->file('upload')->store('public/news');

                // Check if the file was successfully stored
                if ($path) {
                    // Replace 'public' with 'storage' in the file path
                    $url = str_replace('public', 'storage', $path);

                    // Construct the full URL of the uploaded image
                    $fullUrl = url($url);


                    // Return the full URL of the uploaded image
                    return response()->json([
                        'url' => $fullUrl
                    ]);
                }
            }

            // If no file was uploaded or if storing failed, return error response
            return response()->json(['error' => 'File upload failed'], 500);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
