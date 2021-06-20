let infos = [];
let totalSum = [];
let sum = [0];
let currentDate = new Date();
let runnings = [true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true];
let h = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let m = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let s = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let counters = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let dates = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let endDates = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let numbers;
let startDate;
let endDate;
let hours, minutes, seconds;


function init(id) {
    if(id == 12 || id == 13 || id == 15) {
        document.getElementById("robot-" + id).style.transition = "1000ms ease-in";
        document.getElementById("robot-" + id).style.background = "#ffffff33";
    } else {
        if (id >= 16) {
            document.getElementById("motor-" + id).style.transition = "1000ms ease-in";
            document.getElementById("motor-" + id).style.background = "#ffffff33";
        } else {
            document.getElementById("auto-" + id).style.transition = "1000ms ease-in";
            document.getElementById("auto-" + id).style.background = "#ffffff33";
        }
    }
    
    document.getElementById("btn-pause-" + id).style.display = "inline-block";
    document.getElementById("btn-pause-" + id).disabled = false;
    document.getElementById("btn-pause-" + id).style.cursor = "pointer";
    document.getElementById("btn-pause-" + id).style.opacity = 1;
    document.getElementById("btn-start-" + id).style.display = "none";
    
    document.getElementById("btn-reset-" + id).disabled = true;
    document.getElementById("btn-reset-" + id).style.cursor = "not-allowed";
    document.getElementById("btn-reset-" + id).style.opacity = 0.5;
    startTimer(id);
    
    dates[id-1] = new Date();
    startDate = new Date();
    endDates[id-1] = new Date();
    
}

function Check(hours=0, minutes=0, seconds=0) {
    this.hours = hours;
    this.minutes = minutes;
    this.seconds = seconds;
}

Check.prototype.getCheck = function(id) {
    let min = 0;
    let price;
    
    if(id == 12 || id == 13 || id == 15) {
        price = 60;
    } else {
        price = 40;
    }

    if(this.seconds > 5) {
        min = parseInt(this.minutes) + 1;
    }
    
    if(this.minutes > 0 && this.seconds <= 5) {
        min = parseInt(this.minutes);
    }
    
    if(this.hours > 0) {
        if(this.minutes == 0 && this.seconds > 5 || this.minutes > 0 && this.seconds > 5) {
            min = (parseInt(this.minutes)+1) + (parseInt(this.hours) * 60);   
        } else {
            min = parseInt(this.minutes) + (parseInt(this.hours) * 60);   
        }
    }
    
    return parseInt(min) * price;
}



function startTimer(id) {
    number = id - 1;
    
    if(runnings[number] !== true) {
        return;
    }
    
    
    if(runnings[number]) {
        let timer = document.getElementById("timer-" + id).innerHTML;
        let hoursMinutesSeconds = timer.split(":");
        h[number] = hoursMinutesSeconds[0];
        m[number] = hoursMinutesSeconds[1];
        s[number] = hoursMinutesSeconds[2];
        if(counters[number] === 0) {
            s[number] = "-1";
            counters[number]++;
        }
        

        if(s[number] == 59) {
            if(m[number] == 59) {
                h[number]++;
                m[number] = 0;
                if(h[number] < 10) h[number] = "0" + h[number];
            } else {
                m[number]++;
            }
            if(m[number] < 10) {
                m[number] = "0" + m[number];
            }
            s[number] = "00"
        } else {
            s[number]++;
            if(s[number] < 10) {
                s[number] = "0" + s[number];
            }
        }
        document.getElementById("timer-" + id).innerHTML = h[number] + ":" + m[number] + ":" + s[number];
        document.getElementById("btn-pause-" + id).style.display = "inline-block";
        document.getElementById("btn-pause-" + id).disabled = false;
        document.getElementById("btn-pause-" + id).style.cursor = "pointer";
        document.getElementById("btn-pause-" + id).style.opacity = 1;
        document.getElementById("btn-start-" + id).style.display = "none";

        document.getElementById("btn-reset-" + id).disabled = true;
        document.getElementById("btn-reset-" + id).style.cursor = "not-allowed";
        document.getElementById("btn-reset-" + id).style.opacity = 0.5;

        document.getElementById("btn-continue-" + id).style.display = "none";
        document.getElementById("btn-continue-" + id).disabled = true;
        document.getElementById("btn-continue-" + id).style.cursor = "not-allowed";
        document.getElementById("btn-continue-" + id).style.opacity = 0.5;
        
        setTimeout(function() {
            startTimer(id);
        }, 1000);
    }
}

let timer, hoursMinutesSeconds, timerHours, timerMinutes, timerSeconds, check, startDateHours, startDateMinutes, startDateSeconds, endDateHours, endDateMinutes, endDateSeconds;

