function replay() {
    let replayButtom = document.querySelectorAll('.reply a')
        // Creating Div
    let Div = document.createElement('div')
    Div.setAttribute('class', "comment mt-5 d-grid")
        // creating textarea
    let textArea = document.createElement('textarea')
    textArea.setAttribute('class', "form-control")
    textArea.setAttribute('rows', "5")
    textArea.innerText = "Your Comment";
    // creating Cancel buttons
    let cancelButton = document.createElement('button');
    cancelButton.setAttribute('class', "btn btn-danger pd-x-15 pd-y-6");
    cancelButton.innerText = "Cancel";

    let buttonDiv = document.createElement('div')
    buttonDiv.setAttribute('class', "btn-list ms-auto mt-2")

    // Creating submit button
    let submitButton = document.createElement('button');
    submitButton.setAttribute('class', "btn btn-success pd-x-15 pd-y-6 ms-3");
    submitButton.innerText = "Submit";

    // appending text are to div
    Div.append(textArea)
    Div.append(buttonDiv);
    buttonDiv.append(cancelButton);
    buttonDiv.append(submitButton);

    replayButtom.forEach((element, index) => {

        element.addEventListener('click', () => {
            let replay = $(element).parent()
            replay.append(Div)

            cancelButton.addEventListener('click', () => {
                Div.remove()
            })
        })
    })


}
replay()