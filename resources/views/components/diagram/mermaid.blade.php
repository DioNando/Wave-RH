@props(['id' => 'mermaid-' . uniqid(), 'caption' => null, 'class' => ''])

<style>
    .diagram-caption-container {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
</style>

<div class="my-6 {{ $class }}">
    @if($caption)
        <div class="diagram-caption-container text-sm font-medium text-gray-500 dark:text-gray-400">
            <span>{{ $caption }}</span>
            <x-button.primary
                type="button"
                :responsive="true"
                icon="heroicon-o-arrow-down-tray"
                data-diagram-id="{{ $id }}"
                onclick="exportDiagram('{{ $id }}', '{{ $caption ?? 'Diagram' }}')"
            >
                Exporter PNG
            </x-button.primary>
        </div>
    @else
        <div class="text-right mb-2">
            <x-button.primary
                type="button"
                :responsive="true"
                icon="heroicon-o-arrow-down-tray"
                data-diagram-id="{{ $id }}"
                onclick="exportDiagram('{{ $id }}', 'Diagram')"
            >
                Exporter PNG
            </x-button.primary>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-900 rounded-lg p-4 overflow-auto">
        <pre class="mermaid text-center flex items-center justify-center" id="{{ $id }}">{{ $slot }}</pre>
    </div>
</div>

@push('scripts')
<script>
    // Ensure diagrams are reinitialized when Livewire updates the DOM
    document.addEventListener("livewire:navigated", function() {
        if (window.initMermaid) {
            window.initMermaid();
        }
    });

    // Also initialize when this component is first rendered
    document.addEventListener("DOMContentLoaded", function() {
        if (window.initMermaid) {
            window.initMermaid();
        }
    });

    // Function to create a toast notification
    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-4 right-4 z-50 p-3 rounded-md shadow-lg transition-opacity duration-500 opacity-0 flex items-center ${type === 'success' ? 'bg-green-500' : 'bg-blue-500'} text-white`;
        toast.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                ${type === 'success'
                    ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />'
                    : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'}
            </svg>
            ${message}
        `;

        document.body.appendChild(toast);
        // Trigger a reflow before adding the transition class
        toast.offsetWidth;
        toast.style.opacity = '1';

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 500);
        }, 3000);
    }

    // Function to export diagram as PNG
    window.exportDiagram = function(id, caption) {
        const element = document.getElementById(id);
        if (!element) return;

        // Show processing toast
        showToast('Préparation de l\'exportation...', 'info');

        // Option 1: Try to get the rendered SVG first (fastest)
        const svgElement = element.querySelector('svg');
        if (svgElement) {
            exportFromSvg(svgElement, caption);
        } else {
            // Option 2: If no SVG element is found, try to re-render the diagram
            const graphDefinition = element.textContent || '';

            try {
                // Use mermaid's API to render a new SVG
                exportFromMermaidAPI(graphDefinition, caption);
            } catch (error) {
                console.error('Failed to export diagram:', error);
                showToast('Erreur: Impossible d\'exporter le diagramme', 'error');
            }
        }
    };

    // Export using the SVG element directly
    function exportFromSvg(svgElement, caption) {
        // Clone the SVG to avoid modifications to the original
        const svgClone = svgElement.cloneNode(true);

        // Ensure SVG has proper dimensions
        const bbox = svgElement.getBBox();
        const padding = 50;
        svgClone.setAttribute('width', bbox.width + padding);
        svgClone.setAttribute('height', bbox.height + padding);

        // Apply some styling for better export quality
        const styleElement = document.createElement('style');
        styleElement.textContent = `
            * {
                font-family: Arial, sans-serif;
            }
            .label, .nodeLabel {
                font-weight: normal !important;
            }
            .cluster rect {
                stroke: #333;
                stroke-width: 1px !important;
            }
            .edgeLabel {
                background-color: white !important;
            }
        `;
        svgClone.appendChild(styleElement);

        // Alternative approach that avoids the CORS issue
        // Use svg-to-img library inlined
        const renderSvgString = async (svgString, width, height) => {
            return new Promise((resolve, reject) => {
                try {
                    // First method: directly using a data URL
                    const svgBase64 = btoa(unescape(encodeURIComponent(svgString)));
                    const base64Url = `data:image/svg+xml;base64,${svgBase64}`;

                    const img = new Image();
                    img.onload = function() {
                        resolve(img);
                    };
                    img.onerror = function() {
                        reject(new Error("SVG loading failed"));
                    };
                    img.width = width;
                    img.height = height;
                    img.src = base64Url;
                } catch (error) {
                    reject(error);
                }
            });
        };

        // Prepare SVG for rendering
        const svgData = new XMLSerializer().serializeToString(svgClone);

        // Add a promise wrapper around the image loading process
        (async () => {
            try {
                // Get SVG dimensions
                const bbox = svgElement.getBBox();
                const padding = 50;
                const width = bbox.width + padding;
                const height = bbox.height + padding;

                // Render the SVG to an image element
                const img = await renderSvgString(svgData, width, height);

                // Create canvas
                const canvas = document.createElement('canvas');
                // Increase size for better quality
                const scale = 2; // 2x scale for better quality
                canvas.width = width * scale;
                canvas.height = height * scale;

                // Draw SVG to canvas
                const ctx = canvas.getContext('2d');
                ctx.fillStyle = '#ffffff';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                // Scale up for better quality
                ctx.scale(scale, scale);
                ctx.drawImage(img, 0, 0);

                // Convert canvas to PNG
                const pngUrl = canvas.toDataURL('image/png');

                // Generate a normalized filename from the caption
                const filename = caption.replace(/[^a-z0-9]/gi, '_').toLowerCase() + '.png';

                // Create download link
                const downloadLink = document.createElement('a');
                downloadLink.download = filename;
                downloadLink.href = pngUrl;
                downloadLink.click();

                // Show success toast
                showToast('Diagramme exporté avec succès!', 'success');
            } catch (error) {
                console.error('Error exporting diagram:', error);
                showToast('Erreur lors de l\'exportation du diagramme', 'error');
            }
        })();
    }

    // Export using mermaid's API directly
    function exportFromMermaidAPI(graphDefinition, caption) {
        if (typeof mermaid === 'undefined') {
            showToast('Erreur: Bibliothèque Mermaid non disponible', 'error');
            return;
        }

        try {
            const isDarkMode = document.documentElement.getAttribute('data-theme') === 'dark';

            mermaid.mermaidAPI.render(
                'mermaid-export-' + Date.now(),
                graphDefinition,
                function(svgCode) {
                    // Create a DOM element from the SVG code
                    const parser = new DOMParser();
                    const svgDoc = parser.parseFromString(svgCode, 'image/svg+xml');
                    const svgElement = svgDoc.documentElement;

                    // Continue with the same rendering process
                    exportFromSvg(svgElement, caption);
                },
                document.createElement('div'),
                {
                    theme: isDarkMode ? 'dark' : 'default',
                    securityLevel: 'loose'
                }
            );
        } catch (error) {
            console.error('Error in Mermaid API render:', error);
            showToast('Erreur: Échec de rendu du diagramme', 'error');

            // Last resort - try a fallback approach
            fallbackExport(graphDefinition, caption);
        }
    }

    // Ultimate fallback method - redirect to an online renderer
    function fallbackExport(graphDefinition, caption) {
        const encoded = encodeURIComponent(graphDefinition);
        if (encoded.length > 4000) {
            showToast('Diagramme trop grand pour utiliser la méthode de secours', 'error');
            return;
        }

        // Let's show an option to use Mermaid Live Editor instead
        const confirmDialog = document.createElement('div');
        confirmDialog.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50';
        confirmDialog.innerHTML = `
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-xl max-w-md w-full">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Problème d'exportation</h3>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    L'exportation directe a échoué. Souhaitez-vous ouvrir ce diagramme dans Mermaid Live Editor pour l'exporter ?
                </p>
                <div class="flex justify-end gap-2">
                    <button id="cancel-export" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-md">Annuler</button>
                    <button id="confirm-export" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Ouvrir dans Mermaid Live</button>
                </div>
            </div>
        `;

        document.body.appendChild(confirmDialog);

        document.getElementById('cancel-export').addEventListener('click', function() {
            document.body.removeChild(confirmDialog);
        });

        document.getElementById('confirm-export').addEventListener('click', function() {
            document.body.removeChild(confirmDialog);
            // Use base64 encoding instead of pako
            const base64 = btoa(unescape(encodeURIComponent(graphDefinition)));
            const liveEditorUrl = `https://mermaid.live/edit#base64:${base64}`;
            window.open(liveEditorUrl, '_blank');
        });
    }
</script>
@endpush
