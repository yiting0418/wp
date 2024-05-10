var a=[1,2];
var b=[3,4];

function vectorAdd(a,b){
  for(let i in a){
    a[i]+=b[i];
  }
  return a;
}
console.log(vectorAdd(a,b));