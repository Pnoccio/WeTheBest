// const date = new DateTime();

// document.getElementById("date_and_time").innerHTML = date;

function getDate(){
    const dateTime = new Date()

    let hours = dateTime.getHours()
    let minutes = dateTime.getMinutes()
    let seconds = dateTime.getSeconds()

    let digitalClock = hours + " : " + minutes + " : " + seconds

    return digitalClock

}

setInterval(() => {
    // document.getElementById("date_and_time").innerHTML= getDate()
    document.querySelector("#date_and_time").innerHTML= getDate()
  }, 1000);