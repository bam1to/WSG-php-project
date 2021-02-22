//ratings for form

const ratingElem = document.querySelector('.rating');

if (ratingElem !== undefined) {
    initRating(ratingElem);
}
function initRating(rating) {
    let ratingActive, ratingValue;
    initRatingVars(rating)
    setWidth();
    setRating(rating);
}
function initRatingVars(ratingVal) {
    ratingActive = ratingVal.querySelector('.rating__active');
    ratingValue = ratingVal.querySelector('.rating__value');
}
function setWidth(index = ratingValue.innerHTML) {
    const ratingActiveWidth = index / 0.05;
    ratingActive.style.width = `${ratingActiveWidth}%`;
}

function setRating(rating) {
    const ratingItems = rating.querySelectorAll('.rating__item');
    for (let index = 0; index < ratingItems.length; index++) {
        const ratingItem = ratingItems[index];
        ratingItem.addEventListener('mouseenter', () => {
            setWidth(ratingItem.value);
        });
        ratingItem.addEventListener('mouseleave', () => {
            setWidth();
        });
        ratingItem.addEventListener('click', () => {
            ratingValue.innerHTML = index + 1;
            setWidth();
        })

    }
}

//rating for comments

let selfRatings = document.querySelectorAll('.self_rating');

if (selfRatings.length > 0) {
    for (let index = 0; index < selfRatings.length; index++) {
        const selfRating = selfRatings[index];
        getRatingValue(selfRating);
    }
}

function getRatingValue(selfRating) {
    const selfRatingValue = selfRating.innerHTML;
    selfRating.innerHTML = '';
    printStars(selfRatingValue, selfRating);
}

function printStars(rightRating, selfRating) {
    for (let index = 0; index < 5; index++) {
        let star = selfRating.appendChild(document.createElement('span'));
        star.innerHTML = '★';
        if (index < rightRating) {
            star.style.color += 'orange';
        }
    }
}


