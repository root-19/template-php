const toggleLink = document.getElementById('toggleLink');
const signupForm = document.getElementById('signupForm');
const signinForm = document.getElementById('signinForm');
const formTitle = document.getElementById('formTitle');
const toggleText = document.getElementById('toggleText');

toggleLink.addEventListener('click', (e) => {
    e.preventDefault();
    
    if (signupForm.classList.contains('show')) {
        signupForm.classList.remove('show');
        signupForm.classList.add('hidden');
        signinForm.classList.remove('hidden');
        setTimeout(() => {
            signinForm.classList.add('show');
        }, 50); // Delay to allow for transition effect
        formTitle.textContent = 'Sign In';
        toggleText.innerHTML = `Already have an account? <a href="#" class="text-indigo-600 hover:underline" id="toggleLink">Sign Up</a>`;
    } else {
        signinForm.classList.remove('show');
        signinForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
        setTimeout(() => {
            signupForm.classList.add('show');
        }, 50); // Delay to allow for transition effect
        formTitle.textContent = 'Sign Up';
        toggleText.innerHTML = `Don't have an account? <a href="#" class="text-indigo-600 hover:underline" id="toggleLink">Sign In</a>`;
    }
});