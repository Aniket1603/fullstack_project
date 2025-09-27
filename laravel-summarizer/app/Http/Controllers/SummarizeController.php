<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummarizeController extends Controller
{
    public function showForm()
    {
        return view('summarize');
    }

    public function summarize(Request $request)
    {
        $validated = $request->validate([
            'text' => ['required', 'string', 'min:1'],
        ]);

        $text = $validated['text'];

        // Simple placeholder summary logic
        $summary = mb_substr($text, 0, 200);
        $wordCount = str_word_count($text);

        return back()->withInput()->with([
            'summary' => $summary,
            'wordCount' => $wordCount,
        ]);
    }
}

