let body = document.querySelector("body");
let sun = document.querySelector(".sun");
let moon = document.querySelector(".moon");

moon.onclick = function() {
    body.classList.add("dark--mode");
};

sun.onclick = function() {
    body.classList.remove("dark--mode");
};

let menu = document.querySelector(".menu");
let sidebar = document.querySelector(".sidebar");
let mainContainer = document.querySelector(".main--container");

menu.onclick = function() {
    sidebar.classList.toggle("activemenu");
};

mainContainer.onclick = function() {
    sidebar.classList.remove("activemenu");
};

function insertData() {
  var inputValue = document.getElementById('input_value').value;

  // Create an XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Prepare the AJAX request
  xhr.open("GET", "insert.php?input_value=" + encodeURIComponent(inputValue), true);

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  // Send the request
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle the response here if needed
          console.log(xhr.responseText);
      }
  };

  // Send the data
  xhr.send("input_value=" + inputValue);

  // Clear the input value
  document.getElementById('input_value').value = "";
}

function getTime() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var time = xhr.responseText;
            document.getElementById('time').textContent = time;
        }
    };
    xhr.open('GET', 'get_time.php', true);
    xhr.send();
}

// Call the getTime function to fetch the time when the page loads
getTime();

function getTemperature() {
    fetch('get_temp.php')
        .then(response => response.json())
        .then(data => {
            var temperature = data.temperature;
            document.getElementById('temperatureValue').textContent = temperature;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Call the getTemperature function to fetch the temperature when the page loads
getTemperature();

function fetchTemperatureData() {
    fetch('get_temperature.php')
        .then(response => response.json())
        .then(data => {
            var temperatureValues = data.temperature.slice(-15); // Get the last 10 values
            createTemperatureHistoryChart(temperatureValues);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function createTemperatureHistoryChart(temperatureValues) {
    var chartElement = document.getElementById('temperatureHistoryChart');
    var chartLabels = Array.from({ length: temperatureValues.length }, (_, i) => i + 1); // Generate labels for x-axis

    new Chart(chartElement, {
        type: 'line',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Temperature',
                data: temperatureValues,
                backgroundColor: 'rgba(59, 197, 154, 0.2)',
                borderColor: 'rgba(59, 197, 154, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            layout: {
                padding: {
                    top: 20,
                    bottom: 20,
                    left: 20,
                    right: 20
                }
            }
        }
    });
}

// Call the fetchTemperatureData function to fetch the temperature data and create the chart when the page loads
fetchTemperatureData();
