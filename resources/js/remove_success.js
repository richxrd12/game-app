document.addEventListener('DOMContentLoaded', function() {
    const successToast = document.getElementById('success');

    if (successToast) {
        setTimeout(function() {
            successToast.classList.add('opacity-0', '-translate-y-2');
            
            // Esperamos a que la transición termine para quitar el div
            successToast.addEventListener('transitionend', function() {
                successToast.remove();
            });
        }, 3000);
    }
});
