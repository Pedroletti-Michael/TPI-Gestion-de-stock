<?php
/**
 * Authors : Pedroletti Michael
 * CreationFile date : 06.05.2021
 * Description : Serve to redirect the user depending of his actions
 **/

//Start the session
session_start();

//Require all controller's files
$files = glob(__DIR__ . '/controller/*.php');
foreach ($files as $file){
    require($file);
}

//Redirect the user request depending of his actions
if(isset($_GET['action'])){
    $action = $_GET['action'];

    //Switch used to redirect different action
    switch ($action){
        /**== Action to display login ==**/
        case 'login':
            displayLogin();
            break;

        /**== Action for login ==**/
        case 'requestLogin':
            login($_POST['userMail'], $_POST['pwd']);
            break;

        /**== Action to display page for new consumable ==**/
        case 'newConsumable':
            displayNewConsumable();
            break;

        /**== Action to add new consumable ==**/
        case 'requestNewConsumable':
            newConsumable($_POST);
            break;

        /**== Function used to modify quantity of an consumable ==**/
        case 'modifyQuantity':
            modifyQuantity($_POST['idConsumable'], $_POST['newQuantity']);
            break;

        /**== Action to display the admin panel ==**/
        case 'adminPanel':
            displayAdminPanel();
            break;

        /**== Action to display page for creation of new user ==**/
        case 'newUser':
            displayNewUser();
            break;

        /**== Action to add new user ==**/
        case 'requestNewUser':
            newUser($_POST);
            break;

        /**== Action to disable user ==**/
        case 'disableUser':
            disableUser($_POST);
            break;

        /**== Action to disable user ==**/
        case 'deleteUser':
            deleteUser($_POST);
            break;

        /**== Action to save modification that an admin make on admin panel ==**/
        case 'saveAdminModification':
            saveAdminModification($_POST);
            break;

        /**== Action to display home ==**/
        case 'home':
        default :
            displayHome();
            break;
    }
}
else{
    displayHome();
}
