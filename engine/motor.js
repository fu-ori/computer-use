document.addEventListener("DOMContentLoaded", function() {
    const draggableBlocks = document.querySelectorAll('.block');
    const designArea = document.getElementById('design');
    
    draggableBlocks.forEach(block => {
        block.addEventListener('dragstart', function(event) {
            // Armazenar o conteúdo a ser arrastado
            event.dataTransfer.setData('text/html', block.dataset.content);
        });
    });

    // Adiciona o efeito de arrastar (dragover) na área de design
    designArea.addEventListener('dragover', function(event) {
        event.preventDefault();
        designArea.classList.add('drag-over');
    });

    // Remove o efeito de arrastar (dragover)
    designArea.addEventListener('dragleave', function(event) {
        designArea.classList.remove('drag-over');
    });

    // Lida com o evento de soltura (drop)
    designArea.addEventListener('drop', function(event) {
        event.preventDefault();
        designArea.classList.remove('drag-over');

        // Obtém o conteúdo arrastado
        const content = event.dataTransfer.getData('text/html');

        // Cria um novo elemento com o conteúdo arrastado e o adiciona na área de design
        const newElement = document.createElement('div');
        newElement.innerHTML = content;

        // Adiciona o elemento ao design
        designArea.appendChild(newElement);
    });
});
