// this is a contant value
const kelvin = 293;
// celsius is also a constant value
const celsius = kelvin - 273;
// formula for fahrenheit
//converted to whole number
const fahrenheit = Math.floor(celsius *(9/5) + 32);

console.log("The temperature is " + fahrenheit + " degrees Fahrenheit");

/*Great work! Kelvin can now publish his forecasts in Celsius and Fahrenheit.

If you’d like extra practice, try this:

Convert celsius to the Newton scale using the equation below
Newton = Celsius * (33/100)

Round down the Newton temperature using the .floor() method
Use console.log and string interpolation to log the temperature in newton to the console*/