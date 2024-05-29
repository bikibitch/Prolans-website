document.addEventListener('DOMContentLoaded', function() {

    // Show modal
    if (location.search.split('showModal')[1]) {
        document.querySelector('#successModal').style.display = 'block'
    }

    // Sticky Header
    var header = document.querySelector('Header');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Photo credits in footer
    var creditElement = document.getElementById('photo-credits');
    if (creditElement) {
        var url = creditElement.getAttribute('data-url');
        var text = creditElement.getAttribute('data-text');
        if (url) {
            var linkElement = document.getElementById('photo-credit-link');
            linkElement.href = url;
        }
        if (text) {
            linkElement.textContent = text;
        }
    }

    // Button in instructions
    const toggleButton = document.getElementById("toggleButton");
    const toggleContent = document.getElementById("toggleContent");
    const arrow = document.getElementById("arrow");

    toggleButton?.addEventListener("click", function() {
        if (toggleContent.classList.contains("hidden")) {
            toggleContent.classList.remove("hidden");
            arrow.classList.remove("down");
            arrow.classList.add("up");
        } else {
            toggleContent.classList.add("hidden");
            arrow.classList.remove("up");
            arrow.classList.add("down");
        }
    });

    // Form formatting
    const form = document.getElementById("send-form");
    const nameInput = document.getElementById("name");
    const stNameInput = document.getElementById("stName");
    const prNameInput = document.getElementById("prName");
    const surnameInput = document.getElementById("surname");
    const stSurnameInput = document.getElementById("stSurname");
    const prSurnameInput = document.getElementById("prSurname");
    const emailInput = document.getElementById("email");
    const numberInput = document.getElementById("number");
    const stNumberInput = document.getElementById("stNumber");
    const prNumberInput = document.getElementById("prNumber");
    const messageTextInput = document.getElementById("messageText");
    const chosen_coursesInput = document.getElementById("chosen_courses");

    const nameError = document.getElementById("name-error");
    const stNameError = document.getElementById("stName-error");
    const prNameError = document.getElementById("prName-error");
    const surnameError = document.getElementById("surname-error");
    const stSurnameError = document.getElementById("stSurname-error");
    const prSurnameError = document.getElementById("prSurname-error");
    const emailError = document.getElementById("email-error");
    const numberError = document.getElementById("number-error");
    const stNumberError = document.getElementById("stNumber-error");
    const prNumberError = document.getElementById("prNumber-error");
    const messageTextError = document.getElementById("messageText-error");
    const chosen_coursesError = document.getElementById("chosen_courses-error");

    form.addEventListener("submit", function(event) {
        let valid = true;
    
        // Validate name
        if (nameInput?.value?.trim() === "") {
            nameInput.classList.add("invalid");
            nameError.textContent = "Пожалуйста, введите имя.";
            nameError.style.display = "block";
            valid = false;
        } else if (nameInput) {
            nameInput.classList.remove("invalid");
            nameInput.classList.add("valid");
            nameError.style.display = "none";
        }

        // Validate student name
        if (stNameInput?.value?.trim() === "") {
            stNameInput.classList.add("invalid");
            stNameError.textContent = "Пожалуйста, введите имя.";
            stNameError.style.display = "block";
            valid = false;
        } else if (stNameInput) {
            stNameInput.classList.remove("invalid");
            stNameInput.classList.add("valid");
            stNameError.style.display = "none";
        }

        // Validate parent name
        if (prNameInput?.value?.trim() === "") {
            prNameInput.classList.add("invalid");
            prNameError.textContent = "Пожалуйста, введите имя.";
            prNameError.style.display = "block";
            valid = false;
        } else if (prNameInput) {
            prNameInput.classList.remove("invalid");
            prNameInput.classList.add("valid");
            prNameError.style.display = "none";
        }

        // Validate surname
        if (surnameInput?.value?.trim() === "") {
            surnameInput.classList.add("invalid");
            surnameError.textContent = "Пожалуйста, введите фамилию.";
            surnameError.style.display = "block";
            valid = false;
        } else if(surnameInput) {
            surnameInput.classList.remove("invalid");
            surnameInput.classList.add("valid");
            surnameError.style.display = "none";
        }

        // Validate student surname
        if (stSurnameInput?.value?.trim() === "") {
            stSurnameInput.classList.add("invalid");
            stSurnameError.textContent = "Пожалуйста, введите фамилию.";
            stSurnameError.style.display = "block";
            valid = false;
        } else if (stSurnameInput) {
            stSurnameInput.classList.remove("invalid");
            stSurnameInput.classList.add("valid");
            stSurnameError.style.display = "none";
        }

        // Validate parent surname
        if (prSurnameInput?.value?.trim() === "") {
            prSurnameInput.classList.add("invalid");
            prSurnameError.textContent = "Пожалуйста, введите фамилию.";
            prSurnameError.style.display = "block";
            valid = false;
        } else if (prSurnameInput) {
            prSurnameInput.classList.remove("invalid");
            prSurnameInput.classList.add("valid");
            prSurnameError.style.display = "none";
        }

        // Validate email
        if (!validateEmail(emailInput.value)) {
            emailInput.classList.add("invalid");
            emailError.textContent = "Пожалуйста, введите корректный email.";
            emailError.style.display = "block";
            valid = false;
        } else if (emailInput) {
            emailInput.classList.remove("invalid");
            emailInput.classList.add("valid");
            emailError.style.display = "none";
        }

        // Validate number
        if (numberInput?.value?.trim() === "") {
            numberInput.classList.add("invalid");
            numberError.textContent = "Пожалуйста, введите телефон.";
            numberError.style.display = "block";
            valid = false;
        } else if (numberInput) {
            numberInput.classList.remove("invalid");
            numberInput.classList.add("valid");
            numberError.style.display = "none";
        }

        // Validate student number
        if (stNumberInput?.value?.trim() === "") {
            stNumberInput.classList.add("invalid");
            stNumberError.textContent = "Пожалуйста, введите телефон.";
            stNumberError.style.display = "block";
            valid = false;
        } else if (stNumberInput) {
            stNumberInput.classList.remove("invalid");
            stNumberInput.classList.add("valid");
            stNumberError.style.display = "none";
        }

        // Validate parent number
        if (prNumberInput?.value?.trim() === "") {
            prNumberInput.classList.add("invalid");
            prNumberError.textContent = "Пожалуйста, введите телефон.";
            prNumberError.style.display = "block";
            valid = false;
        } else if (prNumberInput) {
            prNumberInput.classList.remove("invalid");
            prNumberInput.classList.add("valid");
            prNumberError.style.display = "none";
        }
        // Validate message text
        if (messageTextInput?.value?.trim() === "") {
            messageTextInput.classList.add("invalid");
            messageTextError.textContent = "Пожалуйста, введите сообщение";
            messageTextError.style.display = "block";
            valid = false;
        } else if (messageTextInput) {
            messageTextInput.classList.remove("invalid");
            messageTextInput.classList.add("valid");
            messageTextError.style.display = "none";
        }

        // Validate chosen courses
        if (chosen_coursesInput?.selectedOptions?.length === 0) {
            chosen_coursesInput.classList.add("invalid");
            chosen_coursesError.textContent = "Пожалуйста, выберите хотя бы один курс.";
            chosen_coursesError.style.display = "block";
            valid = false;
        } else if (chosen_coursesInput){
            chosen_coursesInput.classList.remove("invalid");
            chosen_coursesInput.classList.add("valid");
            chosen_coursesError.style.display = "none";
        }
        
        if (!valid) {
            event.preventDefault();
        } 
    });

    // Email validation function
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }


    // Filter button selection
    function selectButton(button) {
        var buttons = document.querySelectorAll('.filter-button');
        buttons.forEach(function(btn) {
            btn.classList.remove('selected');
        });

        button.classList.add('selected');
    }

    var modal = document.getElementById('successModal');
    var closeButton = document.querySelector('#successModal .close');

    const showModal = () => {
        const modal = document.querySelector('#successModal');
        modal.style.display = 'block';
    }

    // Closing modal
    closeButton?.addEventListener('click', function() {
        hideModal();
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            hideModal();
        }
    });
});

function hideModal() {
    const currentUrl =location.href.split('&showModal')[0]
    document.querySelector('#successModal').style.display = 'none'; 
    window.location.replace(currentUrl)
}