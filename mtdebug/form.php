<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MisterTango "Debug Console"</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
</head>
<body>
<br/>
<br/>
<br/>
<br/>
<div class="container">
    <form name="debug" action="process.php" method="post" target="_blank">
        <div class="row">
           <div class="col-12">
               <h1>MisterTango "Debug Console"</h1>
           </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="callback_url">Callback UUID</label>
                    <input id="callback_url" type="text" name="callback_uuid" value="<?php echo \MTDebug\Engine\Utilities::generateUUID(); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="callback_url">Callback URL</label>
                    <input id="callback_url" type="text" name="callback_url" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="text" name="description" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input id="amount" type="number" name="amount" class="form-control" step="0.01"/>
                </div>
                <div class="form-group">
                    <label for="amount">Secret key</label>
                    <input id="secret_key" type="text" name="secret_key" class="form-control"/>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="xdebug_session">XDebug Session</label>
                    <input id="xdebug_session" type="text" name="xdebug_session" value="PHPSTORM" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">Debug</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="hidden">
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>

