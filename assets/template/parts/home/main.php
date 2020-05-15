<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="mb-3">Settings</h4>
            <form class="needs-validation" method="post">
                <div class="row" id="home-channels-container">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            you can use user name: <b>@free_byte</b> or chat id: <b>-6546515613</b>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3" data-number="1">
                        <label for="channel1">Channel 1</label>
                        <input type="text" class="form-control" name="channels[]" value="<?= $functions->defaultFormValue('channels:0',$formValues) ?>" id="channel1" required>
                    </div>
                    <div class="col-md-4 mb-3" data-number="2">
                        <label for="channel2">Channel 2</label>
                        <input type="text" class="form-control" name="channels[]" value="<?= $functions->defaultFormValue('channels:1',$formValues) ?>" id="channel2">
                    </div>
                    <div class="col-md-4 mb-3" data-number="3">
                        <label for="channel3">Channel 3</label>
                        <input type="text" class="form-control" name="channels[]" value="<?= $functions->defaultFormValue('channels:2',$formValues) ?>" id="channel3">
                    </div>
                    <?php
                    if ($formValues["channels"]){
                        $channelLength = count($formValues["channels"]);
                        if ($channelLength > 3){
                            $HTML = "";
                            for ($i = 3 ; $i < $channelLength ; $i++){
                                $channelNumber = $i + 1;
                                $value = $functions->defaultFormValue("channels:$i",$formValues);
                                $HTML .= "<div class='col-md-4 mb-3' data-number='" . $channelNumber . "'>" .
                                    "          <label for='channel" . $i . "'>Channel " . $channelNumber . "</label>" .
                                    "          <input type='text' class='form-control' value='$value' name='channels[]' id='channel" . $channelNumber . "'>" .
                                    "      </div>";
                            }
                            echo $HTML;
                        }
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <button type="button" class="btn btn-info btn-block " id="home-add-channel"> Add Channel </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="robot-id">Robot Id</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" name="robotId" value="<?= $functions->defaultFormValue('robotId',$formValues) ?>" id="robot-id" required>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="robot-api-key">Robot Api Key</label>
                        <input type="text" class="form-control" name="robotApiKey" value="<?= $functions->defaultFormValue('robotApiKey',$formValues) ?>" id="robot-api-key" placeholder="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="messages">Message</label>
                        <textarea type="text" class="form-control" name="messages[]" id="messages" required><?= $functions->defaultFormValue('messages:0',$formValues) ?></textarea>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update Setting</button>
            </form>
        </div>
    </div>
</div>