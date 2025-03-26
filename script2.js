//Script pour gérer les athlétes

document.addEventListener("DOMContentLoaded", function () {
    // Récupérer les éléments nécessaires
    const athletesSelect = document.getElementById("athletesSelect");
    const selectedAthletesList = document.getElementById("selectedAthletes");
    const generateNumbersCheckbox = document.getElementById("generateNumbers");
    const warning = document.getElementById("warning");
    const maxSelection = 11;

    // Générer un numéro de dossard aléatoire
    function generateDossardNumber() {
        return Math.floor(Math.random() * 1000) + 1;
    }

    // Mettre à jour l'affichage des athlètes sélectionnés
    function updateSelectedAthletes() {
        const selectedOptions = Array.from(athletesSelect.selectedOptions);
        selectedAthletesList.innerHTML = ""; // Réinitialisation

        if (selectedOptions.length > maxSelection) {
            warning.innerText = `Vous pouvez sélectionner au maximum ${maxSelection} athlètes.`;
            athletesSelect.selectedOptions[selectedOptions.length - 1].selected = false;
        } else {
            warning.innerText = "";
        }

        selectedOptions.forEach(option => {
            const li = document.createElement("li");
            li.textContent = option.text;

            if (generateNumbersCheckbox.checked) {
                const dossardNumber = generateDossardNumber();
                const dossardText = document.createElement("span");
                dossardText.textContent = ` - Numéro de dossard: ${dossardNumber}`;
                li.appendChild(dossardText);
            }

            const removeBtn = document.createElement("button");
            removeBtn.textContent = "Supprimer";
            removeBtn.onclick = function () {
                option.selected = false;
                updateSelectedAthletes();
            };

            li.appendChild(removeBtn);
            selectedAthletesList.appendChild(li);
        });
    }

    athletesSelect.addEventListener("change", updateSelectedAthletes);
    generateNumbersCheckbox.addEventListener("change", updateSelectedAthletes);

    updateSelectedAthletes();
});
