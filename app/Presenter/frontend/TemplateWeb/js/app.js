
var gameAPI = 'http://127.0.0.1:8000/api/game/favorate';

function start() {
    getGames(renderGames);
}

start();

//Functions
function getGames(callback) {
    fetch(gameAPI)
        .then(function(response) {
            return response.json();
        })
        .then(callback);
}

function renderGames(games) {
    var listGamesBlock = document.querySelector('#list-games-api');
    var htmls = games.map(function(game){
        return `
            <div>
                <h4> ${game.name}</h4>
                <p> ${game.description}</p>
                <p> ${game.price}</p>
            </div>
        `;
    });
    listGamesBlock.innerHTML = htmls.join('');
}
