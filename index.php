<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku Challenge</title>
    <link rel="stylesheet" href="/Sudoku-lpl/assets/css/style.css">
</head>

<body class="bg-[#FDFBF7] text-gray-800 min-h-screen flex flex-col font-sans">

    <header class="flex flex-col items-center justify-center pt-16 pb-12 px-4 text-center">

        <div class="w-16 h-16 bg-amber-700 rounded-lg mb-6 flex items-center justify-center text-white">
            <span class="text-2xl">Grid</span>
        </div>

        <h1 class="text-5xl font-bold mb-4 text-[#8B5E3C]">Sudoku Challenge</h1>

        <p class="text-lg text-gray-600 max-w-2xl mb-8">
            Pon a prueba tu mente con nuestro Sudoku 4x4.
            Desafía tu lógica y velocidad en diferentes niveles de dificultad.
        </p>

        <a href="views/login.php" class="bg-[#8B5E3C] text-white font-semibold py-3 px-8 rounded hover:bg-[#6F4B30] transition shadow-md">
            Ingresar al Juego
        </a>
    </header>

    <main class="grow w-full">
        <section class="max-w-6xl mx-auto px-6 mb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-[#EAEAEA] border border-gray-300 p-8 rounded-xl shadow-sm flex flex-col items-start">
                    <div class="w-10 h-10 bg-[#C8D696] rounded mb-4 flex items-center justify-center">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2F4F4F]">Tres Dificultades</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Elige entre Fácil, Intermedio o Difícil.
                        Cada nivel te ofrece un desafío único con diferentes cantidades de pistas.
                    </p>
                </div>

                <div class="bg-[#EAEAEA] border border-gray-300 p-8 rounded-xl shadow-sm flex flex-col items-start">
                    <div class="w-10 h-10 bg-[#A0C4C8] rounded mb-4 flex items-center justify-center">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2F4F4F]">Contador de Tiempo</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Compite contra el reloj y mejora tus tiempos.
                        Cada partida se registra en tu historial personal.
                    </p>
                </div>

                <div class="bg-[#EAEAEA] border border-gray-300 p-8 rounded-xl shadow-sm flex flex-col items-start">
                    <div class="w-10 h-10 bg-[#E0C097] rounded mb-4 flex items-center justify-center">
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2F4F4F]">Ranking Global</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Compara tu desempeño con otros jugadores y sube en el ranking global del juego.
                    </p>
                </div>

            </div>
        </section>

        <section class="max-w-4xl mx-auto px-6 pb-20">
            <div class="bg-[#EAEAEA] border border-gray-300 rounded-xl p-10 shadow-sm text-center">
                <h2 class="text-2xl font-bold mb-6 text-[#2F4F4F]">Sobre el Juego</h2>

                <div class="text-left text-sm text-gray-600 space-y-4">
                    <p>
                        Bienvenido a <span class="font-bold text-[#8B5E3C]">Sudoku Challenge</span>, una experiencia de juego diseñada para ejercitar tu mente mientras te diviertes. Este juego de Sudoku 4x4 es perfecto tanto para principiantes como para expertos.
                    </p>
                    <p>
                        El Sudoku es un rompecabezas lógico donde debes llenar una cuadrícula de manera que cada fila, cada columna y cada sub-cuadrícula contenga todos los números sin repetir. En nuestra versión 4x4, utilizarás los números del 1 al 4.
                    </p>
                    <p>
                        Con una interfaz intuitiva de arrastrar y soltar, podrás jugar de manera fluida y natural. Además, el sistema de registro te permite guardar tu progreso, ver tu historial de partidas y competir en el ranking global.
                    </p>
                </div>

                <hr class="my-8 border-gray-400">

                <div class="text-left">
                    <h4 class="font-bold text-[#2F4F4F] mb-2">Sobre el Desarrollador</h4>
                    <p class="text-xs text-gray-500">
                        Creado con pasión para amantes de los desafíos mentales. Este proyecto combina la lógica clásica del Sudoku con tecnología web moderna para ofrecerte la mejor experiencia de juego.
                    </p>
                </div>
            </div>
        </section>

    </main>

    <footer class="py-8 text-center text-gray-500 text-sm">
        <p>© 2025 Desafío Sudoku. Cosmos.</p>
    </footer>

</body>

</html>