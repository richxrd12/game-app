document.addEventListener('DOMContentLoaded', function(){
    const buttonProfile = document.getElementById('profile');
    const hiddenFields = document.getElementById('hidden');
    const arrow = document.getElementById('arrow');
    
    buttonProfile.addEventListener('click', function(){
        hiddenFields.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    })
})