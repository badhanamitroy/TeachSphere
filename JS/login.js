document.addEventListener('DOMContentLoaded', () => {
    const teacherLoginBtn = document.getElementById('teacher-login-btn');
    const seekerLoginBtn = document.getElementById('seeker-login-btn');
    const teacherLoginForm = document.querySelector('.teacher-login-form');
    const seekerLoginForm = document.querySelector('.seeker-login-form');

    teacherLoginBtn.classList.add('active');
    teacherLoginForm.classList.add('active');

    teacherLoginBtn.addEventListener('click', () => {
        teacherLoginBtn.classList.add('active');
        seekerLoginBtn.classList.remove('active');
        teacherLoginForm.classList.add('active');
        seekerLoginForm.classList.remove('active');
    });

    seekerLoginBtn.addEventListener('click', () => {
        seekerLoginBtn.classList.add('active');
        teacherLoginBtn.classList.remove('active');
        seekerLoginForm.classList.add('active');
        teacherLoginForm.classList.remove('active');
    });
});
