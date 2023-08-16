
function createCircle (radius){
return {
    radius,
    draw: function (){
        console.log('draw')
    }
};
}

// constructor function

function Circle(radius){
    this.radius = radius;
    this.draw = function (){
        console.log('draw')
    }
}

