

class car {
    // constructor
    constructor(brand, mod, eCC, tSpeed) {
        this.make = brand;
        this.model = mod;
        this.engine_capacity = eCC;
        this.top_speed = tSpeed;
        this.curSpeed = 0;
        this.horn = "beeeeep!"
        this.ignition = false;
    }

    display() {
        alert(`Brand ${this.make} Model ${this.model} Engine cc ${this.engine_capacity}`);
    }
    startEngine() {
        this.ignition = !this.ignition;
        alert(`This ${this.make} just started the engine, Vrooooom`)
    }
    accelerate(){
        if(this.ignition == false){
            alert(`Nothing happened, do you need to start the engine?`)
        }else if(this.curSpeed < tSpeed){
            curSpeed+=;
            alert(`Vroom your speed just increased to ${this.curSpeed}mph`);
        }
    }

}



var car1 = new car("Mazda", 3, 1998, 140);
    // var student2 = new Student("Surjan" , "Web Design");
    // student1.display();
    // student2.display();
