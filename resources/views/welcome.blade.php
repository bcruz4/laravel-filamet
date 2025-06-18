<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Mi CMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #ffffff;
            --accent-color: #6366f1;
            /* Indigo-500 */
            --text-color: #111827;
            /* Gray-900 */
            --muted-text: #6b7280;
            /* Gray-500 */
            --border-color: #e5e7eb;
            /* Gray-200 */
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
            max-width: 960px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .card p {
            color: var(--muted-text);
            font-size: 1rem;
            line-height: 1.5;
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
    <div class="card">
        <h2>Bienvenido al CMS</h2>
        <p>Este es un sistema minimalista para la administración de contenido, como publicaciones, categorías y comentarios. Gestiona todo fácilmente desde el panel.</p>
    </div>

    <div style="margin-top: 3rem;">
        <h2 style="font-size: 1.5rem; color: var(--accent-color); margin-bottom: 1rem;">Últimas publicaciones</h2>

        @forelse($posts as $post)
            <div class="card" style="margin-bottom: 2rem;">
                <h3 style="margin-bottom: 0.5rem;">{{ $post->title }}</h3>
                <p style="color: var(--muted-text); font-size: 0.9rem;">Publicado el {{ $post->created_at->format('d/m/Y') }}</p>

                @if($post->img_url)
                    <img src="{{ $post->img_url }}" alt="Imagen de {{ $post->title }}" style="width: 100%; max-height: 250px; object-fit: cover; margin: 1rem 0; border-radius: 0.5rem;">
                @endif

                <p>{{ Str::limit(strip_tags($post->body), 200) }}</p>

                <a href="#" style="display: inline-block; margin-top: 1rem;">Leer más</a>
            </div>
        @empty
            <p>No hay publicaciones disponibles por el momento.</p>
        @endforelse
    </div>
</main>


    <footer>
        &copy; {{ date('Y') }} Ministerio de Salud · Desarrollado con Laravel & Filament
    </footer>

</body>

</html>