<?php

namespace App\Http\Controllers;

use App\Parcel;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    //
    public function index()
    {
        $items = Parcel::paginate(20);

        return view('index', [
            'pageTitle' => 'Список записей',
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('edit', [
            'pageTitle' => 'Создать посылку',
            'actionSave' => route('parcel.store'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'km_domestic' => 'required',
            'km_international' => 'required',
            'price' => 'required',
        ]);

        $parcel = Parcel::create($data);

        return redirect(route('parcel.edit', $parcel->id))->with([
            'server_message' => 'Запись создана',
        ]);
    }

    public function edit($id)
    {
        $parcel = Parcel::find($id);

        return view('edit', [
            'pageTitle' => 'Редактировать',
            'parcel' => $parcel,
            'actionSave' => route('parcel.update', $id),
            'actionDelete' => route('parcel.destroy', $id),
            'method' => "PUT",
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'from' => 'required',
            'to' => 'required',
            'km_domestic' => 'required',
            'km_international' => 'required',
            'price' => 'required',
        ]);

        Parcel::where('id', $id)->update($data);

        return redirect(route('parcel.edit', $id))->with([
            'server_message' => 'Запись обновлена',
        ]);
    }

    public function destroy($id)
    {
        Parcel::where('id', $id)->delete();

        return redirect(route('parcel.index'))->with([
            'server_message' => 'Запись удалена',
        ]);
    }
}
