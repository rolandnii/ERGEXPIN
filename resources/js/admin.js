import { data } from "autoprefixer";
import  Chart  from "chart.js/auto"; 

//Chart for the Users
Chart.defaults.color = "#adabab";

let usersId = document.getElementById("users-chart");

//Set options for users
let UsersChart = new Chart(usersId, {
    type: "pie",
    data: {
        labels: ["Active Users", "Deleted Users"],
        datasets: [
            {
                data: [active_users,deleted_users],
                hoverBorderWidth: 0,
                backgroundColor: [
                    "rgb(0, 174, 143)",
                    "rgb(243, 90, 137)",
                ]
            },

        ]
    }
});


// Chart for recordings
let recordingsId = document.getElementById("recordings-chart");

let RecordingsChart = new Chart(recordingsId, {
    type: "pie",
    data: {
        labels: ["Income","Expense"],
        datasets: [
            {
                backgroundColor: [
                    "rgb(0, 174, 143)",
                    "rgb(243, 90, 137)",
                ],
                data: [income_recordings, expense_recordings],
                hoverBorderWidth: 0,
            },
        ]
    }
})