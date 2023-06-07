<!DOCTYPE html>
<html>
<body>

<h1>MY TODOS:</h1>

<style>

    // add some styles here for ul and li and button

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    li {
        list-style: none;
        margin: 10px;
        padding: 0;
    }
    button {
        border: none;
        background: #eee;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

</style>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


<script>
    $.ajax('../api/get-todo.php', 
    {
        success: function(data, status, xhr) {
            data = JSON.parse(data);
            console.log({data})
            data.forEach(todo => {
                $('#todos').append(`
                    <li>
                        <span>Status: ${todo.completed == 1 ? "Completed" : "Pending"} </span>
                        <span>${todo.title}</span>
                        <button 
                            value=${`${todo.id}-${todo.completed === 1 ? "0" : "1"}`} 
                            onclick="updateTodo(this.value)"
                        >
                            Mark as ${todo.completed === 1 ? "Undone" : "Done"}
                        </button>
                        <button value=${todo.id} onclick="deleteTodo(this.value)">Delete</button>
                    </li>
                `)
            });
        },
        error: function(jqXhr, textStatus, errorMessage) {
            console.log('Error: ' + errorMessage);
        }
    })

    function createTodo () {
        $.ajax('../api/create-todo.php', 
        {
            method: 'POST',
            data: {
                title: $('#create-todo-title').val()
            },
            success: function(data, status, xhr) {
                location.reload();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        })
    }

    function deleteTodo (id) {
        $.ajax('../api/delete-todo.php', 
        {
            method: 'POST',
            data: {
                id,
            },
            success: function(data, status, xhr) {
                location.reload();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        })
    }

    function updateTodo (identifier) {
        const [id, completed] = identifier.split('-');

        $.ajax('../api/update-todo.php', 
        {
            method: 'POST',
            data: {
                id,
                completed,
            },
            success: function(data, status, xhr) {
                location.reload();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        })
    }
</script>

<ul id="todos">
</ul>

<div id="create-todo">
    <input type="text" name="title" placeholder="Title" id="create-todo-title">
    <button onclick="createTodo()">Add</button>
</div>

</body>
</html>