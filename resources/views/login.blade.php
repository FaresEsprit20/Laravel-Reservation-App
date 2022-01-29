@include('head')
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

                
                <div class="container bg-white dark:bg-gray-800  shadow ">
                 <div class="row">
                     <div class="col-3" style="visibility: hidden">
                     </div>
                     <div class="col-6" style="padding-top: 50px;padding-bottom:50px;">
                        <h2 class="display-6 text-muted text-primary pb-3">Login</h2>
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">type your email.</div>
                              @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1" aria-describedby="passHelp">
                              <div id="pass11Help" class="form-text">type your password.</div>
                              @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Login</button>
                          </form>
                    </div>
                    <div class="col-3" style="visibility: hidden">
                    </div>
                 </div>
                  

          

       
        </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>

<!--   


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to install Botman Chatbot in Laravel? - shouts.dev</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
</body>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
<script>
    var botmanWidget = {
        aboutText: 'write something here',
        introMessage: "✋ Hi! I'm form shouts.dev"
    };
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</html>


-->