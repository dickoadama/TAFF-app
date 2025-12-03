<div class="clock-widget bg-white bg-opacity-20 backdrop-blur-lg rounded-xl p-2 shadow-xl border border-white border-opacity-30 transition-all duration-300 hover:shadow-2xl">
    <div class="flex items-center justify-center">
        <div class="digital-clock text-white font-mono font-bold text-base md:text-lg">
            <span id="hours" class="bg-black bg-opacity-30 px-1 py-0.5 rounded text-sm md:text-base">00</span>
            <span class="mx-0.5 md:mx-1">:</span>
            <span id="minutes" class="bg-black bg-opacity-30 px-1 py-0.5 rounded text-sm md:text-base">00</span>
            <span class="mx-0.5 md:mx-1">:</span>
            <span id="seconds" class="bg-black bg-opacity-30 px-1 py-0.5 rounded text-sm md:text-base">00</span>
        </div>
        <div id="ampm" class="ml-1 md:ml-2 text-yellow-300 font-bold text-xs md:text-sm"></div>
    </div>
    <div id="date-display" class="text-center text-white text-[0.6rem] xs:text-xs mt-1 md:mt-2 opacity-80"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');
    const ampmElement = document.getElementById('ampm');
    const dateElement = document.getElementById('date-display');
    
    const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    const dayNames = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    
    function updateClock() {
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        
        // Convert to 12-hour format
        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12;
        const formattedHours = hours.toString().padStart(2, '0');
        
        // Update time display
        hoursElement.textContent = formattedHours;
        minutesElement.textContent = minutes;
        secondsElement.textContent = seconds;
        ampmElement.textContent = ampm;
        
        // Update date display
        const dayName = dayNames[now.getDay()];
        const day = now.getDate();
        const monthName = monthNames[now.getMonth()];
        const year = now.getFullYear();
        dateElement.textContent = `${dayName} ${day} ${monthName} ${year}`;
        
        // Add animation effect to seconds
        secondsElement.classList.add('animate-pulse');
        setTimeout(() => {
            secondsElement.classList.remove('animate-pulse');
        }, 500);
    }
    
    // Initial update
    updateClock();
    
    // Update every second
    setInterval(updateClock, 1000);
});
</script>

<style>
.clock-widget {
    min-width: 180px;
}

.digital-clock span {
    transition: all 0.3s ease;
}

.digital-clock span:hover {
    transform: scale(1.1);
    background-color: rgba(0, 0, 0, 0.5) !important;
}

#date-display {
    font-family: 'Figtree', sans-serif;
}
</style>