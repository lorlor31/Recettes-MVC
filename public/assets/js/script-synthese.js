
const editorModeButton=document.querySelector(".editorModeButton");
const editorModeButtonContainerClickZone=document.querySelector(".editorModeButtonContainer-clickZone") ;
const editorModeButtonInfo=document.querySelector(".editorModeButtonInfo") ;
let isActiveEditorMode=false ;
const toggleEditorMode = function() {
    console.log("clickclick");
    editorModeButton.classList.toggle("clicked") ;
    isActiveEditorMode = editorModeButton.classList.contains("clicked") 
    numOfPers.classList.toggle("invisible") ;
    numOfPersLabel.classList.toggle("invisible") ;
    numOfPersInput.classList.toggle("invisible") ;
};

const hoverEditorModeButtonInfo = function() {
    console.log("hoov");
    let message = editorModeButton.classList.contains("clicked")==true 
        ? "Mode édition activé"
        : "Mode édition désactivé"
    editorModeButtonInfo.textContent=message;
    editorModeButtonInfo.classList.toggle("hovered") ;
};


const numOfPers=document.querySelector(".numOfPers") ;
const numOfPersLabel=document.querySelector(".numOfPersLabel") ;
const numOfPersInput=document.querySelector(".numOfPersInput") ;
const form=document.getElementsByTagName("form")[0] ;



const numOfPersDep=numOfPersInput.value;
//console.log("numOfPersDep",numOfPersDep);
let customNumOfPers=1;
const ingredientsElements = document.querySelectorAll(".ingredients ul li") ;

const calcCustomIngredients = function (label) {
    ingredientAmountForOnePerson=arrayOfIngredientsAmountsForOnePers[label]; 
    ingredientEnd=ingredientAmountForOnePerson*customNumOfPers ;
    ingredientElement.querySelector(".amount").textContent=ingredientEnd ; 
    console.log("ingredientEnd",ingredientEnd)
}


const handleUserInput = function (event) {
    event.preventDefault();
    customNumOfPers=numOfPersInput.value ;
    console.log("customNumOddsfsdffPers",customNumOfPers);
    for (let ingredientElement of ingredientsElements) {
        console.log(ingredientElement) ;
        let label=ingredientElement.querySelector(".ingredient").textContent;
        let amount=ingredientElement.querySelector(".amount").textContent;
        console.log(amount,ty)
        Number.isInteger(parseInt(amount) )
        ? calcCustomIngredients(label) 
        :  amount 
    }
    
}
//refaire en prenant comme valeur dedepart celles qu'on voit pour que ca marche à la
//deuxieme cal=cul

//création d'un tableau qui comprend la quantité pour une personne pourqchaque ingrédient
let arrayOfIngredientsAmountsForOnePers={} ;
for (let ingredientElement of ingredientsElements) {
    ingredientLabel =ingredientElement.querySelector(".ingredient").textContent ;
    ingredientDep=ingredientElement.querySelector(".amount").textContent;
    ingredientAmountForOnePerson=ingredientDep/numOfPersDep ; 
    arrayOfIngredientsAmountsForOnePers[ingredientLabel] =ingredientAmountForOnePerson ;
}
console.log(arrayOfIngredientsAmountsForOnePers)
//Fonction pour calculer en fct de l'input


editorModeButtonContainerClickZone.addEventListener("click",()=>toggleEditorMode()) ;
editorModeButtonContainerClickZone.addEventListener("mouseover",()=>hoverEditorModeButtonInfo()) ;
editorModeButtonContainerClickZone.addEventListener("mouseout",()=>hoverEditorModeButtonInfo()) ;
form.addEventListener("submit",handleUserInput) ;