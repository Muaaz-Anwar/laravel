<?php

namespace App\Http\Controllers;

use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;
use Spatie\SimpleExcel\SimpleExcelWriter;
use App\Models\Post;

class ExportController extends Controller
{
    public function exportPosts()
    {
        $filePath = storage_path('app/posts_export.xlsx');

        // Fetch posts
        $posts = Post::all(['id', 'title', 'description', 'image', 'created_at']);

        // Write to CSV
        SimpleExcelWriter::create($filePath)
            ->addRows($posts->toArray());

        // Download file
        return response()->download($filePath)->deleteFileAfterSend();
    }

    public function exportPdfWithSpatie()
    {
        $posts = Post::all();

        $html = View::make('post_pdf', compact('posts'))->render();
        $pdfPath = storage_path('app/posts.pdf');
        Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->savePdf($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(true);
    }
}
