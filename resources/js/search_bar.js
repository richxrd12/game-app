document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('search_bar');
    const products = document.querySelectorAll('#products > a');

    searchBar.addEventListener('input', function () {
        const query = searchBar.value.toLowerCase();

        products.forEach(product => {
            const title = product.querySelector('h3')?.textContent.toLowerCase() || '';

            if (title.includes(query)) {
                if (product.classList.contains('hidden')) {
                    product.classList.remove('hidden');
                    
                    setTimeout(() => {
                        product.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                        product.classList.add('opacity-100', 'scale-100');
                    }, 10);
                }
            } else {
                if (!product.classList.contains('hidden')) {
                    product.classList.remove('opacity-100', 'scale-100');
                    product.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                    
                    product.addEventListener('transitionend', function handleTransitionEnd(event) {
                        if (product.classList.contains('opacity-0')) {
                            product.classList.add('hidden');
                        }
                        product.removeEventListener('transitionend', handleTransitionEnd);
                    });
                }
            }
        });
    });
});

