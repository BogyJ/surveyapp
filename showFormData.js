(function () {
    // Implementirati "copy to clipboard" funkcionalnost
    const copyBtn = document.getElementById('copy-btn');

    function copyTextToClipboard() {
        const copyText = document.getElementById('copy-text');
        const copyMessage = document.getElementById('copy-alert');

        copyText.select();
        copyText.setSelectionRange(0, 99999);

        document.execCommand("copy");

        copyMessage.innerText = 'URL kopiran!';
    }

    copyBtn.addEventListener('click', copyTextToClipboard);

})();
