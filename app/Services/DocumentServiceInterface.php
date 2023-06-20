<?php

namespace App\Services;
use Illuminate\Http\UploadedFile;

interface DocumentServiceInterface extends BaseServiceInterface
{
    public function uploadDocuments(UploadedFile $file);
}
