// Variables globales
const daysContainer = document.querySelector(".jours");
const apresbtn = document.querySelector(".apres-btn");
const avantbtn = document.querySelector(".avant-btn");
const month = document.querySelector(".mois");
const aujbtn = document.querySelector(".auj-btn");

// Tableau de mois et jours
const months = [
    "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
    "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];

const jours = ["Lun", "Mar", "Mer", "Jeu", "Vend", "Sam", "Dim"];

// Dates et initialisation
const date = new Date();  // Contient la date et l'heure
let currentMonth = date.getMonth(); // Récupère le mois
let currentYear = date.getFullYear(); // Récupère l'année complète

// Fonction pour afficher la liste des courses
function renderCourses() {
    const listCoursesContainer = document.querySelector(".list-courses ul");
    listCoursesContainer.innerHTML = ""; // Effacer la liste existante

    // Boucler sur les courses et les afficher dans la liste
    courses.forEach(course => {
        const li = document.createElement('li');
        li.innerHTML = `<span class="date">${formatDate(course.date)}</span> - Courses ${course.title}`;
        listCoursesContainer.appendChild(li);
    });
}

// Formater la date en jour mois
function formatDate(dateString) {
    const dateObj = new Date(dateString);
    const day = dateObj.getDate();
    const month = months[dateObj.getMonth()];
    return `${day} ${month}`;
}

// Appeler la fonction pour afficher les courses
renderCourses();


// Fonction pour afficher dynamiquement le calendrier du mois en cours et mettre à jour les dates des courses
function renderCalendar() {
    date.setDate(1); // Réinitialiser la date au premier jour du mois
    const firstDay = new Date(currentYear, currentMonth, 1); // Premier jour du mois
    const lastDay = new Date(currentYear, currentMonth + 1, 0); // Dernier jour du mois
    const lastDayIndex = lastDay.getDay(); // Jour de la semaine du dernier jour
    const lastDayDate = lastDay.getDate(); // Numéro du dernier jour du mois
    const prevLastDay = new Date(currentYear, currentMonth, 0); // Dernier jour du mois précédent
    const prevLastDayDate = prevLastDay.getDate(); // Numéro du dernier jour du mois précédent
    const nextDays = 7 - lastDayIndex - 1; // Jours nécessaires pour compléter la semaine

    month.innerHTML = `${months[currentMonth]} ${currentYear}`;

    let days = "";

    // Jours précédents du mois
    for (let x = firstDay.getDay() - 1; x >= 0; x--) {
        days += `<div class="jour avant">${prevLastDayDate - x}</div>`;
    }

    // Jours du mois actuel
    for (let i = 1; i <= lastDayDate; i++) {
        const course = courses.find(c => {
            const courseDate = new Date(c.date);
            return courseDate.getDate() === i && courseDate.getMonth() === currentMonth && courseDate.getFullYear() === currentYear;
        });

        let isToday = (i === new Date().getDate() && currentMonth === new Date().getMonth() && currentYear === new Date().getFullYear());

        if (isToday) {
            days += `<div class="jour auj">${i}</div>`;
        } else if (course) {
            days += `<div class="jour course-day">${i}</div>`;
        } else {
            days += `<div class="jour">${i}</div>`;
        }
    }

    // Jours suivants du mois
    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="jour apres">${j}</div>`;
    }

    daysContainer.innerHTML = days;

    renderCourses();  // Mise à jour de la liste des courses
}



// Formater la date en jour mois
function formatDate(dateString) {
    const dateObj = new Date(dateString);
    const day = dateObj.getDate();
    const month = months[dateObj.getMonth()];
    return `${day} ${month}`;
}

// Initialiser le calendrier
renderCalendar();

// Navigation entre les mois
apresbtn.addEventListener("click", () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar();
});

avantbtn.addEventListener("click", () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    renderCalendar();
});

// Affichage du mois actuel
aujbtn.addEventListener("click", () => {
    currentMonth = date.getMonth();
    currentYear = date.getFullYear();
    renderCalendar();
});
