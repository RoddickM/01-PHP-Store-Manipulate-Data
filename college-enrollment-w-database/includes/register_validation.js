const form = document.getElementById('form');
const firstName = document.getElementById('first_name')

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    const firstName = firstName.value.trim();
    var letters = /^[A-Za-z]+$/

    if (firstName === ''){
        setError(firstName, 'Please enter your first name');
    }
    else if (firstName.value.match(letters)){
        setError(firstName, 'Please enter a valid first name');
    }
    else {
        setSuccess(email);
    }
};

