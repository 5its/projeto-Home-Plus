function exibir() {
    // Get the showPassword field
    var showPasswordField = $('#showPassword'); 
   // Get the password field
   var passwordField = $('#senha');
   var cPasswordField = $('#csenha');
   // Get the current type of the password field will be password or text
   var passwordFieldType = passwordField.attr('type');
   var cPasswordFieldType = cPasswordField.attr('type');
   // Check to see if the type is a password field
   if(passwordFieldType == 'password')
   {
       // Change the password field to text
       passwordField.attr('type', 'text');
       cPasswordField.attr('type', 'text');

       // Change the Text on the show password button to Hide
       showPasswordField.val('Hide');
   } else {
       // If the password field type is not a password field then set it to password
       passwordField.attr('type', 'password');
       cPasswordField.attr('type', 'password');

       // Change the value of the show password button to Show
      showPasswordField.val('Show');
   }
        
}