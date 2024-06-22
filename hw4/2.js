var a=[3,2]
function arrayMin(a){
  let min = a[0]
  
  for (let i in a){
    if (a[i]<min) min = a[i]
  }
  
  return min
}
console.log(arrayMin(a))