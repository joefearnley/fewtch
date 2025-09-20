
const sendInOptions = document.getElementById('send-in-options');
const sendDateInput = document.getElementById('send-date');

sendInOptions.addEventListener('click', (event) => {
    event.preventDefault();

    // Remove active class from all buttons
    const buttons = document.querySelectorAll('#send-in-options button');
    buttons.forEach(button => {
        button.classList.remove('bg-jule-500', 'text-white');
        button.classList.add('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');
    });

    // Add active class to the clicked button
    event.target.classList.add('bg-jule-500', 'text-white');
    event.target.classList.remove('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');

    // Update hidden input value
    document.getElementById('send-in').value = event.target.textContent;
});

sendDateInput.addEventListener('change', (event) => {
    console.log('date changed');

    // Clear selection of send-in buttons
    const buttons = document.querySelectorAll('#send-in-options button');
    buttons.forEach(button => {
        button.classList.remove('bg-jule-500', 'text-white');
        button.classList.add('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');
    });

    // Clear hidden input value
    document.getElementById('send-in').value = '';
});
