class Slider{
    constructor(slideSelector){
        this.slides = document.querySelectorAll(slideSelector) //get all slides by selector
    }

    //start slider
    start(){
        if(!this.slides.length){ //slides is not found
            this.errorHandler('Sorry, slides is not found')
            return
        }
        this.setClickHandler() //add click hendler to slides
    }

    //add click hendler to slides
    setClickHandler(){
        this.slides.forEach((slide) => {
            slide.addEventListener('click', () => { //add hendler
                this.clearActive() //remove all class 'active'
                slide.classList.add('active') //add class 'active' to selected element
            });
        })
    }

    //remove all class 'active'
    clearActive(){
        this.slides.forEach((slide) => {
            slide.classList.remove('active')
        })
    }

    errorHandler(error){
        console.error(error)
    }
}

const slider = new Slider('.slide');
slider.start();