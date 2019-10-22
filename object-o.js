//js object

var cat = {
    name: "Billie",
    age: 15,
    weight: 12,
    toString: function() { // The advantage of toString() is that it allows you to easily display an object. If we supply an object as an argument to alert(), for instance, it would use toString() to determine how to display the object.
        return `${this.name}`;
    },
    makeNoise: function () { alert("Purrrrr"); },
    walk: function () {
        this.weight--;
        if (this.weight <= 1) {
            alert("Meow, I just died");
            delete cat.name;
            delete cat.age;
            delete cat.weight;
        }
        return this.weight; // always run returns at the end of a function as it wont run code after a return
    },
    eat: function () {
    this.weight++;
        if (this.weight === 16) {
            console.log("uh oh, getting bigger!");
        }
        if (this.weight >= 20) {
            alert("your cat keeled over and died!");
        }
        return this.weight;
    },



}

function init(){
    document.getElementById("btn1").addEventListener("click", objectstest);
}


var car;// needs to be declared globally if you want to access it from the dom

function objectstest(){
    car = {
        make: "Peugeot",
        model:"206",
        engine_capacity:2000,
        top_speed:120,
        current_speed:0,
        accelerate: function(speed_difference){
            if (this.current_speed < this.top_speed){
                this.current_speed = this.current_speed + speed_difference;
                return "the current speed is " + this.current_speed;
            };
        },
        decelerate: function(speed_difference){
            if (this.current_speed >= 5){
                this.current_speed = this.current_speed - speed_difference; 
                return "the current speed is " + this.current_speed;
            };
        },
        toString: function() { return `${this.make} ${this.model} ${this.engine_capacity}`; },





    }

};


