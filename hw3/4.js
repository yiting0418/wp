function sumPrime(n){
  var tot=0
  for (let i=2; i<=n; i++){
    let isPrime = true
    for (let j=2; j<i; j++){
      if (i%j==0){
       isPrime = false
       break;
      }
    }
    if (isPrime){
      tot+=i
    }
  }
  return tot
}

console.log(sumPrime(10))