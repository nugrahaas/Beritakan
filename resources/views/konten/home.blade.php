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
                font-family: "Nunito";
                font-weight: 200;
                height: 100vh;
                margin-top: 20px;
            }
            .judul-berita{
                font-size: 20px;
                color: white;
                font-weight: bold;
            }
            .wall-item {
                display: block;
                margin: 0 0 24px 0;
                padding: 12px;
                background: #1e1e1e;
                transition: all 200ms;
                width: 55rem;
                margin-left: 100px;
            }

            .wall-item:hover {
                  transform: translateY(-6px);
                  transition: all 200ms;
            }

            .wall-item > img {
                  display: block;
                  width: 100%;
                  margin: 0 0 30px 0;
            }

            .wall-item{
                  text-align: center;
                  color: #fff;
                  font-size: 14px;
                  text-transform: uppercase;
                  margin-bottom: 0;
                  padding-bottom: 0;
            }

            .wall-column {
                  display: block;
                  position: relative;
                  width: 33.3333%;
                  float: left;
                  padding: 0 12px;
                  box-sizing: border-box;
            }

            @media (max-width: 640px) {
                  .wall-column {
                        width: 50%;
                  }
            }

            @media (max-width: 480px) {
                  .wall-column {
                        width: auto;
                        float: none;
                  }
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
                background-color: #636b6f;
                color: #fff;
            
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
            .wall-item {
                margin-top: 15px; 
                display: block;
                color: white;
                padding: 12px;
                background: #1e1e1e;
                transition: all 200ms;
            }

            .wall-item:hover {
                transform: translateY(+4px);
                transition: all 200ms;
            }

            .wall-item > img {
                display: block;
                width: 100%;
                margin: 0 0 30px 0;
            }
            .gambar_berita{

            }
            .berita-highlights{
                margin-top: 20px;
            }
            .baca-selengkapnya{
                color: white;
            }
            </style>
    </head>
    <body>
            <div class="content">
                <div class="title">
                    Home
                </div>
                <div class="message">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session ('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-error">
                            {{ session ('error') }}
                        </div>
                    @endif
                </div>
                <div class="nambah-berita">
                    <a class="tambah-berita" href="{{ url('/berita/create') }}">Tambah Berita</a>
                </div>
                <div class="berita-highlights">
                
                    @foreach($berita as $row)
                        <div class="wall">

                            <div class="wall-item">
                                  <img src="/Proyek/ProyekBeritakeun/public/image/{{$row->foto_berita}}" style="width: 150px; height: 150px; float: left; margin-right: 20px; border-radius: 50%;" alt="">
                                  <p class="judul-berita">{{$row->judul_berita}}</>
                                  <p>{{$row->isi_berita}}</p>
                                  <a class="baca-selengkapnya" href="{{ url('/konten/page/content', $row->id_berita) }}">Baca Selengkapnya</a>
                            </div><!-- 
                        <td>{{$row->genre_berita}}</td>
                        <td>{{$row->isi_berita}}</td>
                        <td>{{$row->foto_berita}}</td> -->
                    @endforeach                
                </div>    
            </div>
        
    <script type="text/javascript">

            $('.wall').jaliswall({
                  item : '.wall-item',
                  columnClass : '.wall-column'
            });
                        /*
            JALISWALL 0.1
            by Pierre Bonnin - @PierreBonninPRO - 2015
            */
            (function($){
              $.fn.jaliswall = function(options){

                this.each(function(){

                  var defaults = {
                    item : '.wall-item',
                    columnClass : '.wall-column',
                    resize:false
                  }

                  var prm = $.extend(defaults, options);

                  var container = $(this);
                  var items = container.find(prm.item);
                  var elemsDatas = [];
                  var columns = [];
                  var nbCols = getNbCols();

                  init();

                  function init(){
                    nbCols = getNbCols();
                    recordAndRemove();
                    print();
                    if(prm.resize){
                      $(window).resize(function(){
                        if(nbCols != getNbCols()){
                          nbCols = getNbCols();
                          setColPos();
                          print();
                        }
                      });
                    }
                  }

                  function getNbCols(){
                    var instanceForCompute = false;
                    if(container.find(prm.columnClass).length == 0){
                      instanceForCompute = true;
                      container.append("<div class='"+parseSelector(prm.columnClass)+"'></div>");
                    }
                    var colWidth = container.find(prm.columnClass).outerWidth(true);
                    var wallWidth = container.innerWidth();
                    if(instanceForCompute)container.find(prm.columnClass).remove();
                    return Math.round(wallWidth / colWidth);
                  }

                  // save items content and params and removes originals items
                  function recordAndRemove(){
                    items.each(function(index){
                      var item = $(this);
                      elemsDatas.push({
                        content : item.html(),
                        class : item.attr('class'),
                        href : item.attr('href'),
                        id : item.attr('id'),
                        colid : index%nbCols
                      });
                      item.remove();
                    });
                  }

                  //determines in which column an item should be
                  function setColPos(){
                    for (var i in elemsDatas){
                      elemsDatas[i].colid = i%nbCols;
                    }
                  }

                  // to get a class name without the selector
                  function parseSelector(selector){
                    return selector.slice(1, selector.length);
                  }

                  //write and append html
                  function print(){
                    var tree = '';
                    //creates columns
                    for (var i=0; i<nbCols; i++){
                      tree += "<div class='"+parseSelector(prm.columnClass)+"'></div>";
                    }
                    container.html(tree);

                    // creates items
                    for (var i in elemsDatas){
                      var html='';

                      var content = (elemsDatas[i].content != undefined)?elemsDatas[i].content:'';
                      var href = (elemsDatas[i].href != href)?elemsDatas[i].href:'';
                      var classe = (elemsDatas[i].class != undefined)?elemsDatas[i].class:'';
                      var id = (elemsDatas[i].id != undefined)?elemsDatas[i].id:'';

                      if(elemsDatas[i].href != undefined){
                        html += "<a "+getAttr(href,'href')+" "+getAttr(classe,'class')+" "+getAttr(id,'id')+">"+content+"</a>";
                      }else{
                        html += "<div "+getAttr(classe,'class')+" "+getAttr(id,'id')+">"+content+"</a>";
                      }
                      container.children(prm.columnClass).eq(i%nbCols).append(html);
                    }

                  }

                  //creates a well-formed attribute
                  function getAttr(attr, type){
                    return (attr != undefined)?type+"='"+attr+"'":'';
                  }

                });

                return this;
              }
            })(jQuery);

      </script>                
                
    </body>
</html>
