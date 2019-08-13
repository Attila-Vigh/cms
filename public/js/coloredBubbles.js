// The canvas' width and height are assigned to variables for 
// reusability;
let myCanvasWidth = 300;
let myCanvasHeight = 300;

function setup() {
    // The canvas is created;
    createCanvas(myCanvasWidth , myCanvasHeight, [1]);
}

function draw() {
    background(random(0, 255), 
               random(0, 255), 
               random(0, 255), 
               random(0, 255) );
    for(let i=1; i<10; i++) {
        for(let j=1; j<10; j++) {
            ellipse(random(myCanvasWidth), 
                    random(myCanvasHeight), 
                    random(i * 1, j * i * 1));
            fill(random(0, 255), 
                 random(0, 255), 
                 random(0, 255));
            ellipse(mouseX, 
                    mouseY, 
                    random(i * 1, i * 15));
        }
    }
}