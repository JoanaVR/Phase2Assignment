
let title = document.getElementById("title");
let titleLabel = document.querySelector('label[for="title"]');

let content = document.getElementById("content");
let contentLabel = document.querySelector('label[for="content"]');


let form = document.getElementById("form");
let clickedButton = null;

form.addEventListener('submit', function(event)
{
    resetField(title, titleLabel);
    resetField(content, contentLabel);

    const clickedButton = event.submitter;

    if(title.value.trim() === '') 
    {
        highlightField(title, titleLabel);
        if(content.value.trim() === '') 
        {
            highlightField(content, contentLabel);
        }
        event.preventDefault();
        return;
    }
    if(content.value.trim() === '') 
    {
        highlightField(content, contentLabel);
        event.preventDefault();
        return;
    }

    if (clickedButton && clickedButton.value === "Post") 
    {
        //confirt witht the user if they want to post the form
        let confirmReset = confirm("Are you sure you want to post this blog?");
        if (!confirmReset) {
            event.preventDefault(); // Prevent the reset action if the user clicks "Cancel"
        }
    }

});

function highlightField(input, label) {
    let container = input.parentElement; // Get the <p> element that contains the input and label
    container.style.backgroundColor = 'red';
    container.style.padding = '2%';
    container.style.display = 'block';
    
    label.style.color = 'white';
    input.style.backgroundColor = 'white';
}

function resetField(input, label) {
    label.style.backgroundColor = '';
    label.style.color = '';
    label.style.padding = '';
    input.style.backgroundColor = '';
}

//le the user confirm weather they want to reset the form
form.addEventListener('reset', function(event) {
    let confirmReset = confirm("Are you sure you want to reset the form?");
    if (!confirmReset) {
        event.preventDefault(); // Prevent the reset action if the user clicks "Cancel"
    }
    
});