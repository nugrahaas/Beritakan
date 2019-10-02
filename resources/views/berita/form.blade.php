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
            .textarea-isiberita{
                width: 100vh;
                height: 50vh;
            }
            td{
                text-align: left;
            }
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin-top: 20px;
                margin-left: 50px;
                margin-right: 50px;
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

            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Form
                </div>
                <div class="form_berita">
                    <form action="{{ url('konten/home', @$berita->id_berita) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        @if(!empty($berita))
                            @method('PATCH')
                        @endif
                        <table>
                            
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td><input type="text" name="judul_berita" placeholder="Judul Berita" value="{{ old('judul_berita', @$berita->judul_berita) }}"></input><br></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><select name="genre_berita">
                                                <option value="">   Pilih Kategori   </option>
                                                <option value="Politik">Politik</option>
                                                <option value="Pendidikan">Pendidikan</option>
                                                <option value="Olahraga">Olahraga</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Hiburan">Hiburan</option>
                                                <option value="Permainan">Permainan</option>
                                            </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td>Isi Berita</td>
                                <td>:</td>
                                <td><textarea class="textarea-isiberita" name="isi_berita" placeholder="Isi Berita"></textarea><br></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td><input type="file" name="foto_berita"></input><br></td>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Simpan"></input></td>
                            
                            </tr>
                        </table>
                    </form>

                </div>

                
            </div>
        </div>
    </body>
</html>
