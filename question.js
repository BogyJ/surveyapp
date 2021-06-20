(function () {
    const selectOptions = document.getElementById("question-type-1");
    const inputElementsDiv = document.getElementById("input-elements");
    const addQuestionBtn = document.getElementById("add-question-btn");
    const addSurveyBtn = document.getElementById("add-survey-btn");
    const formFile = document.getElementById("file-upload");
    const form = document.getElementById("survey-form");
    let questionId = 1;
    let answerId = 1;

    addSurveyBtn.addEventListener("click", (e) => {
        e.preventDefault();

        let fileName = formFile.files[0].name;
        let fileExtension = fileName.split(".").pop();

        if (fileExtension.includes("jpg") || fileExtension.includes("jpeg") || fileExtension.includes("png")) {
            form.submit();
        } else {
            alert("Fajl mora biti JPG, JPEG ili PNG");
        }
    });

    function getQuestionNextId() {
        return ++questionId;
    }

    function getAnswerNextId() {
        return answerId++;
    }

    function createQuestionElements() {
        let divFirstFormGroup = document.createElement('div');
        let labelFirstFormGroup = document.createElement('label');
        let inputFirstFormGroup = document.createElement('input');
        let currentId = getQuestionNextId().toString();

        labelFirstFormGroup.innerText = 'Pitanje:';
        labelFirstFormGroup.htmlFor = 'question-title-' + currentId;

        inputFirstFormGroup.type = 'text';
        inputFirstFormGroup.classList.add('form-control');
        inputFirstFormGroup.id = 'question-title-' + currentId;
        inputFirstFormGroup.name = 'questionTitle[]';

        divFirstFormGroup.appendChild(labelFirstFormGroup);
        divFirstFormGroup.appendChild(inputFirstFormGroup);

        let hr = document.createElement('hr');
        hr.classList.add('my-4');

        divFirstFormGroup.insertAdjacentElement('afterbegin', hr);

        inputElementsDiv.appendChild(divFirstFormGroup);

        let divSecondFormGroup = document.createElement('div');
        let selectSecondFormGroup = document.createElement('select');
        let firstOptionSecondFormGroup = document.createElement('option');
        let secondOptionSecondFormGroup = document.createElement('option');
        let thirdOptionSecondFormGroup = document.createElement('option');
        let fourthOptionSecondFormGroup = document.createElement('option');

        selectSecondFormGroup.addEventListener('change', (e) => {
            createAnswerElements(e);
            selectSecondFormGroup.style.display = "none";
        });

        selectSecondFormGroup.classList.add('custom-select');
        selectSecondFormGroup.classList.add('mt-3');
        selectSecondFormGroup.classList.add('mb-3');
        selectSecondFormGroup.name = 'question-type-' + currentId;
        selectSecondFormGroup.id = 'question-type-' + currentId;

        firstOptionSecondFormGroup.value = 'none';
        firstOptionSecondFormGroup.innerText = '--- Izaberite format odgovora na pitanje ---';
        selectSecondFormGroup.appendChild(firstOptionSecondFormGroup);

        secondOptionSecondFormGroup.value = 'radio';
        secondOptionSecondFormGroup.innerText = 'Radio';
        selectSecondFormGroup.appendChild(secondOptionSecondFormGroup);

        thirdOptionSecondFormGroup.value = 'checkbox';
        thirdOptionSecondFormGroup.innerText = 'Checkbox';
        selectSecondFormGroup.appendChild(thirdOptionSecondFormGroup);

        fourthOptionSecondFormGroup.value = 'text';
        fourthOptionSecondFormGroup.innerText = 'Tekst';
        selectSecondFormGroup.appendChild(fourthOptionSecondFormGroup);

        divSecondFormGroup.appendChild(selectSecondFormGroup);
        inputElementsDiv.appendChild(divSecondFormGroup);
    }

    function createAnswerElements(e) {
        if(e.preventDefault) { // ako je event listener trigerovan novokreiranim dugmetom --> button.addEventListener('click', createElements)
            e.preventDefault();
        }

        let currentId = getAnswerNextId().toString();
        questionId = questionId.toString();

        let divFormGroup = document.createElement('div');
        divFormGroup.classList.add('form-group');

        let label = document.createElement('label');
        label.innerText = 'Unesite odgovor:';
        label.htmlFor = 'answer-' + currentId;

        let input = document.createElement('input');
        input.type = 'text';
        input.classList.add('form-control');
        input.id = 'answer-' + currentId;
        input.name = `answers[${questionId}][]`;

        if (!document.getElementById('add-answer-btn-' + questionId)) {
            let button = document.createElement('button');

            button.innerHTML = 'Dodaj odgovor';
            button.id = 'add-answer-btn-' + questionId;

            button.classList.add('btn');
            button.classList.add('btn-outline-secondary');
            button.classList.add('mb-3');
            button.classList.add('mt-3');
            button.classList.add('d-block');
            button.addEventListener('click', createAnswerElements);

            divFormGroup.appendChild(button);
        }

        divFormGroup.appendChild(label);
        divFormGroup.appendChild(input);
        inputElementsDiv.appendChild(divFormGroup);
    }

    selectOptions.addEventListener('change', (e) => {
        createAnswerElements(e);
        selectOptions.style.display = "none";
    });

    addQuestionBtn.addEventListener('click', (e) => {
        e.preventDefault();

        createQuestionElements();
    });

})();
