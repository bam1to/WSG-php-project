let collection = document.querySelector('.img-collection');

let restId = document.querySelector('.rest-id').value;

let request = new XMLHttpRequest();

const url = "../../../vendor/img_script.php";

request.open('GET', `${url}?restId=${restId}`, true);
request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
        let results = request.responseText.split(' ');
        let imgNames = results.slice(0, -1),
            imgCount = results.slice(-1);

        for (let i = 0; i < imgCount; i++) {
            let imageElem = collection.appendChild(document.createElement('img'));

            imageElem.src = `../../upload/${imgNames[i]}`;
            imageElem.alt = "zdjęcie";
            imageElem.style = 'width: 100px; height: 100px'
            imageElem.value = `${imgNames[i]}`;

            imageElem.addEventListener('click', () => {
                let popup = document.querySelector('.popup'),
                    popupImage = document.querySelector('.popup-image'),
                    close = document.querySelector('.close');
                popup.style.display = 'block';
                close.addEventListener('click', () => popup.style.display = 'none');
                popupImage.src = `../../upload/${imgNames[i]}`;

                let buttonAdd = document.querySelector('.button-add'),
                    buttonDelete = document.querySelector('.button-delete');


                buttonAdd.addEventListener('click', () => {
                    addAction('changedescript');
                });
                buttonDelete.addEventListener('click', () => {
                    popup.style.display = 'none';
                    imageElem.parentNode.removeChild(imageElem);
                    addAction('deleteimage');
                });
                function addAction(actionName) {
                    let description = document.querySelector('.description'),
                        descriptionValue = description.value;

                    let imageRequest = new XMLHttpRequest();

                    imageRequest.responseType = 'text';
                    if (actionName === "deleteimage") {
                        imageRequest.open('POST', `../../../vendor/edit_rest.php?action=${actionName}&imageName=${imgNames[i]}`, true);
                    } else {
                        imageRequest.open('POST', `../../../vendor/edit_rest.php?action=${actionName}&descript=${descriptionValue}&imageName=${imgNames[i]}`, true);
                    }
                    imageRequest.onreadystatechange = function () {
                        if (imageRequest.readyState === 4 && imageRequest.status === 200) {
                            alert(imageRequest.responseText);
                        }
                    }
                    imageRequest.send();
                }
            });
        }
    }
}
request.send();



