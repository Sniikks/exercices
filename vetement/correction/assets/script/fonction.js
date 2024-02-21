function OpenLoginMenu() {
    let register = document.querySelector('.conteneurRegister')
    register.style.opacity =  0
    setTimeout(() => {    
        register.style.display = "none"
    }, 1000)

    let Login = document.querySelector('.conteneurLogin ')
    Login.style.display = 'flex'
    setTimeout(()=> {
        Login.style.opacity = 1
    }, 100)
}
function OpenRegisterMenu() {     
    let Login = document.querySelector('.conteneurLogin ')
    Login.style.opacity = "0"
    setTimeout(() => {
        Login.style.display = 'none'
    }, 1000)
    let register = document.querySelector('.conteneurRegister')
    register.style.display = "flex"
    setTimeout(() => {
        register.style.opacity =  1
    })
}

document.addEventListener('DOMContentLoaded', function() {
    let Login = document.querySelector('.conteneurLogin ')
    Login.addEventListener( 'click', function(e) {
        if ( e.target == Login ) {
            Login.style.opacity = "0"
            setTimeout(() => {
                Login.style.display = 'none'
            }, 1000)
        }
    })
    let Register = document.querySelector('.conteneurRegister')
    Register.addEventListener("click", function(e){
        if ( e.target == Register) {
            Register.style.opacity =  0
            setTimeout(() => {    
                Register.style.display = "none"
            }, 1000)
        }
    })
})

function OpenSlideBar() {
    let Slide = document.getElementById('slideBar')
    if (Slide.style.right == '0px') {
        Slide.style.right = -25 + '%'
        // On le voit pas
    }else {
        Slide.style.right = 0
        // On le voit
    }
}
function Deconnexion() {
    window.location.href = "./assets/controllers/DeconnexionCtrl.php";
}
function Profil() {
    window.location.href = "./page/profil.php";
}
function ToggleMode() {
    let Body = document.querySelector('body')
    let Button = document.getElementById('ButtonMode')

    if (Body.getAttribute('Banane') == 'dark') {
        Body.setAttribute('Banane','light')     
        Button.style.backgroundColor = 'white'
        Button.style.color = "black"
        window.localStorage.setItem('theme', 'light');
    } else {
        Body.setAttribute('Banane','dark')
        Button.style.backgroundColor = 'black'
        Button.style.color = "white"
        window.localStorage.setItem('theme', 'dark');
    }
}
document.addEventListener('DOMContentLoaded', function() {
    let Body = document.querySelector('body')
    let Button = document.getElementById('ButtonMode')
    if (window.localStorage.getItem("theme") == "dark") {
        Body.setAttribute('Banane','dark')
        Button.style.backgroundColor = 'black'
        Button.style.color = "white" 
    }
})