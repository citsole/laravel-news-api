<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('del',1)->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'shortdes'=>'required|max:254',
            'des'=>'required',
        ],[
            'titile.required'=>'ກະລຸນາໃສ່ຫົວເລື່ອງກ່ອນ!',
            'shortdes.required'=>'ກະລຸນາໃສ່ເນື້ອໃນສັ້ນກ່ອນ!',
            'des.required'=>'ກະລຸນາໃສ່ລາຍລະອຽດກ່ອນ!'
        ]);
        $image = $request->image;
        $imagename = time().$image->getClientOriginalName();

        $news_data = News::create([
            'image'=>'upload/news/' .$imagename,
            'title'=> $request->title,
            'shortdes'=> $request->shortdes,
            'des'=>$request->des,
        ]);

        $image->move('upload/news/', $imagename);

        return redirect()->route('news.index')->with('success','ເພີ່ມຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.delete', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'shortdes'=>'required|max:254',
            'des'=>'required',
        ],[
            'titile.required'=>'ກະລຸນາໃສ່ຫົວເລື່ອງກ່ອນ!',
            'shortdes.required'=>'ກະລຸນາໃສ່ເນື້ອໃນສັ້ນກ່ອນ!',
            'des.required'=>'ກະລຸນາໃສ່ລາຍລະອຽດກ່ອນ!'
        ]);

        $news = News::find($id);

        if($request->has('image'))
        {
            $image = $request->image;
            $imagename = time().$image->getClientOriginalName();
            $image->move('upload/news/', $imagename);

            $news_data = [
                'image'=>'upload/news/' .$imagename,
                'title'=> $request->title,
                'shortdes'=> $request->shortdes,
                'des'=>$request->des,
            ];
        }else
        {
            $news_data = [
                'title'=> $request->title,
                'shortdes'=> $request->shortdes,
                'des'=>$request->des,
            ];
        }
        
        $news->update($news_data);
        return redirect()->route('news.index')->with('success','ແກ້ໄຂຂໍ້ມູນສຳເລັດ!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->del = 0;
        $news->save();
        return redirect()->route('news.index')->with('success','ລຶບຂໍ້ມູນຂໍ້ມູນສຳເລັດ!');
    }
}
