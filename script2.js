document.addEventListener('DOMContentLoaded', function () {
    const steps = document.querySelectorAll('.form-step'); // Toutes les étapes
    const stepButtons = document.querySelectorAll('.progress-steps li'); // Les boutons d'étape
    const nextButton = document.querySelector('.btn-next'); // Bouton suivant
    const prevButton = document.querySelector('.btn-prev'); // Bouton retour
    const submitButton = document.querySelector('.btn-submit'); // Bouton soumettre

    let currentStep = 0; // L'index de l'étape actuelle (0 = première étape)

    // Fonction pour afficher l'étape active et mettre à jour les boutons d'étape
    function updateStep() {
        // Cacher toutes les étapes
        steps.forEach(step => step.classList.remove('active'));
        stepButtons.forEach(button => button.classList.remove('active')); // Retirer la classe active des boutons d'étapes
        
        // Afficher l'étape actuelle
        steps[currentStep].classList.add('active');
        stepButtons[currentStep].classList.add('active'); // Ajouter la classe active au bouton correspondant

        // Mise à jour des boutons
        if (currentStep === 0) {
            prevButton.disabled = true; // Désactive le bouton retour à la première étape
        } else {
            prevButton.disabled = false; // Active le bouton retour
        }

        if (currentStep === steps.length - 1) {
            nextButton.style.display = 'none'; // Cache le bouton suivant à la dernière étape
            submitButton.style.display = 'inline-block'; // Affiche le bouton soumettre
        } else {
            nextButton.style.display = 'inline-block'; // Affiche le bouton suivant
            submitButton.style.display = 'none'; // Cache le bouton soumettre
        }
    }

    // Fonction pour passer à l'étape suivante
    nextButton.addEventListener('click', function () {
        if (currentStep < steps.length - 1) {
            currentStep++; // Passer à l'étape suivante
            updateStep();
        }
    });

    // Fonction pour revenir à l'étape précédente
    prevButton.addEventListener('click', function () {
        if (currentStep > 0) {
            currentStep--; // Revenir à l'étape précédente
            updateStep();
        }
    });

    // Appeler la fonction initiale pour mettre à jour l'étape au chargement de la page
    updateStep();
});

document.addEventListener("DOMContentLoaded", function () {
    // Récupérer l'élément de la liste déroulante
    const athletesSelect = document.getElementById("athletesSelect");
    // Récupérer l'élément où les athlètes sélectionnés seront affichés
    const selectedAthletesList = document.getElementById("selectedAthletes");
    // Récupérer la checkbox pour attribuer les numéros de dossard
    const generateNumbersCheckbox = document.getElementById("generateNumbers");
    
    // Fonction pour générer un numéro de dossard aléatoire
    function generateDossardNumber() {
        return Math.floor(Math.random() * 1000) + 1; // Génère un numéro entre 1 et 1000
    }

    // Fonction pour afficher les athlètes sélectionnés et générer des numéros de dossard si la checkbox est cochée
    function updateSelectedAthletes() {
        const selectedOptions = athletesSelect.selectedOptions;
        selectedAthletesList.innerHTML = ''; // Réinitialiser la liste avant d'ajouter les nouvelles options
        
        // Ajouter chaque athlète sélectionné à la liste
        Array.from(selectedOptions).forEach(option => {
            const listItem = document.createElement("li");
            listItem.textContent = option.text; // Afficher le nom complet de l'athlète
            
            // Vérifier si la checkbox est cochée
            if (generateNumbersCheckbox.checked) {
                // Générer et afficher le numéro de dossard
                const dossardNumber = generateDossardNumber();
                const dossardText = document.createElement("span");
                dossardText.textContent = ` - Numéro de dossard: ${dossardNumber}`;
                listItem.appendChild(dossardText);
            }
            
            selectedAthletesList.appendChild(listItem);
        });
    }
    
    // Ajouter un écouteur d'événements pour mettre à jour la liste des athlètes sélectionnés
    athletesSelect.addEventListener("change", updateSelectedAthletes);
    
    // Ajouter un écouteur d'événements pour mettre à jour la liste lorsqu'on coche/décoche la checkbox
    generateNumbersCheckbox.addEventListener("change", updateSelectedAthletes);
    
    // Appeler la fonction initiale pour afficher les athlètes sélectionnés
    updateSelectedAthletes();
});
