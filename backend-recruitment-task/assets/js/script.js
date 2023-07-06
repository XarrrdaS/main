// Handles the delete user request
function UserDeleter() {

    // Method deleteUser deletes a user with a given ID
    this.deleteUser = function(id) {
        var userDeletionManager = new UserDeletionManager(); // Creates an instance of the UserDeletionManager class

        // Calls the deleteUser method from the UserDeletionManager class to delete the user
        userDeletionManager.deleteUser(id, function(result, error) {
            if (result === true) {
                // Returning success after deleting the user
                location.reload();
            } else {
                // Returning an error in case the user deletion fails
                alert('An error occurred while deleting a record: ' + error);
            }
        });
    };

}

// Manages the logic related to users
function UserDeletionManager() {

    // Method deleteUser deletes a user with a given ID
    this.deleteUser = function(id, callback) {

        // Sends an AJAX request to delete_user.php using the POST method and passing the id as data
        $.ajax({
            url: './partials/delete_user.php',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                var result;

                // If the response data is equal to "success", sets the result to true, otherwise sets it to false
                if (data === 'success') {
                    result = true;
                } else {
                    result = false;
                }

                // Calls the callback function passing the result as parameter
                callback(result);
            },

            // If an error occurs, logs the error in the console and calls the callback function passing false and the error message as parameters
            error: function(xhr, status, error) {
                console.log(error);
                callback(false, error);
            }
        });
    }; 

}

$(document).ready(function() {

    // Handles the delete button click
    $('.delete-button').click(function() {

        // Gets the record ID
        var id = $(this).data('id');

        // Creates an instance of the UserDeleter class
        var userDeleter = new UserDeleter();

        // Calls the deleteUser method to delete the user
        userDeleter.deleteUser(id);
    });
});