<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summarize Text</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Apple Color Emoji", "Segoe UI Emoji"; margin: 0; background: #0f172a; color: #e2e8f0; }
        .container { max-width: 880px; margin: 0 auto; padding: 32px 20px; }
        h1 { font-size: 28px; font-weight: 700; margin: 0 0 16px; }
        p.sub { color: #94a3b8; margin: 0 0 24px; }
        form { background: #111827; border: 1px solid #1f2937; border-radius: 12px; padding: 16px; }
        textarea { width: 100%; min-height: 200px; border-radius: 8px; border: 1px solid #334155; background: #0b1220; color: #e5e7eb; padding: 12px; font-size: 14px; resize: vertical; box-sizing: border-box; }
        .actions { display: flex; gap: 12px; align-items: center; margin-top: 12px; }
        button { background: #2563eb; color: white; border: none; padding: 10px 16px; border-radius: 8px; font-weight: 600; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .result { margin-top: 24px; background: #0b1220; border: 1px solid #334155; border-radius: 12px; padding: 16px; }
        .label { color: #94a3b8; font-size: 12px; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 8px; }
        .summary { white-space: pre-wrap; }
        .error { color: #fecaca; background: #450a0a; border: 1px solid #7f1d1d; padding: 8px 12px; border-radius: 8px; margin-bottom: 12px; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="turbo-visit-control" content="reload">
</head>
<body>
    <div class="container">
        <h1>Summarize Text</h1>
        <p class="sub">Paste or type text below and submit to see a simple summary.</p>

        @if ($errors->any())
            <div class="error">
                <strong>Whoops!</strong> Please fix the errors below.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/summarize') }}">
            @csrf
            <textarea name="text" placeholder="Paste your text here...">{{ old('text') }}</textarea>
            <div class="actions">
                <button type="submit">Summarize</button>
                <span style="color:#94a3b8">or press Ctrl+Enter</span>
            </div>
        </form>

        @if (session('summary'))
            <div class="result">
                <div class="label">Summary</div>
                <div class="summary">{{ session('summary') }}</div>
                <div class="label" style="margin-top:12px;">Word count</div>
                <div>{{ session('wordCount') }}</div>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                const form = document.querySelector('form');
                if (form) form.submit();
            }
        });
    </script>
 </body>
</html>

