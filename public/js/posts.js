function openModal() {
    document.getElementById('overlay').classList.remove('hidden'); // إظهار الخلفية السوداء

    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('postId').value = '';
    document.getElementById('title').value = '';
    document.getElementById('content').value = '';
    document.getElementById('modalTitle').innerText = 'Add Post';
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('overlay').classList.add('hidden'); // إخفاء الخلفية السوداء

}

function editPost(id) {
    fetch(`/admin/posts/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('overlay').classList.remove('hidden'); // إظهار الخلفية السوداء

            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('postId').value = data.id;
            document.getElementById('title').value = data.title;
            document.getElementById('content').value = data.content;
            document.getElementById('modalTitle').innerText = 'Edit Post';
        })
        .catch(error => console.error('Error fetching post data:', error));
}

function deletePost(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (confirm('Are you sure you want to delete this post?')) {
        fetch(`/admin/posts/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN':csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            location.reload();
        })
        .catch(error => console.error('Error deleting post:', error));
    }
}

// document.getElementById('postForm').addEventListener('submit', function(event) {
//     event.preventDefault();

//     const id = document.getElementById('postId').value;
//     const method = id ? 'PUT' : 'POST';
//     const url = id ? `/admin/posts/${id}` : '/admin/posts';
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//     fetch(url, {
//         method: method,
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': csrfToken
//         },
//         body: JSON.stringify({
//             title: document.getElementById('title').value,
//             content: document.getElementById('content').value
//         })
//     })
//     .then(response => response.json())
//     .then(data => {
//         closeModal();
//         location.reload();
//     })
//     .catch(error => console.error('Error saving post:', error));
// });
