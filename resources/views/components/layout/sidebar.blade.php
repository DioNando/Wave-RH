    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div x-show="open" x-cloak class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/80" aria-hidden="true"></div>

        <div class="fixed inset-0 flex">
            <div class="relative mr-16 flex w-full max-w-xs flex-1">
                <div class="absolute top-0 left-full flex w-16 justify-center pt-5">
                    <button @click="open=false" @click.away="open = false" type="button" class="-m-2.5 p-2.5">
                        <span class="sr-only">Fermer</span>
                        <svg class="size-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div
                    class="flex grow flex-col gap-y-5 overflow-y-auto scrollbar-custom border-r border-gray-200 dark:border-0 dark:shadow-md bg-white dark:bg-gray-900 px-6 pb-6">
                    <div class="flex h-16 shrink-0 items-center">
                        <x-application-logo class="h-8" />
                    </div>
                    <nav class="flex flex-1 flex-col">
                        <x-layout.navigation-links />
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    {{-- <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col"> --}}
    {{-- <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex w-72 lg:flex-col"> --}}
    <div class="hidden lg:z-50 lg:flex w-72 flex-shrink-0 lg:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div
            class="flex grow flex-col gap-y-5 overflow-y-auto scrollbar-custom border-r border-gray-200 dark:border-0 dark:shadow-md bg-white dark:bg-gray-900 px-6 pb-6">
            <div class="flex h-16 shrink-0 items-center">
                <x-application-logo class="h-8" />
            </div>
            <nav class="flex flex-1 flex-col">
                <x-layout.navigation-links />
            </nav>
        </div>
    </div>
