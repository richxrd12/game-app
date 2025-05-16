document.addEventListener('DOMContentLoaded', function(){
    const picture = document.getElementById('picture');
    const inputFile = document.getElementById('input_picture');

    const imageUploaded = document.getElementById('image_uploaded');

    picture.addEventListener('click', function(){
        inputFile.click();
    })

    inputFile.addEventListener('change', function(){
        imageUploaded.classList.remove('hidden');
    })
})