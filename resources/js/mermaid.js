import mermaid from 'mermaid';

// Initialize mermaid with default configuration
mermaid.initialize({
    startOnLoad: true,
    theme: 'default',
    securityLevel: 'loose', // This allows for links in diagrams
    logLevel: 'error',
    fontFamily: 'Roboto, sans-serif',

    // Dark theme detection based on your app's dark mode
    themeVariables: {
        darkMode: document.documentElement.getAttribute('data-theme') === 'dark'
    }
});

// Function to manually initialize mermaid when new content is loaded dynamically
window.initMermaid = function() {
    mermaid.init(undefined, document.querySelectorAll('.mermaid'));
};

// Listen for theme changes to update diagrams
window.addEventListener('theme-changed', function(e) {
    const isDarkMode = e.detail.theme === 'dark';
    mermaid.initialize({
        themeVariables: { darkMode: isDarkMode }
    });
    mermaid.init(undefined, document.querySelectorAll('.mermaid'));
});

export default mermaid;
