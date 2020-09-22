// my age --- const is the same as let it just cant be modified
const myAge = 22;
//early years --- let makes the variable only relevent to the corresponding function
let earlyYears = 2;

let laterYears = myAge - 2;

laterYears *= 4

console.log(earlyYears);
console.log(laterYears);

//my age in dog years
let myAgeInDogYears = earlyYears*laterYears;
//my name in lower case
// const myName = console.log"DANIEL".toLowerCase());
const myName = "DANIEL".toLowerCase();

console.log("My name is " + myName + ". I am " + myAge + " years old in human years which is " + laterYears + " years in dog years." );