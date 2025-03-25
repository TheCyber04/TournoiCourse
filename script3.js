document.addEventListener("DOMContentLoaded", function () {
    // Récupérer les éléments de la liste déroulante et des athlètes sélectionnés
    const athletesSelect = document.getElementById("athletesSelect");
    const selectedAthletesList = document.getElementById("selectedAthletes");
    const warning = document.getElementById("warning");
    const maxSelection = 11;
    const generateNumbersCheckbox = document.getElementById("generateNumbers");

    // Fonction pour générer un numéro de dossard aléatoire
    function generateDossardNumber() {
        return Math.floor(Math.random() * 1000) + 1; // Génère un numéro entre 1 et 1000
    }

    // Fonction pour afficher les athlètes sélectionnés
    function updateSelectedAthletes() {
        const selectedOptions = Array.from(athletesSelect.selectedOptions);
        selectedAthletesList.innerHTML = ""; // Réinitialiser la liste avant d'ajouter les nouvelles options

        // Vérification du nombre maximum de sélection
        if (selectedOptions.length > maxSelection) {
            warning.innerText = "Vous pouvez sélectionner au maximum " + maxSelection + " athlètes.";
            athletesSelect.selectedOptions[selectedOptions.length - 1].selected = false; // Désélectionner le dernier
        } else {
            warning.innerText = ""; // Effacer l'avertissement si la sélection est valide
        }

        // Ajouter chaque athlète sélectionné à la liste
        selectedOptions.forEach(option => {
            const li = document.createElement("li");
            li.textContent = option.text; // Afficher le nom complet de l'athlète

            // Si la checkbox est cochée, ajouter un numéro de dossard
            if (generateNumbersCheckbox.checked) {
                const dossardNumber = generateDossardNumber();
                const dossardText = document.createElement("span");
                dossardText.textContent = ` - Numéro de dossard: ${dossardNumber}`;
                li.appendChild(dossardText);
            }

            // Bouton de suppression
            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Supprimer";
            removeBtn.onclick = function () {
                option.selected = false; // Désélectionner l'athlète
                updateSelectedAthletes(); // Mettre à jour la liste affichée
            };

            li.appendChild(removeBtn);
            selectedAthletesList.appendChild(li);
        });
    }

    // Écouteur d'événements sur la liste déroulante
    athletesSelect.addEventListener("change", updateSelectedAthletes);

    // Écouteur d'événements sur la checkbox pour générer les numéros de dossard
    generateNumbersCheckbox.addEventListener("change", updateSelectedAthletes);

    // Appel initial pour afficher les athlètes sélectionnés
    updateSelectedAthletes();
});
