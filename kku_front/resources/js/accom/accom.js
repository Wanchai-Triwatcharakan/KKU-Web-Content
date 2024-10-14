const previewImages = document.querySelectorAll('.previewImage');
const imageModal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');

previewImages.forEach(previewImage => {
    previewImage.addEventListener('click', () => {
        imageModal.classList.remove('hidden');
        // Set the image in the modal based on the clicked image
        const imgSrc = previewImage.querySelector('img').src;
        document.getElementById('modalImage').src = imgSrc;
    });
});

closeModal.addEventListener('click', () => {
    imageModal.classList.add('hidden');
});

window.addEventListener('click', (e) => {
    if (e.target === imageModal) {
        imageModal.classList.add('hidden');
    }
});
