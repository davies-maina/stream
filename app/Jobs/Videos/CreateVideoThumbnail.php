<?php

namespace Stream\Jobs\Videos;

use Stream\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;

class CreateVideoThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FFMpeg::fromDisk('local')
            ->open($this->video->path)
            ->getFrameFromSeconds(1)
            ->export()
            ->toDisk('local')
            ->save("public/thumbnails/{$this->video->id}.png");

        $this->video->update([
            'thumbnail' => Storage::url("thumbnails/{$this->video->id}.png")

        ]);
    }
}
