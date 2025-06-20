<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #ffffff;
            --accent-color: #6366f1;
            --text-color: #111827;
            --text-color-button: #ffffff;
            --muted-text: #6b7280;
            --border-color: #e5e7eb;
            --orange-accent: #6366f1;
            --blue-dark: #2f4559;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
        }

        .navbar {
            display: flex;
            gap: 1.5rem;
        }

        .navbar a {
            color: var(--text-color);
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .navbar a:hover {
            color: var(--accent-color);
            text-decoration: none;
        }

        main {
            padding: 2rem;
            max-width: 1200px; /* Aumentado para dos columnas */
            margin: 0 auto;
        }

        /* Nuevo contenedor de dos columnas */
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 2rem;
        }

        /* Ajustes para las cards */
        .document-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border: 1px solid var(--border-color);
            height: 100%;
        }

        .document-header {
            position: relative;
            padding: 0;
        }

        .date-container {
            width: 76px;
            height: 62px;
            float: left;
            margin-right: 15px;
            background: white;
            border-left: 5px solid var(--orange-accent) !important;
            border-right: 1px solid #ddd !important;
            text-align: center;
        }

        .date-month {
            font-weight: 500;
            padding: 0;
            margin: 0;
            color: var(--blue-dark);
            font-size: 10px;
            line-height: 22px;
        }

        .date-day {
            font-weight: 700;
            padding: 0;
            margin: 0;
            color: var(--blue-dark);
            font-size: 24px;
            line-height: 20px;
        }

        .date-year {
            padding: 0;
            margin: 0;
            color: var(--blue-dark);
            font-size: 13px;
            line-height: 22px;
        }

        .document-type {
            font-weight: 300;
            padding-top: 22px;
            font-size: 28px;
            text-transform: uppercase;
            margin: 0;
        }

        .download-btn {
            position: absolute;
            bottom: 15px;
            right: 13px;
            padding: 8px 10px;
            background-color: var(--orange-accent);
            color: white !important;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .download-btn a {
            color: white !important;
            text-decoration: none;
        }

        .download-btn:hover {
            background-color: #6b7280;
        }

        .divider {
            border-top: 1px solid var(--border-color);
            margin: 0;
        }

        .document-content {
            padding: 16px;
        }

        .document-title {
            color: var(--blue-dark);
            margin-bottom: 8px;
            font-weight: 500;
            text-align: justify;
            line-height: 22px;
            font-size: 1rem;
        }

        .document-text {
            text-align: justify;
            margin-top: 0;
        }

        footer {
            margin-top: 4rem;
            padding: 1rem 2rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--muted-text);
            border-top: 1px solid var(--border-color);
        }

        a {
            color: var(--accent-color);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsive: una columna en móviles */
        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Ministerio de Salud y Deportes</h1>
        <nav>
            <div class="navbar">
                <a href="/publicaciones">Publicaciones</a>
                <a href="/videos">Videos</a>
                <a href="/organigrama">Organigrama</a>
                <a href="/dashboard">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="posts-grid">
            @forelse($posts as $post)
            <div class="document-card">
                <div class="document-header">
                    <div style="height: 62px;">
                        <div class="date-container">
                            <p class="date-month">{{ $post->created_at->format('M') }}</p>
                            <p class="date-day">{{ $post->created_at->format('d') }}</p>
                            <p class="date-year">{{ $post->created_at->format('Y') }}</p>
                        </div>
                        <p class="document-type">Instructivo</p>
                    </div>
                    <button class="download-btn">
                        @if($post->pdf_url)
                        <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank">
                            Descargar&nbsp;<i class="fas fa-download" style="font-size: 16px;"></i>
                        </a>
                        @else
                        <a href="#">
                            Leer más&nbsp;<i class="fas fa-info-circle" style="font-size: 16px;"></i>
                        </a>
                        @endif
                    </button>
                </div>
                <hr class="divider">
                <div class="document-content">
                    <h6 class="document-title">{{ $post->title }}</h6>
                    <p class="document-text">
                        {{ Str::limit(strip_tags($post->body), 500) }}
                    <div class="content">
                        @if($post->pdf_url)
                        <a href="{{ asset('storage/' . $post->pdf_url) }}" target="_blank"></a>
                        @else
                        <a href="#">Leer más</a>
                        @endif
                    </div>
                    </p>
                </div>
            </div>
            @empty
            <p>No hay publicaciones disponibles por el momento.</p>
            @endforelse
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Ministerio de Salud y Deportes
    </footer>
</body>
</html>