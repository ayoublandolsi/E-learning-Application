let countdown;
const timerDisplay = document.querySelector('.timer');
const endTime = Date.now() + 20 * 60 * 1000;

function displayTimeLeft(seconds) {
  const minutes = Math.floor(seconds / 60);
  const remainderSeconds = seconds % 60;
  const display = `${minutes < 10 ? '0' : ''}${minutes}:${remainderSeconds < 10 ? '0' : ''}${remainderSeconds}`;
  document.title = display;
  timerDisplay.innerHTML = display;
}

function timer(seconds) {
  clearInterval(countdown);
  const now = Date.now();
  const then = now + seconds * 1000;
  displayTimeLeft(seconds);
  countdown = setInterval(() => {
    const secondsLeft = Math.round((then - Date.now()) / 1000);
    if (secondsLeft < 0) {
      clearInterval(countdown);
      timerDisplay.innerHTML = 'Time is up!';
      document.title = 'Time is up!';
      return;
    }
    displayTimeLeft(secondsLeft);
  }, 1000);
}

timer(Math.round((endTime - Date.now()) / 1000));
