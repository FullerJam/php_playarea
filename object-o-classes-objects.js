

class car
{

    
    // constructor
    constructor(brand,mod,eCC,tSpeed){
        this.make = brand;
        this.model = mod;
        this.engine_capacity = eCC;
        this.top_speed = tSpeed;
        this.horn = "beeeeep!"
    }

    display()
    {
        alert(`Brand ${this.make} Model ${this.model} Engine cc ${this.engine_capacity}`);
    }
}



    // var student1 = new Student("John" , "Software Engineering");
    // var student2 = new Student("Surjan" , "Web Design");
    // student1.display();
    // student2.display();
