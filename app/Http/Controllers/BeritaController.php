<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Berita;
use Intervention\Image\ImageServiceProvider;
use Illuminate\Support\Facades\Input;
use Image;

class BeritaController extends Controller
{
	//AWAL
  	public function indexAwal()
  	{
  		return view('berita');	
  	}

  	
  	//KONTEN
  	public function indexHomeKonten()
    {
      $data['berita'] = \DB::table('t_berita')
      ->get();
      return view('konten.home', $data);

    }
    
  	public function indexHelp()
  	{
  		return view('konten.help');
  	}
  	public function indexAbout()
    {
      return view('konten.about');
    }
    public function indexKonten($id_berita)
  	{
      $data['berita'] = \DB::table('t_berita')
      ->where('id_berita', $id_berita)
      ->get();
     
     
      return view('konten.page.content', $data);
  	}

  	
  	//FORM
  	public function create()
  	{
  		return view('berita.form');
  	}
    public function store(Request $request)
    {
/*      $rule=[
          'judul_berita' => 'required|string',
          'genre_berita' => 'required',
          'isi_berita' => 'required',
          'foto_berita' => 'required',
        
        ];

      $this->validate($request, $rule);
  */  $this->validate($request, [
            'judul_berita' => 'required|string',
            'genre_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $berita  = new berita;
        $berita->judul_berita = $request->judul_berita;
        $berita->genre_berita = $request->genre_berita;
        $berita->isi_berita = $request->isi_berita;

        if($request->hasFile('foto_berita')){
          $image = $request->file('foto_berita');
          $filename = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save( public_path('/image/' . $filename ) );
          $berita->foto_berita = $filename;
        };

        $status= $berita->save();


      // $foto_berita = $request->file('foto_berita')->store('avatars');
      // $request->berita()->update([
      //         'foto_berita' => $foto_berita
      //   ]);

      // $input = $request->all();
      // unset($input['_token']);
      // $status = \DB::table('t_berita')->insert($input);
      // //$status = \App\Siswa::create($input);

      /*
      $berita = new \App\Siswa;
      $berita->nis = $input['nis'];
      $berita->nama_lengkap = $input['nama_lengkap'];
      $berita->jenkel = $input['jenkel'];
      $berita->goldar = $input['goldar'];
      $status = $berita->save();
      */

      if ($status) {
        return redirect('/konten/home')->with('success', 'data berhasil dimasukan');
      }
      else {
        return redirect('/berita/form')->with('error', 'data gagl dimasukan');
      }
    }
    public function update(Request $request, $id_berita)
    {
      $this->validate($request, [
            'judul_berita' => 'required|string',
            'genre_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $input = $request->all();
        
        $berita = \DB::table('t_berita')::where('id_berita', $id_berita);
        $berita->judul_berita = $input['judul_berita'];
        $berita->genre_berita = $input['genre_berita'];
        $berita->isi_berita = $input['isi_berita'];

        /*if($request->hasFile('foto_berita')){
          $image = $request->file('foto_berita');
          $filename = $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(300, 300)->save( public_path('/image/' . $filename ) );
          $berita->foto_berita = $input[$filename];
        };*/
      // unset($input['_token']);
      // unset($input['_method']);
      // $status = \DB::table('t_berita')->where('id_berita',$id_berita)->update($input);

      //$status = $berita->update($input);

      $status = $berita->update();



      if ($status) {
        return redirect('/konten/home')->with('success', 'data berhasil dimasukan');
      }
      else {
        return redirect('/berita/form')->with('error', 'data gagl dimasukan');
      }
    }
    public function edit(Request $request, $id_berita )
    {
      $data['berita'] = \DB::table('t_berita')
      ->where('id_berita', $id_berita);//find($id_berita);
      return view('berita.form',$data);

    }
    public function destroy(Request $request, $id_berita )
    {
      //$status = \DB::table('t_siswa')->where('id',$id)->delete();
      $berita= \App\Berita::where('id_berita', $id_berita);
      $status = $berita->delete();

      if ($status) {
        return redirect('/konten/home')->with('success', 'data berhasil dihapus');
      }
      else {
        return redirect('/konten/home')->with('error', 'data gagl dihapus');
      }

    }
    public function cari(){
      
      
    }
  }