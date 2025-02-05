document.addEventListener('DOMContentLoaded', () => {
    const teacherRegBtn = document.getElementById('teacher-reg-btn');
    const seekerRegBtn = document.getElementById('seeker-reg-btn');
    const teacherRegForm = document.querySelector('.teacher-reg-form');
    const seekerRegForm = document.querySelector('.seeker-reg-form');
   
    teacherRegBtn.classList.add('active');
    teacherRegForm.classList.add('active');

    teacherRegBtn.addEventListener('click', () => {
        teacherRegBtn.classList.add('active');
        seekerRegBtn.classList.remove('active');
        teacherRegForm.classList.add('active');
        seekerRegForm.classList.remove('active');
    });

    seekerRegBtn.addEventListener('click', () => {
        seekerRegBtn.classList.add('active');
        teacherRegBtn.classList.remove('active');
        seekerRegForm.classList.add('active');
        teacherRegForm.classList.remove('active');
    });
});
