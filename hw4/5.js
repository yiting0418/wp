function countChar(str) {
  const c = {};
  
  for (const char of str) {
      c[char] = (c[char] || 0) + 1;
  }

  return c;
}

console.log(countChar("aabccadeaac"));