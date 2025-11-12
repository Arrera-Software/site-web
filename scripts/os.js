async function detectOS() {
    let os = null;

    // 1) User-Agent Client Hints (si dispo)
    if (navigator.userAgentData?.platform) {
        os = navigator.userAgentData.platform; // ex: "Windows", "macOS", "Linux", "Android", "iOS"
    } else {
        // 2) Fallback: parser userAgent (moins fiable)
        const ua = navigator.userAgent;
        if (/Windows NT/i.test(ua)) os = 'windows';
        else if (/Mac OS X/i.test(ua) && !/iPhone|iPad|iPod/i.test(ua)) os = 'macos';
        else if (/Linux/i.test(ua) && !/Android/i.test(ua)) os = 'linux';
        else if (/Android/i.test(ua)) os = 'android';
        else if (/iPhone|iPad|iPod/i.test(ua)) os = 'ios';
        else os = 'unknown';
    }

    // Exemple: ajouter une classe sur <html>
    document.documentElement.classList.add('os-' + os.toLowerCase().replace(/\s+/g, ''));

    // Pour debug
    console.log('OS détecté:', os);
    return os;
}