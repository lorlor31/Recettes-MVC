// const editorModeButton=document.querySelector(".editorModeButton");
// const editorModeButtonContainerClickZone=document.querySelector(".editorModeButtonContainer-clickZone") ;
// const editorModeButtonInfo=document.querySelector(".editorModeButtonInfo") ;
// let isActiveEditorMode=false ;
// const toggleEditorMode = function() {
//     console.log("clickclick");
//     editorModeButton.classList.toggle("clicked") ;
//     isActiveEditorMode = editorModeButton.classList.contains("clicked") 
//     numOfPers.classList.toggle("invisible") ;
//     numOfPersLabel.classList.toggle("invisible") ;
//     numOfPersInput.classList.toggle("invisible") ;
// };

// const hoverEditorModeButtonInfo = function() {
//     console.log("hoov");
//     let message = editorModeButton.classList.contains("clicked")==true 
//         ? "Mode édition activé"
//         : "Mode édition désactivé"
//     editorModeButtonInfo.textContent=message;
//     editorModeButtonInfo.classList.toggle("hovered") ;
// };
/////////////////////////////
const editorMode = {
    button : null ,
    buttonContainerClickZone: null ,
    buttonInfo : null ,
    isActive : null ,
    init : function () {
        editorMode.button=document.querySelector(".editorModeButton");
        editorMode.buttonContainerClickZone=document.querySelector(".editorModeButtonContainer-clickZone") ;
        editorMode.buttonInfo=document.querySelector(".editorModeButtonInfo") ;
        editorMode.isActive=false ;
    },
    toggle: function () {
        console.log("clickclick");
        editorMode.button.classList.toggle("clicked") ;
        editorMode.isActive = editorModeButton.classList.contains("clicked") 
        numOfPers.classList.toggle("invisible") ;
        numOfPersLabel.classList.toggle("invisible") ;
        numOfPersInput.classList.toggle("invisible") ;
    },
    hoverButtonInfo :function() {
        console.log("hoov");
        let message = editorMode.button.classList.contains("clicked")==true 
            ? "Mode édition activé"
            : "Mode édition désactivé"
        editorMode.buttonInfo.textContent=message;
        editorMode.buttonInfo.classList.toggle("hovered") ;
    }
}