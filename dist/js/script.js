const headerPrev = document.querySelector('.header__preview');
const headerView = document.querySelector('.header__view');
const closeBtn = document.querySelector('.header__close__btn');

headerPrev.addEventListener("click", () => {
    headerPrev.nextElementSibling.classList.toggle('open');
    headerView.classList.toggle('open');
})

closeBtn.addEventListener("click", () => {
    headerPrev.nextElementSibling.classList.toggle('open');
    headerView.classList.toggle('open');
})

const headerLogin = document.querySelector('.header__login')

const headerWindowBg = document.querySelector('.login__window__bg')
const headerWindow = document.querySelector('.login__window')
const headerLoginCloseBtn = document.querySelector('.login__closeBtn')
const headerSignUpCloseBtn = document.querySelector('.signup__closeBtn')
const headerSignUpWindow = document.querySelector('.signup__window')
const headerSignUpBtn = document.querySelector('.signup__btn')
const signupBtn = document.querySelector('.error__btn')
const errorWindow = document.querySelector('.signup__error__bg')
const successWindow = document.querySelector('.signup__success__bg')
const loginErrorWindow = document.querySelector('.login__error__bg')
const successSignupBtn = document.querySelector('.signup__success__btn')
const loginErrorBtn = document.querySelector('.login__error__btn')

    headerLogin.addEventListener('click', () => {
        headerWindowBg.classList.toggle('open');
        headerWindow.classList.toggle('open');
    })
    headerLoginCloseBtn.addEventListener("click", () => {
        headerWindowBg.classList.toggle('open');
        headerWindow.classList.toggle('open');
    })
    headerSignUpCloseBtn.addEventListener('click', () => {
        headerSignUpWindow.classList.toggle('rotate');
        headerWindow.classList.toggle('rotate');
    })
    headerSignUpBtn.addEventListener('click', () => {
        headerWindow.classList.toggle('rotate');
        headerSignUpWindow.classList.toggle('rotate');
    })

    window.onload=function() {
        signupBtn.addEventListener('click', () => {
            errorWindow.classList.toggle('open');
            headerWindow.classList.toggle('rotate');
            headerSignUpWindow.classList.toggle('rotate');
            headerWindowBg.classList.toggle('open');
            headerWindow.classList.toggle('open');
        })
    }
    window.onload=function() {
        successSignupBtn.addEventListener('click', () => {
            successWindow.classList.toggle('open');
            headerWindowBg.classList.toggle('open');
            headerWindow.classList.toggle('open');
        })
    }
    window.onload=function () {
        loginErrorBtn.addEventListener('click', () => {
            loginErrorWindow.classList.toggle('open');
            headerWindowBg.classList.toggle('open');
            headerWindow.classList.toggle('open');
        }) 
    }
    
    
