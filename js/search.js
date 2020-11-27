/* Use this script to action on the Search form and return results from the server */
    
function search() {
    const form = document.getElementById('search');
    let data = new FormData(form);
    let dataUrl = new URLSearchParams(data).toString();
    
    const queryUrl = './search.php?' + dataUrl;
    
    let table = document.getElementById('articles');
    let status = document.getElementById('status');
    status.innerHTML = "Now loading...";
    
    fetch(queryUrl)
        .then((response) => {
            if(!response.ok) {
                throw Error(response.statusText);
            }
            return response.json();
        })
        .then(json => {
            table.innerHTML = "";
            if(json.length === 0) {
                status.innerHTML = "No articles found";
            }
            else {
                status.innerHTML = `${json.length} articles found`
                for(let i=0;i<json.length;i++) {
                    let article = json[i]
                    table.innerHTML += `<tr><td>${i+1}</td><td>${article.title}</td><td>${article.created}</td></tr>`;
                }
            }
        })
        .catch((error) => {
            status.innerHTML = `<h2>${error}</h2>`
        });
}
