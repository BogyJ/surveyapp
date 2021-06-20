(function () {
    const uploadBtn = document.getElementById('upload-btn');
    const formFile = document.getElementById('formFile');
    const form = document.getElementById('form');

    uploadBtn.addEventListener('click', (e) => {
        e.preventDefault();

        let fileName = formFile.files[0].name;
        let fileExtension = fileName.split('.').pop();
        console.log(fileExtension);

        if (fileExtension.includes('jpg') || fileExtension.includes('jpeg') || fileExtension.includes('png')) {
            form.submit();
        } else {
            alert("Fajl mora biti PNG, JPEG ili JPG");
        }
    });
})();
