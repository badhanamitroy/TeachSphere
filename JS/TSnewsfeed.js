const postButton = document.querySelector('.post-btn');
const postsSection = document.querySelector('.posts-section');

postButton.addEventListener('click', () => {
  const postBody = document.querySelector('.post-body').value;
  if (postBody.trim() !== '') {
    const newPost = document.createElement('div');
    newPost.classList.add('post-card');
    newPost.innerHTML = `<h3>New Post</h3><p>${postBody}</p>`;
    postsSection.prepend(newPost);

    // Clear textarea
    document.querySelector('.post-body').value = '';

    // Add slide-in animation
    newPost.style.opacity = '0';
    newPost.style.transform = 'translateY(20px)';
    setTimeout(() => {
      newPost.style.transition = 'all 0.5s ease';
      newPost.style.opacity = '1';
      newPost.style.transform = 'translateY(0)';
    }, 10);
  }
});