<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
    <body>
        <!-- Main -->
        <div id="main" class="shell">
            <div id="modal">
                <header><h1>Create a Profile</h1></header>
                <section>
                    <form action="#" class="form-horizontal" method="post">
                        <fieldset style="overflow:hidden; padding-top: .5cm">
                            <div class="control-group">
                                <label class="control-label" >Location</label>
                                <div class="controls">
                                    <div class="input">
                                        <select  style="text-align: center !important; width: 280px !important">
                                            <option>--Select a region--</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">First name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="First name" name="f_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Last name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" placeholder="Last name" name="l_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Gender</label>
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="male" value="male" id="male" checked />
                                        <label for="male" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Male</label>
                                        <input style="float:left; clear:none; margin: 2px 0 0 2px;" type="radio" class="radio" name="female" value="female" id="female" />
                                        <label for="female" style="float:left; clear:none; display:block; padding: 2px 1em 0 0;">Female</label>
                                      </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >About me</label>
                                <div class="controls">
                                    <textarea class="xxlarge" rows="3" style="width: 272px !important"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" >Interests</label>
                                <div class="controls">
                                    <textarea class="xxlarge" rows="3" style="width: 272px !important"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Photo</label>
                                <div class="controls">
                                    <input type="file"></input>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <div style="float:left; clear:none;">
                                    <input type="submit" value="Submit" style="float:left; clear:none; margin: 2px 0 0 2px; width: 200px;"/>
                                    <label style="float:left; clear:none; display:block; padding: 8px 1em 0 0;">&nbsp; &nbsp; or</label>
                                    <a style="float:left; clear:none; margin: 8px 0 0 2px;" href="settings">Cancel</a>
                                   </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
        <!-- End Main -->
    </body>
</html>