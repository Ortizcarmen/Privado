<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro de programación</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-b from-neutral-950 to-neutral-900 text-white">
    <div class="px-4 border-b border-neutral-800">
        <x-forum.navbar />
    </div>
    
    <div class="mx-auto max-w-4xl px-4 pb-8">
        {{ $slot }}
    </div>
</body>
</html>