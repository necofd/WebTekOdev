/*İlgi-Alanlarım Sayfası icin*/
/*hayvan */
const cat_result = document.getElementById('cat_result');
const cat_btn = document.getElementById('cat_btn');

cat_btn.addEventListener('click', getRandomCat)

function getRandomCat() {
    fetch('https://aws.random.cat/meow')
        .then(res => res.json())
        .then(data => {
            cat_result.innerHTML = `<img src=${data.file} alt="kedi" />`
    })
}

/*anime */
const base_url = "https://api.jikan.moe/v3";

search.addEventListener('click', searchAnime)

function searchAnime(event){

    event.preventDefault();

    const form = new FormData(this);
    const query = form.get("search");

    fetch(`${base_url}/search/anime?q=${query}&page=1`)
    .then(res=>res.json())
    .then(updateDom)
    .catch(err=>console.warn(err.message));
}

function updateDom(data){

    const searchResults = document.getElementById('search-results');

    const animeByCategories = data.results
        .reduce((acc, anime)=>{

            const {type} = anime;
            if(acc[type] === undefined) acc[type] = [];
            acc[type].push(anime);
            return acc;

        }, {});

        searchResults.innerHTML = Object.keys(animeByCategories).map(key=>{

            const animesHTML = animeByCategories[key]
            .sort((a,b)=>a.episodes-b.episodes)
            .map(anime=>{
                return `
                    <div class="card">
                        <div class="card-image">
                            <img src="${anime.image_url}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">${anime.title}</span>
                        </div>
                        <div class="card-action">
                            <a href="${anime.url}">Daha fazlasını oku</a>
                        </div>
                    </div>
                `
            }).join("");


            return `
                <section>
                    <h3>${key.toUpperCase()}</h3>
                    <div class="kemicofa-row">${animesHTML}</div>
                </section>
            `
        }).join("");
}

function pageLoaded(){
    const form = document.getElementById('search_form');
    form.addEventListener("submit", searchAnime);
}


window.addEventListener("load", pageLoaded);