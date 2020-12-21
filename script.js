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
    updateInput.style.margin = "0 0 1.2em 0";
    updateInput.style.height = "3em";
    updateInput.value = clickedLi.firstChild.firstChild.textContent;
    updateInput.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
  
            $.post("index.php",
            {
            value: updateInput.value,
            id: clickedLi.id
            });

            clickedLi.firstChild.firstChild.textContent = updateInput.value;
            updateInput.replaceWith(clickedLi);
        }
    });

    clickedLi.replaceWith(updateInput);

    
    // peut se faire avec content editable c'est plus facile !
}






