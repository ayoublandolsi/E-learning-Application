let countdown;
const timerDisplay = document.querySelector('.timer');
const submitButton = document.querySelector('input[type="submit"]');
const endTime = Date.now() + 1 * 60 * 1000;
const form = document.querySelector('#myForm'); // select the form element

function displayTimeLeft(seconds) {
  const minutes = Math.floor(seconds / 60);
  const remainderSeconds = seconds % 60;
  const display = `${minutes}:${remainderSeconds < 10 ? '0' : ''}${remainderSeconds}`;
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
      form.submit(); // submit the form
      return;
    }
    displayTimeLeft(secondsLeft);
  }, 1000);
}

timer(Math.round((endTime - Date.now()) / 1000));



