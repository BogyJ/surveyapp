let endWorkHourCounter = 0;
let startWorkHour;
if(currentDate.getDay() === 6 || currentDate.getDay() === 0) {
    startWorkHour = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 10, 00, 00);
} else {
    startWorkHour = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 12, 00, 00);
}
endWorkHour = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 22, 00, 00);

function sendMail(id) {
    let infos = JSON.parse(localStorage.getItem("informations"));
    localStorage.removeItem("informations");

    $.ajax({
        url: "mail.php",
        method: "post",
        data: {infos: JSON.stringify(infos)},
        success: function(res) {
            console.log("E-mail has been sent.");
        }
    });

}

window.addEventListener("load", checkStartWorkingHour);

document.getElementById("full").addEventListener("click", openFullScreen);
document.getElementById("normal").addEventListener("click", exitFullScreen);

function openFullScreen() {
    let doc = document.documentElement;
    if(doc.requestFullScreen) {
        doc.requestFullScreen();
    } else if(doc.webkitRequestFullscreen) {
        doc.webkitRequestFullscreen();
    }
}

function exitFullScreen() {
    if(document.exitFullscreen) {
        document.exitFullscreen();
    } else if(document.exitFullscreen) {
        document.exitFullscreen();
    }

}

function checkStartWorkingHour() {
    let now = new Date();
    let day = now.getDay();
    let dayName;
    
    if(day === 0) {
        dayName = "Nedelja";
    } else if(day === 1) {
        dayName = "Ponedeljak";
    } else if(day === 2) {
        dayName = "Utorak";
    } else if(day === 3) {
        dayName = "Sreda";
    } else if(day === 4) {
        dayName = "Četvrtak";
    } else if(day === 5) {
        dayName = "Petak";
    } else {
        dayName = "Subota";
    }
    let times = [
        {
            type: "Aplikacija",
            year: now.getFullYear(),
            month: now.getMonth(),
            date: now.getDate(),
            hours: now.getHours(),
            minutes: now.getMinutes(),
            seconds: now.getSeconds(),
            day: dayName
        }
    ];
    // send an email when application has started

    $.ajax({
        url: "mail.php",
        method: "post",
        data: {times: JSON.stringify(times)},
        success: function(res) {
            console.log("E-mail has been sent.");
        }
    });
}

document.getElementById("end").addEventListener("click", sendTotal);
setInterval(checkEndOfWorkingHour, 60000);

function sendTotal() {
    document.querySelectorAll("button[type='button']").forEach((el) => {
        el.style.display = "none";
    });
    document.getElementById("body").style.userSelect = "none";

    setTimeout(function() {
        let total = JSON.parse(localStorage.getItem("total"));
        localStorage.removeItem("total");
        if(total.length === 0) {
            total = [{
                type: "Saldo",
                sum: 0,
                year: currentDate.getFullYear(),
                month: currentDate.getMonth(),
                date: currentDate.getDate()
            }];
        }

        $.ajax({
            url: "mail.php",
            method: "post",
            data: {total: JSON.stringify(total)},
            success: function(res) {
                console.log("E-mail has been sent.");
                exitFullScreen();
            }
        });
    }, 1500);
}

function checkEndOfWorkingHour() {
    if(new Date().getHours() >= endWorkHour.getHours() && new Date().getMinutes() >= endWorkHour.getMinutes()){
        if (endWorkHourCounter > 0) {
            return;
        }
        endWorkHourCounter++;
        document.getElementById("heading").style.display = "none";
        document.getElementById("end").style.display = "block";

    }
}

