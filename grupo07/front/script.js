let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');
//
function expandirConteudo(id) {
    var conteudo = document.getElementById(id);
    conteudo.classList.remove('texto-hidden');
}

function fecharConteudo(id) {
    var conteudo = document.getElementById(id);
    conteudo.classList.add('texto-hidden');
}

window.onscroll = () => {
    sections.forEach (sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if(top >= offset && top <offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('header nav a[href*=' +id+ ' ]').classList.add('active');
            });
        };
    });
};

//Area de comentários
document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('commentForm');
    const commentsContainer = document.getElementById('commentsContainer');

    commentForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(commentForm);

        fetch('../back/data/comments.php', { // Ajuste o caminho aqui
            method: 'POST',
            body: formData
        })
        .then(response => response.text()) // Mudança de .json() para .text() para depuração
        .then(data => {
            console.log(data); // Saída de depuração
            loadComments();
            commentForm.reset();
        })
        .catch(error => console.error('Error:', error));
    });

    function loadComments() {
        fetch('../back/data/comments.php') // Ajuste o caminho aqui
        .then(response => response.json())
        .then(data => displayComments(data))
        .catch(error => console.error('Error:', error));
    }

    function displayComments(comments) {
        commentsContainer.innerHTML = '';
        comments.forEach(comment => {
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment');
            commentDiv.innerHTML = `
                <h1>${comment.username}</h1>
                <p>${comment.comment}</p>
                <small>${new Date(comment.created_at).toLocaleString()}</small>
            `;
            commentsContainer.appendChild(commentDiv);
        });
    }

    loadComments();
});
