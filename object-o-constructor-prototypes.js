//car constructor below

function car(brand, mod, capacity, tSpeed) {
    this.make = brand,
        this.model = mod,
        this.engine_capacity = capacity,
        this.top_speed = tSpeed
        //this.current_speed = 0, // pushed to prototype below
        //this.horn= "beep!", // pushed to prototype below
        // this.accelerate = function (speed_difference) {
        //     if (this.current_speed < this.top_speed) {
        //         this.current_speed = this.current_speed + speed_difference;
        //         return "the current speed is " + this.current_speed;
        //     };
        // },
        // this.decelerate = function (speed_difference) {
        //     if (this.current_speed > 0) {
        //         this.current_speed = this.current_speed - speed_difference;
        //         return "the current speed is " + this.current_speed;
        //     };
        // },
        // this.toString = function () { return `${this.make} ${this.model} ${this.engine_capacity}`; }; //pushed functions to prototypes below

};


//Constructor functions have a special property, prototype, which defines a "blueprint" or "template" object to use when creating new objects with that constructor. (How can a function, such as the constructor, have properties? In JavaScript, functions are a form of object, so because a function is an object, it can have properties). So we can define a prototype for cats, by assigning properties and methods to the prototype property of the Cat constructor, and then create many Cats which use that prototype.

car.prototype.current_speed = 0;
car.prototype.horn = "beep!";
car.prototype.accelerate = function (speed_difference) {
    if (this.current_speed < this.top_speed) {
        this.current_speed = this.current_speed + speed_difference;
        return "the current speed is " + this.current_speed;
    }
};
car.prototype.decelerate = function (speed_difference) {
    if (this.current_speed > 0) {
        this.current_speed = this.current_speed - speed_difference;
        return "the current speed is " + this.current_speed;
    };
};
car.prototype.toString = function () { return `${this.make} ${this.model} ${this.engine_capacity}`; };



var car1 = new car("peugeot", 206, 2000, 120); // creates new object with the values supplied


// prototype