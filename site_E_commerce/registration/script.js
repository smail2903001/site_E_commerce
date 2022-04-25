
var passV=false, rePassV=false 

//Pour password
var pass = document.getElementById('password')
var spanPass =  document.getElementById('msgPass')
var msgPas = document.createTextNode('votre mote de passe doit contenir au moins 8 caractères')

var valP
function checkP() {
    pass = document.getElementById('password')
    valP = pass.value
    return (valP.length >= 8)
}

if(!checkP()) {
        spanPass.appendChild(msgPas)
        passV = false ;
        spanPass.style.color="red"
        spanPass.style.fontSize="small"
}

pass.onkeyup = function() {
    if(!checkP()) {
        spanPass.appendChild(msgPas) 
        passV = false ;
        spanPass.style.color="red"
        spanPass.style.fontSize="small"
    }
    else {
        spanPass.removeChild(spanPass.firstChild)
        passV = true ;
    }
}


//rePass
var rePass = document.getElementById('rePassword')
var spanRePass = document.getElementById('msgRePass')
var msgRePas = document.createTextNode('Votre confirmation n\'est pas identique')

var valP
function checkPR() {
    rePass = document.getElementById('rePassword')
    var valRP = rePass.value
    return (valRP === valP)
}

if(!checkPR()) {
        spanRePass.appendChild(msgRePas)
        rePassV = false ;
        spanRePass.style.color="red"
        spanRePass.style.fontSize="small"
}

rePass.onkeyup = function() {
    if(!checkPR()) {
        spanRePass.appendChild(msgRePas) 
        rePassV = false ;
        spanRePass.style.color="red"
        spanRePass.style.fontSize="small"
    }
    else {
        spanRePass.removeChild(spanRePass.firstChild)
        rePassV = true ;
    }
}

var form = document.getElementById("form")
form.onsubmit = function(e) {
    
    if( passV === false || rePassV === false ){
        e.preventDefault();   
    }
     
}