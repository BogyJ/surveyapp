(function() {
    function handleForm() {
        const radios = document.querySelectorAll('input[type="radio"]');
        const checkBoxes = document.querySelectorAll('input[type="checkbox"]');

        radios.forEach(el => {
            el.disabled = false;
        });

        checkBoxes.forEach(el => {
            el.disabled = false;
        });

    }

    function startTimer(counter, interval) {
        const form = document.getElementById('form');
        let minutes = document.getElementById('minutes');
        let seconds = document.getElementById('seconds');

        if (seconds.innerText === '00') {
            seconds.innerText = '60';
            if (Number(minutes.innerText) < 10) {
                minutes.innerText = '0' + (Number(minutes.innerText) - 1).toString();
            } else {
                minutes.innerText = (Number(minutes.innerText) - 1).toString();
            }
        }

        if (Number(seconds.innerText) <= 10) {
            seconds.innerText = '0' + (Number(seconds.innerText) - 1).toString();
        } else {
            seconds.innerText = (Number(seconds.innerText) - 1).toString();
        }

        if (seconds.innerText === '00' && minutes.innerText === '00') {
            const radios = document.querySelectorAll('input[type="radio"]');
            const checkBoxes = document.querySelectorAll('input[type="checkbox"]');

            radios.forEach(el => {
                el.disabled = true;
                console.log(el.checked, el);
            });

            checkBoxes.forEach(el => {
                el.disabled = true;
            });
            clearInterval(interval);

            alert("Vreme isteklo!");
        }

    }

    function init() {
        let counter = 1;
        let form = document.getElementById('form');

        form.addEventListener('submit', handleForm);

        let interval = setInterval(() => {
            startTimer(counter, interval);
            counter++;
        }, 1000);

    }

    window.addEventListener('load', init);
})();