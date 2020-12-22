<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pdfcrowd\HtmlToImageClient;

class FetchCompanyWebSite implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $company = null;

    /**
     * Create a new job instance.
     * @param $company
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->company) {
            $response = Http::get($this->company->link);

            $client = new HtmlToImageClient(
                "demo",
                "ce544b6ea52a5621fb9d55f8b542d14d"
            );

            $name = Str::slug($this->company->name);

            $client->setOutputFormat("png");

            $html = $response->body();
            $image = $client->convertUrl($this->company->link);

            Storage::disk('company_pages')->put($name . '.html', $html);
            Storage::disk('company_pages')->put($name . '.png', $image);
        }
    }
}
