const ctx = document.getElementById('dataUniversities');

new Chart(ctx, {
  type: 'pie',
  data: {
    labels: universidad,
    datasets: [{
      label: 'Clientes',
      data: cantidad,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      borderWidth: 1,
      hoverOffset: 4
    }]
  }
});