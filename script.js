const todoListDiv = document.getElementById('todoListDiv');
const todoList = [...todoListDiv.getElementsByTagName('li')];

todoList.forEach( (element) => {
    element.addEventListener("click", () => {
        updateTodo(element);
    });
});


function updateTodo (clickedLi) {
    console.log("function call works ! " + "id : " + clickedLi.id );
    
    updateInput = document.createElement('input');
    updateInput.className = "form-control list-group-item";
    updateInput.style.margin = "0 0 1em 0";
    updateInput.value = clickedLi.firstChild.firstChild.textContent;
    updateInput.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            const sendValue = updateInput.value;
  
            $.post("./index.php", function(req) {
                console.log(req);
            })

            // trouver un moyen d'appeler la fonction PHP updateTodo($sendValue)
            // https://www.w3schools.com/jquery/ajax_post.asp

            $.post("index.php",
            {
            value: sendValue
            },
            function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
            });

            // --------

            clickedLi.firstChild.firstChild.textContent = updateInput.value;
            updateInput.replaceWith(clickedLi);
        }
    });

    clickedLi.replaceWith(updateInput);

    
    // peut se faire avec content editable c'est plus facile !
}




