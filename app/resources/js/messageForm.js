
const sendInButtons = document.querySelectorAll('#send-in-options button');
const sendDateInput = document.querySelector('#send_date');

sendInButtons.forEach(sendInButton => {
    sendInButton.addEventListener('click', (event) => {
        event.preventDefault();

        // remove active class/state from all buttons
        sendInButtons.forEach(button => {
            button.classList.remove('bg-jule-500', 'text-white');
            button.classList.add('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');
        });

        // Add active class to the clicked button
        sendInButton.classList.add('bg-jule-500', 'text-white');
        sendInButton.classList.remove('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');

        // set the date value based on what button is selected
        const sendInValue = sendInButton.textContent.trim();
        const daysInFuture = getDaysFromInput(sendInValue);

        if (daysInFuture) {
            const currentDate = new Date();
            currentDate.setDate(currentDate.getDate() + daysInFuture);
            const formattedDate = currentDate.toISOString().split('T')[0];

            sendDateInput.value = formattedDate;
        }
    });
});

sendDateInput.addEventListener('change', (event) => {
    // Clear selection of send-in buttons
    sendInButtons.forEach(button => {
        button.classList.remove('bg-jule-500', 'text-white');
        button.classList.add('bg-zinc-100', 'hover:bg-zinc-200', 'dark:bg-zinc-700', 'dark:hover:bg-zinc-600', 'text-foreground');
    });
});

const getDaysFromInput = (sendInInput) => {
    const mapping = {
        '3 Months': 90,
        '6 Months': 180,
        '1 Year': 365,
        '3 Years': 1095,
        '5 Years': 1825,
        '10 Years': 3650
    };

    return mapping[sendInInput] || null;
};
