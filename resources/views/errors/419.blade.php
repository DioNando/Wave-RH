<x-error-layout>
    <main class="grid min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8 bg-gray-100 dark:bg-gray-800">
        <div class="text-center">
            <div class="relative">
                <p class="text-9xl font-bold text-blue-600/20 absolute inset-0 -z-10">419</p>
                <p class="text-4xl font-semibold text-blue-600 relative">419</p>
            </div>
            <h1
                class="mt-4 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl dark:text-gray-100">
                Page expirée
            </h1>
            <p class="mt-6 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8 dark:text-gray-300">
                Votre session a expiré. Veuillez rafraîchir la page et réessayer.
            </p>

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ url()->previous() }}"
                    class="rounded-md bg-gray-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                    Retour à la page précédente
                </a>
                <a href="{{ route('dashboard') }}"
                    class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Retourner au tableau de bord
                </a>
            </div>
        </div>
    </main>
</x-error-layout>
