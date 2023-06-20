<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DocumentServiceInterface;
use App\Http\Requests\FileDocumentsCreateRequest;
class DocumentController extends Controller
{

    private DocumentServiceInterface $service;

    public function __construct(DocumentServiceInterface $service)
    {
        $this->service = $service;
    }

    public function uploadDocuments(FileDocumentsCreateRequest $request)
    {
        $file = $request->file('file');
        $this->service->uploadDocuments($file);
        return response()->json(['message' => 'Documents in the queue'], 200);
    }
}
