let menu = {
    _courses : {
      appetizers : [],
      mains : [],
      desserts : []
    },
    get appetizers() {
      return this._courses.appetizers;
    },
    set appetizers(appetizerIn) {
  
    },
    get mains() {
      return this._courses.mains;
    },
    set mains(mainsIn) {
  
    },
    get desserts() {
     return this._courses.desserts;
    },
    set desserts(dessertsIn) {
  
    },
    get courses() {
      return {
        appetizers : this.appetizers,
        mains : this.mains,
        desserts : this.desserts
      }
    },
    addDishToCourse(courseName, dishName, dishPrice) {
      const dish = {
        name: dishName,
        price: dishPrice
      };
      return this._courses[courseName].push(dish);
    },
    getRandomDishFromCourse(courseName) {
      const dishes = this._courses[courseName];
      const randomIndex = Math.floor(Math.random() * dishes.length);
      return dishes[randomIndex];
    },
    generateRandomMeal() {
      const appetizer = this.getRandomDishFromCourse('appetizers');
      const main = this.getRandomDishFromCourse('mains');
  
      const dessert = this.getRandomDishFromCourse('desserts');
  
      const totalPrice = appetizer.price + main.price + dessert.price;
  
      console.log(`You ordered ${appetizer.name}, ${main.name} and ${dessert.name}. Your total comes to ${totalPrice}.`)
    }
  
  }
  
  menu.addDishToCourse('appetizers', 'wedges', 3.00);
  menu.addDishToCourse('appetizers', 'scallops', 3.00);
  menu.addDishToCourse('appetizers', 'spring rolls', 3.00);
  
  menu.addDishToCourse('mains', 'steak', 10.00);
  menu.addDishToCourse('mains', 'schitzel', 9.00);
  menu.addDishToCourse('mains', 'burger', 11.00);
  
  menu.addDishToCourse('desserts', 'creme brule', 3.00);
  menu.addDishToCourse('desserts', 'ice cream', 4.00);
  menu.addDishToCourse('desserts', 'panacotta', 3.00);
  
  menu.generateRandomMeal();