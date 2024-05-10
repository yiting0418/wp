function daysInYear(n){
  if (n%4==0 && n%100>0 || n%400==0 || n%1000==0){
    return 366
  }
  else {return 365}
}
console.log("1998", daysInYear(1998))
console.log("2000", daysInYear(2000))
console.log("2024", daysInYear(2024))