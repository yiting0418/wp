function filter(a, f){
  var x = []

  for (let i of a) {
    if (f(i)) {
        x.push(i)
    }
  }
  
  return x
}

console.log(filter([1, 2, 3, 4], function (x) {return x % 2 == 1;}));