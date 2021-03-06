<?php /*
    $conn = mysqli_connect("localhost", "kakashi", "Success01", "e-library") or die("Database Error");
    
    $getMesg = mysqli_real_escape_string($conn, $_POST['text']);

    $check_data = "SELECT replies FROM messages WHERE queries LIKE '%$getMesg%'";
    $run_query = mysqli_query($conn, $check_data) or die("Error");


    if(mysqli_num_rows($run_query) > 0){
        $fetch_data = mysqli_fetch_assoc($run_query);
        
        $replay = $fetch_data['replies'];
        echo $replay;
    }else{
        echo "Sorry don't understand";
    } */
include("include/header.php");
include("include/config.php");

?>

<div class="container">
    <div class="container center">
        <form method="POST" action="form.php"  id="request-form">
            <h3>Request A Book</h3>
            <div class="input-field">
                            <i class="material-icons prefix">contacts</i>
                            <input type="text" name="name">
                            <label for="Name" class="name">Your Name</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="email" name="email">
                            <label for="email" class="email">Your Email</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">book</i>
                            <input type="text" name="title"></input>
                            <label for="title" class="title">Book Title</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">contacts</i>
                            <input type="text" name="author"></input>
                            <label for="author" class="author">Book Author</label>
                        </div>
                        <button class="btn waves-effect waves-light blue-grey darken-1" type="submit" name="action">Submit
                        </button>
        </form>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script>
const constraints = {
    name: {
        presence: { allowEmpty: false }
        },
    email: {
        presence: { allowEmpty: false },
        email: true
    },
    title: {
        presence: { allowEmpty: false }
    },
    author: {
        presence: { allowEmpty: false }
    }
    };

const form = document.getElementById('request-form');
form.addEventListener('submit', function (event){
    const formValues = {
        name: form.elements.name.value,
        email: form.elements.email.value,
        title: form.elements.title.value,
        author: form.elements.author.value
    };
    const errors = validate(formValues, constraints);
    if (errors) {
        event.preventDefault();
        const errorMessage = Object
            .values(errors)
            .map(function (fieldValues) {return fieldValues.join(', ')})
            .join("\n");

        alert(errorMessage);
    }
}, false);
</script>
<?php
include("include/footer.php");
?>