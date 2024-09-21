const previewImage = document.getElementById('previewImage');
const imageModal = document.getElementById('imageModal');
const closeModal = document.getElementById('closeModal');

previewImage.addEventListener('click', () => {
    imageModal.classList.remove('hidden');
});

closeModal.addEventListener('click', () => {
    imageModal.classList.add('hidden');
});

window.addEventListener('click', (e) => {
    if (e.target === imageModal) {
        imageModal.classList.add('hidden');
    }
});
