function isPrime(n){
  for (let i=2; i<n; i++){
    if (n%i==0){
     return false 
    }
  }
  return true
}

console.log("3, ", isPrime(3))
console.log("4, ", isPrime(4))