function redirectToSignup() {
    window.location.href = "signup.php";
}

function validatePassword(password) {
    // Password should contain at least one number, one lowercase, one uppercase letter, and one special character.
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+}{"':;<>,.?/~`\\[\]\\\-]).{8,}$/;
    return passwordRegex.test(password);
}

function validateUsername(username) {
    // Username should not start with a capital letter.
    return /^[a-z]/.test(username);
}

function validateForm() {
    const username = document.getElementById("signupUsername").value;
    const password = document.getElementById("signupPassword").value;

    if (!validateUsername(username)) {
        alert("Username should not start with a capital letter.");
        return false;
    }

    if (!validatePassword(password)) {
        alert("Password should contain at least one number, one lowercase letter, one uppercase letter, and one special character.");
        return false;
    }

    return true;
}
