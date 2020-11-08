let val;

//number to string
val = String(555);
val = String(4+4);
//bool to string
val = String(true);
//date to string
val = String(new Date());
//array to string
val = String([1,2,3,4]);
// toString() method
val = (5).toString();
val = (true).toString();

//String to number
val = Number('5'); // 5
val = Number(true); // 1
val = Number(false); // 0
val = Number(null); // 0
val = Number('hello'); // NaN (not a number)
val = Number([1,2,3]); // NaN

val = parseInt('100.3'); // 100 (because parses integer)
val = parseFloat('100.3'); //100.3

console.log(val);
console.log(typeof val);
// console.log(val.length);
console.log(val.toFixed());

const val1 = String(5);
const val2 = 6;
const sum = val1 + val2;

console.log(sum);
console.log(typeof sum);