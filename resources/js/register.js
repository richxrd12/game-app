document.addEventListener('DOMContentLoaded', function(){
    const buttonSubmit = document.getElementById('button_submit');
    const button = document.getElementById('button');

    button.addEventListener('click', function(){
        buttonSubmit.click();
    });
});