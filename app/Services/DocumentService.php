<?php

namespace App\Services;

use App\Repositories\DocumentRepository;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\ProcessCreateDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Services\CategoryServiceInterface;

class DocumentService extends BaseService implements DocumentServiceInterface
{
    private CategoryServiceInterface $categoryService;

    public function __construct(DocumentRepository $repository, CategoryServiceInterface $categoryService)
    {
        parent::__construct($repository);
        $this->categoryService = $categoryService;
    }

    public function uploadDocuments(UploadedFile $file) {
        $documentsFile = File::json($file->path());
        $categories = [];
        foreach ($documentsFile['documentos'] as $document) {
            if(array_key_exists($document['categoria'],$categories)) {
                $category = $categories[$document['categoria']];
            } else {
                $category = $this->categoryService->getCategoryByName($document['categoria']);
                $categories[$document['categoria']] = $category;
            }
            ProcessCreateDocument::dispatch($category->id, $document['conteúdo'], $document['titulo']);
        }
    }
}
