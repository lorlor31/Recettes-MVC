
const index = {
    form : null ,
    userElement: null ,
    userValue : null ,
    init : function () {
        form=document.getElementById("form") ;
        userElement= document.getElementById("user") ;
        form.addEventListener("submit",index.checkUser) ;
        userValue = userElement.value ;
    },
    checkUser : function (event) {
        event.preventDefault() ;
        let userName = userElement.value ;
        console.log( userName)
        userName=="lor" 
        ? document.body.style.backgroundColor="lightPink"
        : document.body.style.backgroundColor="lightBlue" ;
    },
    
}


document.addEventListener("DOMContentLoaded", index.init);