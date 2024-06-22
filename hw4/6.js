function gcd(a, b) {
  let x = [];
  let y = [];
  
  for (let i=1; i<=a; i++){
    if (a%i == 0) x.push(i);
  }
  for (let i=1; i<=b; i++){
    if (b%i == 0) y.push(i);
  }
  
  let gcd = 1;
  for (let i of x){
    if (y.includes(i) && i>gcd) gcd=i;
  }
  
  return gcd;
}

console.log(gcd(12, 28));

//Euclidean algorithm
// function gcd(a, b) {
//   while (b !== 0) {
//       [a, b] = [b, a % b];
//   }
//   return a;
// }

// console.log(gcd(3, 6)); // Output: 3
// console.log(gcd(48, 18)); // Output: 6
// console.log(gcd(56, 98)); // Output: 14