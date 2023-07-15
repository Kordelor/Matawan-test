const cards = [{type : 'flight',number:'SK22', from : 'Stockholm', to : 'New York JFK', seat:'7B', gate:'45b',  ticketCounter:'' },                
                {type : 'flight',number:'SK455', from : 'Gerona Airport', to : 'Stockholm', seat:'3A', gate:'45b', ticketCounter:'344' },
                {type : 'bus',number:'', from : 'Barcelona', to : 'Gerona Airport', seat:''},
                {type : 'train',number:'78A', from : 'Madrid', to : 'Barcelona', seat:'45b'}]

const form = document.getElementById("btnTravel");
const allCard = document.getElementById("allCards");
const result = document.getElementById("previewElement");

/*template to show card*/
function createCard(card){
    const {type, number, from, to, seat, gate, ticketCounter } = card;
    const newCardTemplate=`
    <div class="card">
            <p><b>type :</b> ${type}<p>
            <p><b>number :</b> ${number}<p>
            <p><b>from :</b> ${from}<p>
            <p><b>to :</b> ${to}<p>
            <p><b>seat :</b> ${seat || "Not Assigned"}<p>
            <p><b>gate :</b> ${gate || "Not Assigned"}<p>
            <p><b>ticketCounter :</b> ${ticketCounter || "Not Assigned"}<p>
    </div>
    `;
        
        
    return newCardTemplate;
}

function addOnPreview(card){
    const newContent = createCard(card);
    allCard.innerHTML += newContent;

}


/* do diplay all card*/
cards.forEach(addOnPreview);


/* send request to sort card*/ 
async function fetchData (){
    var request = new XMLHttpRequest();
    var url = "http://matawan/api/cards";
    var params = "data=" + JSON.stringify(cards);

    request.open('POST', url, true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE) {
          if (request.status === 200) {
            var response = JSON.parse(request.response);
            if (response) {
                showResults(response);
            }else{
                console.error("error", response);
            }
          }
        }
      };
      request.send(params);
}


// Show results in page
function showResults(item) {
    result.innerHTML += item;
}


async function showTravel(e){
    e.preventDefault();
    await fetchData();
}

form.addEventListener("click", showTravel);
