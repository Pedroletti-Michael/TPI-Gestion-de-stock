/**
 * Author : Michael Pedroletti
 * Creation : 20.05.2021
 * Description : This file contain function used to filter elements on the home page
 **/

/**
 * Function used to filter elements present on the home page
 * @param filterType = define which type of data we need to filter
 * @param filter = the element that we need to find
 */
function filterElements(filterType, filter) {
    let cards = document.querySelectorAll(".card");

    cards.forEach((card) => {
        // Filter for linked element of consumable
        if(filterType === "linkedElement") {
            let elements = card.querySelectorAll("[name=consumableLinkedElement]");
            let findElement = false;
            // Go to all elements linked of the card and search if one of them is correct
            elements.forEach((linkedElement) => {
                if(linkedElement.innerHTML.includes(filter)) {
                    findElement = true;
                }
            });

            // Hide or show card depending on the linked element
            card.hidden = !findElement;
        }
        // Filter for brand of consumable
        else if(filterType === "brand") {
            let brand = card.querySelectorAll("[name=consumableBrand]");
            if(brand[0].innerHTML.includes(filter)){
                card.hidden = false;
            }
            else{
                card.hidden = true;
            }
        }
        // Filter for type of consumable
        else if(filterType === "type") {
            let type = card.querySelectorAll("[name=consumableType]");
            if(type[0].innerHTML.includes(filter)){
                card.hidden = false;
            }
            else{
                card.hidden = true;
            }
        }
    });
}