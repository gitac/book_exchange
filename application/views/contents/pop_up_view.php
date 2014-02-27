<!doctype html>
<html lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/css/bootstrap_modal.css">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/css/default_modal.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo base_url() ?>assets/js/bootstrap_modal.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js<?php echo base_url() ?>assets/js/modals.js"></script>
    </head>

    <body>
        <div id="w" class="container center">
            

            <center>   
                <a href="#modalwin" data-toggle="modal" class="btn btn-large">Display Window</a>

                <a href="#bgchangemodal" data-toggle="modal" class="btn btn-large">Update the Background</a>
            </center>

            <!-- first modal window -->
            <div id="modalwin" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <header class="modal-header">
                    <a href="#" class="close" data-dismiss="modal">x</a>
                    <h3>Prepare to be Amazed <small>or easily amused :]</small></h3>
                </header>

                <div class="modal-body">
                    <p>This is a generic modal window, but look we can add images!</small></p>

                    <p><img src="images/jim-dwight-the-office.png" alt="Jim and Dwight from NBC's The Office" title="Jim and Dwight" class="img-rounded"></p>

                    <p>Close me by clicking anywhere outside the window, or by clicking the blue button.</p>

                    <p></p>
                </div>

                <footer class="modal-footer">
                    <a href="#" class="btn btn-primary" id="okwin01">Sounds Good!</a>
                </footer>
            </div> <!-- @end @modalwin -->

            <!-- BG color modal window -->
            <div id="bgchangemodal" class="modal hide fade dark" role="dialog" aria-labelledby="bgModalUpdate" aria-hidden="true">
                <header class="modal-header">
                    <a href="#" class="close" data-dismiss="modal">x</a>
                    <h3>Update the Background <small>just pick a color below</small></h3>
                </header>

                <div class="modal-body">
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">x</a>
                        Select a radio button and save changes to see the difference.
                    </div>

                    <input type="radio" id="bgdefault" name="bgradio" checked="checked">
                    <label for="bgdefault"><span></span>Default Color</label>

                    <input type="radio" id="bgpalegreen" name="bgradio">
                    <label for="bgpalegreen"><span></span>Pale Green</label>

                    <input type="radio" id="bgwisteria" name="bgradio">
                    <label for="bgwisteria"><span></span>Wisteria</label>

                    <input type="radio" id="bgsaffron" name="bgradio">
                    <label for="bgsaffron"><span></span>Saffron</label>

                    <input type="radio" id="bgcarnation" name="bgradio">
                    <label for="bgcarnation"><span></span>Carnation Pink</label>
                </div>

                <footer class="modal-footer">
                    <a href="#" class="btn" id="closewin02">Cancel</a>
                    <a href="#" class="btn btn-primary" id="okwin02">Save Changes</a>
                </footer> 
            </div> <!-- @end #bgchangemodal -->
        </div><!-- @end #w -->
    </body>
</html>