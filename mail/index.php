
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tạo Không Giới Hạn Gmail</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-6">
<div class="card">
<div class="card-header text-white text-center bg-info">
<i class="fab fa-google"></i>
Công cụ tạo không giới hạn Gmail
</div>
<div class="card-body">
<div class="input-group mb-3">
<input type="text" id="username" class="form-control" placeholder="Username">
<div class="input-group-append">
<span class="input-group-text">@gmail.com</span>
</div>
</div>
<div class="form-group">
<label for="emails">Emails</label>
<label for="emails" id="counter" class="float-right">Generated: 0</label>
<textarea class="form-control" id="emails" rows="16"></textarea>
</div>
<div class="form-group float-right">
<button type="button" id="save" class="btn btn-success">
<i class="fas fa-download"></i>
Lưu File
</button>
</div>
</div>
<div class="card-footer text-muted text-center">
Made by <a href="https://aboutme-thanhan.firebaseapp.com">ThanhAnIT</a>
</div>
</div>
</div>
</div>
</div>
<script src="FileSaver.js"></script>
<script src="trick.js"></script>
</body>
</html>