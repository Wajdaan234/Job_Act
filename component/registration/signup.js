const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// document.addEventListener('DOMContentLoaded', () => {
//     // Example JavaScript for debugging
//     const loginButton = document.getElementById('login');
//     const registerButton = document.getElementById('register');

//     if (loginButton) {
//         loginButton.addEventListener('click', (e) => {
//             e.preventDefault();
//             document.getElementById('container').classList.add('active');
//         });
//     }

//     if (registerButton) {
//         registerButton.addEventListener('click', (e) => {
//             e.preventDefault();
//             document.getElementById('container').classList.remove('active');
//         });
//     }
// });
