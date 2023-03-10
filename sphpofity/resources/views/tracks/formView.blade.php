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
            <form class="form-items" action="{{ route('tracks.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="elements-group">
                <label htmlFor="track">Song</label>
                <input type="text" id="track-name" placeholder="Insert New Song" name="name_tracks" required></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="url">URL</label>
                <input type="url" id="url-name" placeholder="URL" name="URL" ></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="artist">Artist</label>
                <input type="text" id="artist-name" placeholder="Insert New Artist" name="artist" required></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="genre">Genre</label>
                <input type="text" id="genre-name" placeholder="Insert Genre" name="genre" required></input>
              </div>
  
              <div class="elements-group">
                <label htmlFor="date">Date</label>
                <input type="date" id="date-name" placeholder="Insert date." name="create_at" required></input>
              </div>

              <div class="elements-group">
                <label htmlFor="date">User</label>
                <input type="text" name="name" placeholder="no logins" value="{{ old('name', auth()->user()->name) }}" readonly>
              </div>
              <div>
                <label for="foto">Image:</label>
                <input type="file" name="foto" id="foto">
              </div>
              <div>
                  <button type="submit" class="btn-done">Done</button>
              </div>
            </form>
  
          </div>
      </div>
</body>
</html>
