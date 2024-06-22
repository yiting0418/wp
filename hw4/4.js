function weekday(str) {
  return day[str]
}

var day = {
  Monday:1,Tuesday:2,Wednesday:3,Thusday:4,Friday:5,Saturday:6,Sunday:0
}

console.log(weekday("Monday"));
console.log(weekday("Tuesday"))