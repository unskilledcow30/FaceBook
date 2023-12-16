const slider = document.querySelector('.slider')

function swap(value){
    console.log(value)
    slider.style.transform = 'translate('+ (value*-50) +'%)'
}