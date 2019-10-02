<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Berita</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin-top: 20px;
            }
            
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .tambah-berita:hover{
                font-size: 20px;
            }

            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .judul-berita{
                font-size: 30px;
                font-weight: bold;
                text-align: center;
            }
        </style>
    </head>
    <body>
                @foreach($berita as $row)
                    <a class="editLink" href="{{ url('/berita/'.$row->id_berita.'/edit')}}">Edit</a>
                    <form action="{{url('/berita',$row->id_berita)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                    <div class="konten">
                        <div class="judul">
                            <p class="judul-berita">{{$row->judul_berita}}</p>
                        </div>
                        <div class="gambar-berita">
                            <p align="center"><img src="/Proyek/ProyekBeritakeun/public/image/{{$row->foto_berita}}" style="width: 150px; text-align: center;height: 150px; border-radius: 20%;" alt="">
                            </p>
                        </div>
                        <div class="isi-berita">
                            <p>{{$row->isi_berita}}</p>
                        </div>

                    </div>
                @endforeach        
          
    </body>
</html>
