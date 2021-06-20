(function () {
    const selectOptions = document.getElementById("question-type");
    const inputElementsDiv = document.getElementById("input-elements");
    const addQuestionBtn = document.getElementById("add-question-btn");
    let id = 1;

    addQuestionBtn.addEventListener('click', () => {
        document.getElementById('question-form').submit();
    });

    function getNextId() {
        return id++;
    }

    function createElements(e) {
        if(e.preventDefault) { // ako je event listener trigerovan novokreiranim dugmetom --> button.addEventListener('click', createElements)
            e.preventDefault();
        }

        let currentId = getNextId().toString();

        let divFormGroup = document.createElement('div');
        divFormGroup.classList.add('form-group');

        let label = document.createElement('label');
        label.innerText = 'Unesite odgovor:';
        label.htmlFor = 'answer-' + currentId;

        let input = document.createElement('input');
        input.type = 'text';
        input.classList.add('form-control');
        input.id = 'answer-' + currentId;
        input.name = 'answers[]';

        if (!document.getElementById('add-answer-btn')) {
            let button = document.createElement('button');

            button.innerHTML = 'Dodaj odgovor';
            button.id = 'add-answer-btn';

            button.classList.add('btn');
            button.classList.add('btn-outline-secondary');
            button.classList.add('mb-3');
            button.classList.add('d-block');
            button.addEventListener('click', createElements);

            divFormGroup.appendChild(button);
        }

        divFormGroup.appendChild(label);
        divFormGroup.appendChild(input);
        inputElementsDiv.appendChild(divFormGroup);
    }

    selectOptions.addEventListener('change', () => {
        createElements(selectOptions.value);
        selectOptions.style.display = "none";
    });

})();
