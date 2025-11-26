let toggleBtn = document.getElementById('toggle_theme_btn');
let bookmarkTitle = document.getElementById('bookmark-title');
let bookmarkUrl = document.getElementById('bookmark-url');
let addBtn = document.getElementById('add-btn');
let adddedBookmarks = document.getElementById('addded-bookmarks');
let error = document.getElementById('error-statement');

function changeMode(){
    if (document.body.classList.contains('light-theme')){
        document.body.classList.replace('light-theme', 'dark-theme');
        toggleBtn.textContent = "🌞";
    }
    else{
         document.body.classList.replace('dark-theme', 'light-theme');
         toggleBtn.textContent = "🌚";
    }
}

function addBookmark(){
    error.innerText = "";
    let urlValue = bookmarkUrl.value.trim();
    if(bookmarkTitle.value.trim() === ""){
        error.innerText = "add a title";
    }
    else if ((urlValue.indexOf("http://") != 0) && (urlValue.indexOf("https://") != 0)){
        error.innerText = "Invalid URL";
    }
    else{
        let divItem = document.createElement('div');
        let textItem = document.createElement('a');
        let linkItem = document.createElement('a');
        let deleteItem = document.createElement('button');
        let favoriteItem = document.createElement('button');

        divItem.className = "div1";
        deleteItem.textContent = "×";
        favoriteItem.textContent = "☆ Favorite";
        textItem.innerText = bookmarkTitle.value.trim();
        textItem.href = urlValue;
        textItem.target = "_blank"
        textItem.className= "link1"
        linkItem.href = urlValue;
        linkItem.target = "_blank";
        linkItem.innerText = urlValue;

         deleteItem.addEventListener("click",
        function(event){
            let parentDiv = event.target.parentElement;
            parentDiv.remove();
        }
      );

        favoriteItem.addEventListener("click",
            function(){
                if( favoriteItem.textContent ==="☆ Favorite"){
                    favoriteItem.textContent = "⭐ Favorite"
                }
                else{
                    favoriteItem.textContent ="☆ Favorite";
                }
            }
        );

        divItem.appendChild(textItem);
        divItem.appendChild(linkItem);
        divItem.appendChild(deleteItem);
        divItem.appendChild(favoriteItem);
        adddedBookmarks.appendChild(divItem);

    }
    }

     



