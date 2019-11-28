class Car {
    // constructor
    constructor(brand, mod, eCC, tSpeed) {
        this.make = brand;
        this.model = mod;
        this.engine_capacity = eCC;
        this.top_speed = tSpeed;
        this.curSpeed = 0;
        this.horn = `The ${this.brand} beeeeeped!`;
        this.ignition = false;
    }

    display() {
        alert(`Brand ${this.make} Model ${this.model} Engine cc ${this.engine_capacity}`);
    }
    startEngine() {
        this.ignition = !this.ignition;
        alert(`This ${this.make} just started the engine, Vrooooom`)
        return this.ignition;
    }
    accelerate(){
        if(this.ignition == false){
            alert(`Nothing happened, do you need to start the engine?`)
        }else if(this.curSpeed < tSpeed){
            this.curSpeed ++;
            alert(`Vroom your speed just increased to ${this.curSpeed}mph`);
        }
    }

}

const car = new Car("Mazda", 3, 1998, 138);

document.getElementById("carhorn").addEventListener("click", car.startEngine.bind(car));


