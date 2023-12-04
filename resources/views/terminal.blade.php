<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Command Execution Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Optional CSS styles */
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Command Execution Page</h1>
  
  <form action="{{ route('runArtisanCommand') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="commandInput">Enter Command: (<b>Type the command other than php artisan</b>)</label>
    <input type="text" class="form-control" name="command" id="commandInput" placeholder="Enter your command here">
    </div>
  
    <button type="button" class="btn btn-primary" onclick="runCommand()">Run</button>
  </form>
  
  <div id="result"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script>
  function runCommand() {
    var command = document.getElementById('commandInput').value;

    $.ajax({
      type: "GET",
      url: '{{ route("runArtisanCommand") }}',
      data: { komut: command },
      success: function(response) {
        console.log("Process completed:", response);
        document.getElementById('result').innerHTML = "<p><strong>Result:</strong> " + response + "</p>";
      },
      error: function(error) {
        console.error(error);
        document.getElementById('result').innerHTML = "<p><strong>Error:</strong> An error occurred during the process.</p>";
      }
    });
  }
</script>

</body>
</html>
