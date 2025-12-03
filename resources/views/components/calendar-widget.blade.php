<div class="calendar-widget bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-3 shadow-xl border border-white border-opacity-30 transition-all duration-300 hover:shadow-2xl">
    <div class="calendar-header flex justify-between items-center mb-2">
        <button id="prev-month" class="calendar-nav-btn text-white hover:text-yellow-300 transition-colors duration-300 p-1">
            <i class="fas fa-chevron-left text-sm"></i>
        </button>
        <h3 id="calendar-month-year" class="calendar-title text-white font-bold text-sm md:text-base whitespace-nowrap"></h3>
        <button id="next-month" class="calendar-nav-btn text-white hover:text-yellow-300 transition-colors duration-300 p-1">
            <i class="fas fa-chevron-right text-sm"></i>
        </button>
    </div>
    <div class="calendar-grid grid grid-cols-7 gap-1 mb-1">
        @foreach(['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'] as $day)
            <div class="calendar-day-header text-center text-white text-[0.6rem] xs:text-xs font-bold py-1">{{ $day }}</div>
        @endforeach
    </div>
    <div id="calendar-days" class="calendar-grid grid grid-cols-7 gap-1"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const dayNames = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    
    const calendarDays = document.getElementById('calendar-days');
    const calendarMonthYear = document.getElementById('calendar-month-year');
    const prevMonthBtn = document.getElementById('prev-month');
    const nextMonthBtn = document.getElementById('next-month');
    
    function renderCalendar(month, year) {
        // Clear the calendar
        calendarDays.innerHTML = '';
        
        // Set the month and year in the header
        calendarMonthYear.textContent = `${monthNames[month]} ${year}`;
        
        // Get the first day of the month
        const firstDay = new Date(year, month, 1).getDay();
        
        // Get the number of days in the month
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        // Get today's date for highlighting
        const today = new Date();
        const isCurrentMonth = today.getMonth() === month && today.getFullYear() === year;
        const todayDate = today.getDate();
        
        // Add empty cells for days before the first day of the month
        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'calendar-day text-center text-white text-opacity-30 text-xs py-1';
            calendarDays.appendChild(emptyCell);
        }
        
        // Add cells for each day of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day text-center text-white text-xs py-1 rounded-lg transition-all duration-300 cursor-pointer hover:bg-white hover:bg-opacity-30';
            
            if (isCurrentMonth && day === todayDate) {
                dayElement.classList.add('bg-yellow-400', 'text-gray-900', 'font-bold');
            }
            
            dayElement.textContent = day;
            
            // Add click event to show date details
            dayElement.addEventListener('click', function() {
                const clickedDate = new Date(year, month, day);
                const dateString = `${dayNames[clickedDate.getDay()]} ${day} ${monthNames[month]} ${year}`;
                alert(`Date sélectionnée: ${dateString}`);
            });
            
            calendarDays.appendChild(dayElement);
        }
    }
    
    // Initial render
    renderCalendar(currentMonth, currentYear);
    
    // Previous month button
    prevMonthBtn.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });
    
    // Next month button
    nextMonthBtn.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });
});
</script>

<style>
.calendar-widget {
    width: 280px;
    max-width: 100%;
}

@media (max-width: 768px) {
    .calendar-widget {
        width: 220px;
    }
    
    .calendar-title {
        font-size: 0.875rem;
    }
    
    .calendar-day-header,
    .calendar-day {
        font-size: 0.75rem;
        padding: 0.25rem 0;
    }
}
</style>