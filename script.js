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
const date = new Date();
let currentMonth = date.getMonth();
let currentYear = date.getFullYear();

// Liste des courses (utilise des dates au format 'jour mois')
const courses = [
    { date: '2025-03-05', title: 'Course A' },
    { date: '2025-03-12', title: 'Course B' },
    { date: '2025-03-19', title: 'Course C' },
    { date: '2025-03-02', title: 'Course D' },
    { date: '2025-03-10', title: 'Course E' }
];

// Fonction pour afficher le calendrier
function renderCalendar() {
    date.setDate(1);
    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const lastDayIndex = lastDay.getDay();
    const lastDayDate = lastDay.getDate();
    const prevLastDay = new Date(currentYear, currentMonth, 0);
    const prevLastDayDate = prevLastDay.getDate();
    const nextDays = 7 - lastDayIndex - 1;

    month.innerHTML = `${months[currentMonth]} ${currentYear}`;

    let days = "";

    // Jours précédents du mois
    for (let x = firstDay.getDate(); x > 0; x--) {
        days += `<div class="jour avant">${prevLastDayDate - x + 1}</div>`;
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

// Afficher la liste des courses
function renderCourses() {
    const listCoursesContainer = document.querySelector(".list-courses ul");
    listCoursesContainer.innerHTML = ""; // Effacer la liste existante

    const filteredCourses = courses.filter(course => {
        const courseDate = new Date(course.date);
        return courseDate.getMonth() === currentMonth && courseDate.getFullYear() === currentYear;
    });

    filteredCourses.forEach(course => {
        const li = document.createElement('li');
        li.innerHTML = `<span class="date">${formatDate(course.date)}</span> - ${course.title}`;
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


