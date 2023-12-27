const numOfPers=document.querySelector(".numOfPers") ;
const numOfPersLabel=document.querySelector(".numOfPersLabel") ;
const numOfPersInput=document.querySelector(".numOfPersInput") ;
const form=document.getElementsByTagName("form")[0] ;

let numOfPersDefault=numOfPers.dataset.persons;
console.log(numOfPersDefault);
let customNumOfPers=numOfPersDefault;
const ingredientsElements = document.querySelectorAll(".ingredients ul li") ;

const handleUserInput = function (event) {
    event.preventDefault();
    if (customNumOfPers==numOfPersDefault) {
        customNumOfPers=numOfPersInput.value ;
    }
    else {
        customNumOfPers=12
    }
    
    console.log(customNumOfPers);
    for (let ingredientElement of ingredientsElements) {
        ingredientDep=ingredientElement.querySelector("span").textContent;
        console.log(typeof(ingredientDep))
        Number.isInteger(parseInt(ingredientDep) )
        ? calcCustomIngredients(ingredientDep,ingredientElement) 
        :  ingredientDep
    
    }
    
}
//refaire en prenant comme valeur dedepart celles qu'on voit pour que ca marche à la
//deuxieme cal=cul
const calcCustomIngredients = function (ingredientDep,ingredientElement) {
    ingredientEnd=ingredientDep/numOfPersDep*customNumOfPers ;
    ingredientElement.querySelector("span").textContent=ingredientEnd ; 
}
