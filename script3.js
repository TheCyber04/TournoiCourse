//Script pour le formulaire

document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll('.form-step'); // Étapes
    const stepButtons = document.querySelectorAll('.progress-steps li'); // Boutons
    const nextButton = document.querySelector('.btn-next'); // Bouton suivant
    const prevButton = document.querySelector('.btn-prev'); // Bouton précédent
    const submitButton = document.querySelector('.btn-submit'); // Bouton soumettre
    let currentStep = 0;

    // Met à jour l'étape visible et les boutons
    function updateStep() {
        steps.forEach(step => step.classList.remove('active'));
        stepButtons.forEach(button => button.classList.remove('active'));

        steps[currentStep].classList.add('active');
        stepButtons[currentStep].classList.add('active');

        prevButton.disabled = currentStep === 0;
        nextButton.style.display = currentStep === steps.length - 1 ? 'none' : 'inline-block';
        submitButton.style.display = currentStep === steps.length - 1 ? 'inline-block' : 'none';
    }

    nextButton.addEventListener("click", function () {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateStep();
        }
    });

    prevButton.addEventListener("click", function () {
        if (currentStep > 0) {
            currentStep--;
            updateStep();
        }
    });

    updateStep();
});
