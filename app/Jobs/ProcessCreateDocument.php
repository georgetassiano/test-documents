<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\DocumentServiceInterface;
class ProcessCreateDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $categoryId;
    private string $contents;
    private string $title;

    /**
     * Create a new job instance.
     */
    public function __construct(int $categoryId, string $contents, string $title)
    {
        $this->categoryId = $categoryId;
        $this->contents = $contents;
        $this->title = $title;
    }

    /**
     * Execute the job.
     */
    public function handle(DocumentServiceInterface $service): void
    {
        $service->store(['category_id' => $this->categoryId, 'contents' => $this->contents, 'title' => $this->title]);
    }
}
