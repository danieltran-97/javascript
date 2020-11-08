const firstName = 'William';
const lastName = 'Johnson';
const age = 36;
const str = 'Hello there my name is Brad';
const tags = 'web design,web development,programming';

let val;

val = firstName + lastName;

// Concatenation
val = firstName + ' ' + lastName;

// Append
val = 'Brad ';
val += 'Traversy';

val = 'Hello, my name is ' + firstName + ' and I am ' + age;

// Escaping
val =  'That\'s awesome, I can\'t wait';

// Length
val = firstName.length;

// concat()
val = firstName.concat(' ', lastName);

// Change case
val = firstName.toUpperCase();
val = firstName.toLowerCase();

val = firstName[2];

// indexOf()
val = firstName.indexOf('l');
val = firstName.lastIndexOf('l');

// charAt()
val = firstName.charAt('2');
// Get last char
val = firstName.charAt(firstName.length - 1);

// substring()
val = firstName.substring(0, 4); // Will

// slice()
val = firstName.slice(0,4); // Will
val = firstName.slice(-3); //iam (starts from the back)

// split()
val = str.split(' ');
val = tags.split(',');

// replace()
val = str.replace('Brad', 'Jack');

// includes()
val = str.includes('foo');

console.log(val);