function pause(id) {
    if(id == 12 || id == 13 || id == 15) {
        document.getElementById("robot-" + id).style.background = "transparent";    
    } else {
        if (id >= 16) {
            document.getElementById("motor-" + id).style.background = "transparent";
        } else {
            document.getElementById("auto-" + id).style.background = "transparent";
        }
    }

    runnings[id-1] = false;
    
    check = new Check(h[id-1], m[id-1], s[id-1]);

    document.getElementById("btn-continue-" + id).disabled = false;
    document.getElementById("btn-continue-" + id).style.cursor = "pointer";
    document.getElementById("btn-continue-" + id).style.opacity = 1;
    document.getElementById("btn-start-" + id).style.display = "none";

    document.getElementById("btn-reset-" + id).disabled = false;
    document.getElementById("btn-reset-" + id).style.cursor = "pointer";
    document.getElementById("btn-reset-" + id).style.opacity = 1;

    if(id == 12 || id == 13 || id == 15) {
        document.getElementById("robot-" + id).innerHTML += `<div class="info"><p class="date"><span class="bold text-large"><span class="cena">Cena:</span> <span class="number">${check.getCheck(id)}</span><span class="valuta">rsd</span></span></p></div>`;
    } else {
        if (id >= 16) {
            document.getElementById("motor-" + id).innerHTML += `<div class="info"><p class="date"><span class="bold text-large"><span class="cena">Cena:</span> <span class="number">${check.getCheck(id)}</span><span class="valuta">rsd</span></span></p></div>`;
        } else {
            document.getElementById("auto-" + id).innerHTML += `<div class="info"><p class="date"><span class="bold text-large"><span class="cena">Cena:</span> <span class="number">${check.getCheck(id)}</span><span class="valuta">rsd</span></span></p></div>`;
        }
        
    }

    document.getElementById("btn-continue-" + id).style.display = "block";

    document.getElementById("btn-pause-" + id).style.display = "none";
    document.getElementById("btn-pause-" + id).disabled = true;
    document.getElementById("btn-pause-" + id).style.cursor = "not-allowed";
    document.getElementById("btn-pause-" + id).style.opacity = 0.5;

}

function changeState(id) {
    if(runnings[id-1] === false) {
        let div;
        runnings[id-1] = true;

        setTimeout(function() {
            startTimer(id);
        }, 500);
        if(id == 12 || id == 13 || id == 15) {
            div = document.getElementById("robot-" + id);
            document.getElementById("robot-" + id).style.transition = "1000ms ease-in";
            document.getElementById("robot-" + id).style.background = "#ffffff33";
        } else {
            if (id >= 16) {
                div = document.getElementById("motor-" + id);
                document.getElementById("motor-" + id).style.transition = "1000ms ease-in";
                document.getElementById("motor-" + id).style.background = "#ffffff33";
            } else {
                div = document.getElementById("auto-" + id);
                document.getElementById("auto-" + id).style.transition = "1000ms ease-in";
                document.getElementById("auto-" + id).style.background = "#ffffff33";
            }
        }

        if(typeof(div.childNodes[7]) === 'object') {
            div.removeChild(div.childNodes[7]);
        }
    }
}

function reset(id) {
    const idNumber = id;
    let div;
    timer = document.getElementById("timer-" + id).innerHTML;

    document.getElementById("timer-" + id).innerHTML = "00" + ":" + "00" + ":" + "00";
    counters[id-1] = 0;
    if(id == 12 || id == 13 || id == 15) {
        div = document.getElementById("robot-" + id);    
    } else {
        if (id >= 16) {
            div = document.getElementById("motor-" + id);
        } else {
            div = document.getElementById("auto-" + id);
        }
    }
    
    if(typeof(div.childNodes[7]) === 'object') {
        div.removeChild(div.childNodes[7]);
    }

    endDate = new Date();
    endDates[id-1] = new Date();
    
    
    hoursMinutesSeconds = timer.split(":");
    timerHours = hoursMinutesSeconds[0];
    timerMinutes = hoursMinutesSeconds[1];
    timerSeconds = hoursMinutesSeconds[2];
    
    check = new Check(h[id-1], m[id-1], s[id-1]);
    startDateHours = dates[id-1].getHours();
    startDateMinutes = dates[id-1].getMinutes();
    startDateSeconds = dates[id-1].getSeconds();

    endDateHours = endDate.getHours();
    endDateMinutes = endDate.getMinutes();
    endDateSeconds = endDate.getSeconds();

    if(endDateHours < 10) {
        endDateHours = "0" + endDateHours;
    }
    if(endDateMinutes < 10) {
        endDateMinutes = "0" + endDateMinutes;
    }
    if(endDateSeconds < 10) {
        endDateSeconds = "0" + endDateSeconds;
    }

    sum[0] += check.getCheck(id);

    let total = {
        type: "Saldo",
        sum: sum[0],
        year: endDate.getFullYear(),
        month: endDate.getMonth(),
        date: endDate.getDate()
    };

    let informations = {
        type: "Vožnja",
        id: id,
        price: check.getCheck(id),
        startYear: startDate.getFullYear(),
        startMonth: startDate.getMonth(),
        startDate: startDate.getDate(),
        startHours: startDateHours,
        startMinutes: startDateMinutes,
        startSeconds: startDateSeconds,
        endYear: endDate.getFullYear(),
        endMonth: endDate.getMonth(),
        endDate: endDate.getDate(),
        endHours: endDates[id-1].getHours(),
        endMinutes: endDates[id-1].getMinutes(),
        endSeconds: endDates[id-1].getSeconds(),
        hours: timerHours,
        minutes: timerMinutes,
        seconds: timerSeconds
    };
    
    infos[0] = informations;
    totalSum[0] = total;

    localStorage.setItem("informations", JSON.stringify(infos));
    localStorage.setItem("total", JSON.stringify(totalSum));

    sendMail(id);

    document.getElementById("btn-pause-" + idNumber).style.display = "none";
    document.getElementById("btn-start-" + idNumber).style.display = "inline-block";

    document.getElementById("btn-start-" + idNumber).disabled = false;

    document.getElementById("btn-reset-" + idNumber).disabled = true;
    document.getElementById("btn-reset-" + idNumber).style.cursor = "not-allowed";
    document.getElementById("btn-reset-" + idNumber).style.opacity = 0.5;

    document.getElementById("btn-continue-" + idNumber).style.display = "none";
    document.getElementById("btn-continue-" + idNumber).disabled = true;
    document.getElementById("btn-continue-" + idNumber).style.cursor = "not-allowed";
    document.getElementById("btn-continue-" + idNumber).style.opacity = 0.5;
    runnings[idNumber-1] = true;
    counters[idNumber-1] = 0;
}
