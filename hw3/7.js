function martixAdd(a,b){
  var i, j, sum = []
  for(let i=0; i<a.length; i++){
    sum[i] = []
    for(j=0; j<a.length; j++){
      sum[i][j] = a[i][j] * b[i][j]
    }
  }
  return sum
}

var a = [[2,4], [6,8]], b = [[1,3], [5,7]]
console.log(martixAdd(a,b))