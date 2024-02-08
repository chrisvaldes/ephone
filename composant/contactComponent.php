<?php

    class Composant{
        function __construct(){

        }

        function contactComponent( $userName, $userContact,  $idContact){
            echo '
                <li>
                    <div class="collapsible-header"><i class="fa fa-user-circle"></i> '.$userName.'</div>
                    <div class="collapsible-body">
                        <span>
                            Mobile : '.$userContact.'
                            <div style="display: flex; align-items: center; justify-content: space-around;"> 
                                <a style="font-size: 1.5rem; cursor: pointer; margin-top: 1rem;" href="sendmessage.php?message='.$idContact.'"><i
                                        class="fa fa-envelope"></i></a>
                                <a style="font-size: 1.5rem; cursor: pointer; margin-top: 1rem;"  href="modify.php?modifyContact='.$idContact.'"><i
                                        class="fa fa-edit"></i></a>
                                <a style="font-size: 1.5rem; cursor: pointer; margin-top: 1rem;"  href="deleteContact.php?deleteContact='.$idContact.'"><i
                                        class="fa fa-trash"></i></a>
                                <a style="font-size: 1.5rem; cursor: pointer; margin-top: 1rem;" href="ShareContact.php?deleteContact='.$idContact.'"><i
                                        class="fa fa-share "></i></a>
                                <a style="font-size: 1.5rem; cursor: pointer; margin-top: 1rem;"><i
                                        class="fa fa-ban"></i></a>
                            </div>
                        </span>
                    </div>
                </li>
            ';
        }
    }

?>