(function () {
    const root = document.documentElement;

    /**
     * Applies the specified theme to the document.
     *
     * @param {string|null} theme - The theme to apply ('dark', 'light', or 'system').
     * If null or undefined, the function falls back to the theme stored in localStorage or 'system'.
     *
     * If the theme is 'dark', or if it's 'system' and the user's system preference is dark mode,
     * then the dark theme is applied. Otherwise, the light theme is applied.
     *
     * The theme is applied by setting the 'data-theme' attribute on the root element.
     */
    function applyTheme(theme) {
        const savedTheme = theme || localStorage.getItem("theme") || "system";
        if (savedTheme === "dark" || (savedTheme === "system" && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
            root.setAttribute("data-theme", "dark");
        } else {
            root.setAttribute("data-theme", "light");
        }
    }

    // Appliquer le thème immédiatement pour éviter le flash
    applyTheme();

    document.addEventListener("DOMContentLoaded", function () {
        // Écouter les changements système si "system" est sélectionné
        if (localStorage.getItem("theme") === "system" || !localStorage.getItem("theme")) {
            window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", () => {
                applyTheme("system");
            });
        }

        // Ajouter les événements aux boutons de changement de thème
        document.querySelectorAll("[data-theme-toggle]").forEach((button) => {
            button.addEventListener("click", function () {
                const selectedTheme = this.getAttribute("data-theme-toggle");
                localStorage.setItem("theme", selectedTheme);
                applyTheme(selectedTheme);
            });
        });
    });

    // Écouter les événements de navigation Livewire
    document.addEventListener('livewire:navigating', () => {
        // On ne fait rien pendant la navigation
    });

    document.addEventListener('livewire:navigated', () => {
        // Réappliquer le thème après navigation
        applyTheme();
    });

    // Le hook page:transition peut aussi être utile pour les transitions de page LiveWire
    window.addEventListener('page:transition', () => {
        applyTheme();
    });
})();
