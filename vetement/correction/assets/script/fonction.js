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