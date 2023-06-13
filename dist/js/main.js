function decrement(inputId) {
  const totalCount = document.getElementById(inputId);
  if (totalCount.value > 1) {
    totalCount.value = parseInt(totalCount.value) - 1;
  }
}

function increment(inputId) {
  const totalCount = document.getElementById(inputId);
  totalCount.value = parseInt(totalCount.value) + 1;
}
