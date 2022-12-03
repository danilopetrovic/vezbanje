/*
Vanilla Multiple File Upload Progress Bar Tutorial JS Ajax PHP
Adam Khoury
https://www.youtube.com/watch?v=qoujtAnI4Fc
*/

function _(id) {
    return document.getElementById(id)
}

button.addEventListener('click', funkcija)

function funkcija(e) {
    e.preventDefault();
    const output = document.getElementById('output');
    const userFiles = document.getElementById('userFiles');
    const formData = new FormData();

    // console.log('userFiles.files ', userFiles.files);
    // console.log('userFiles.files.length ', userFiles.files.length)

    for (let i = 0; i < userFiles.files.length; i++) {
        formData.append(`file_${i}`, userFiles.files[i]);
    }
    formData.append("username", "Adam Khoury");
    console.log('formData: ', formData);

    const ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler);
    ajax.addEventListener("load", completeHandler);
    ajax.open("POST", "fileUploadPHP.php");
    ajax.send(formData);

    output.innerText = '';
    for (const [key, value] of formData) {
        if (key === "username") {
            output.innerHTML += `<b>key: </b>${key}, <b>${key}: </b>${value}`;
            continue;
        }
        output.innerHTML += `<b>key: </b>${key}, <b>name: </b>${value.name}, <b>size: </b> ${value.size}, <b>type: </b> ${value.type}<br>`;
    }
}

function progressHandler(e) {
    _("loaded_n_total").innerHTML = `uploaded ${e.loaded} bytes of ${e.total}`;
    let percent = (e.loaded / e.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = `${Math.round(percent)}% uploaded... Please wait!`;
}

function completeHandler(e) {
    // you can empty or clear html file input elements in your completeHandler function by using either
    // _("upload_form").reset();
    // or
    // target_input.value = "";
    _("status").innerHTML = e.target.responseText
    _("progressBar").value = 0;
}