<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/formView.css">

    <title>Document</title>
</head>
<body>
    <div class="body-view">
        <div class="container">
            <img class="logoBM" src={{ asset('images//logo/para-fondo-negro.png') }} alt="logo con micro" alt="" />
            <div class="img-added">
              <img src="" alt=""/>
            </div>
            <div class="img-imput">
              <input type="file" name="image"/>
              <br></br>
            </div>
            <form class="form-items" action="" method="">
              <div class="elements-group">
                <label htmlFor="track">Song</label>
                <input type="text" id="track-name" placeholder="Insert New Song" ></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="url">URL</label>
                <input type="url" id="url-name" placeholder="URL" ></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="artist">Artist</label>
                <input type="text" id="artist-name" placeholder="Insert New Artist" ></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="genre">Genre</label>
                <input type="text" id="genre-name" placeholder="Insert Genre"></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="date">Date</label>
                <input type="date" id="date-name" placeholder="Insert date."></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="user">User</label>
                <input type="text" id="user-name" placeholder="Insert New User."></input>
              </div>
              <div>
                <a href="{{url("/listView")}}"></a>
                  <button type="submit" class="btn-done">Done</button>
              </a>
              </div>
            </form>
  
          </div>
      </div>
</body>
</html>